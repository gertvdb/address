<?php

namespace Drupal\location\Plugin\Field\FieldType;

use Drupal\coordinate\Factory\CoordinateFactory;
use Drupal\coordinates\Service\ProximityCalculationService;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\TypedData\Exception\MissingDataException;
use Drupal\Core\TypedData\Exception\ReadOnlyException;
use Drupal\Core\TypedData\PrimitiveBase;
use Drupal\iso3166\CountryInterface;
use Drupal\location\Location;
use Drupal\location\LocationInterface;

/**
 * Plugin implementation of the 'location' field type.
 *
 * @FieldType(
 *   id = "location",
 *   label = @Translation("Location"),
 *   description = @Translation("Create and store location values."),
 *   default_widget = "location_default",
 *   default_formatter = "location_default",
 *   list_class = "\Drupal\location\Plugin\Field\FieldType\LocationFieldItemList",
 * )
 */
class LocationFieldItem extends FieldItemBase implements LocationFieldItemInterface {

  /**
   * Get the proximity calculation service.
   *
   * Since at this point Dependency Injection is not provided for
   * Typed Data (https://www.drupal.org/project/drupal/issues/2914419),
   * we use the Drupal service container in a seperate function so this can be
   * reworked later on when issue is resolved.
   *
   * @return ProximityCalculationService
   *   The proximity calculation service.
   */
  protected function getProximityCalculationSerice() {
    return \Drupal::service('coordinates.proximity_calculations');
  }

  /**
   * Get the country factory.
   *
   * Since at this point Dependency Injection is not provided for
   * Typed Data (https://www.drupal.org/project/drupal/issues/2914419),
   * we use the Drupal service container in a seperate function so this can be
   * reworked later on when issue is resolved.
   *
   * @return \Drupal\iso3166\Factory\CountryFactory
   *   The country factory.
   */
  protected function getCountryFactory() {
    return \Drupal::service('iso3166.country_factory');
  }

  /**
   * Get the coordinate factory.
   *
   * Since at this point Dependency Injection is not provided for
   * Typed Data (https://www.drupal.org/project/drupal/issues/2914419),
   * we use the Drupal service container in a seperate function so this can be
   * reworked later on when issue is resolved.
   *
   * @return CoordinateFactory
   *   The coordinate factory.
   */
  protected function getCoordinateFactory() {
    return \Drupal::service('coordinate.coordinate_factory');
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $fieldDefinition) {

    // Location
    $properties['value'] = DataDefinition::create('any')
      ->setLabel(t('Computed location'))
      ->setDescription(t('The computed Location object.'))
      ->setComputed(TRUE)
      ->setClass('\Drupal\location\LocationComputed');

    $properties['name'] = DataDefinition::create('string')
      ->setLabel(t('The name of the location'))
      ->setRequired(TRUE);

    $properties['specifications'] = DataDefinition::create('string')
      ->setLabel(t('The specifications of the location'))
      ->setRequired(TRUE);

    $properties['street_name'] = DataDefinition::create('string')
      ->setLabel(t('The street name of the location'))
      ->setRequired(TRUE);

    $properties['street_number'] = DataDefinition::create('integer')
      ->setLabel(t('The street number of the location'))
      ->setRequired(TRUE);

    $properties['street_addition'] = DataDefinition::create('string')
      ->setLabel(t('The street addition of the location'))
      ->setRequired(TRUE);

    $properties['district'] = DataDefinition::create('string')
      ->setLabel(t('The district of the location'))
      ->setRequired(TRUE);

    $properties['city'] = DataDefinition::create('string')
      ->setLabel(t('The city of the location'))
      ->setRequired(TRUE);

    $properties['province'] = DataDefinition::create('string')
      ->setLabel(t('The province of the location'))
      ->setRequired(TRUE);

    // Option 2
    // Coordinates
    $properties['latitude'] = DataDefinition::create('float')
      ->setLabel(t('Latitude'))
      ->setRequired(TRUE);

    $properties['longitude'] = DataDefinition::create('float')
      ->setLabel(t('Longitude'))
      ->setRequired(TRUE);

    // Extra fields for proximity queries.
    $properties['latitude_sin'] = DataDefinition::create('float')
      ->setLabel(t('Latitude sine'))
      ->setComputed(TRUE);

    $properties['latitude_cos'] = DataDefinition::create('float')
      ->setLabel(t('Latitude cosine'))
      ->setComputed(TRUE);

    $properties['longitude_rad'] = DataDefinition::create('float')
      ->setLabel(t('Longitude radian'))
      ->setComputed(TRUE);

    // Iso3166
    $properties['alpha2'] = DataDefinition::create('string')
      ->setLabel(t('The alpha2 country code'))
      ->setRequired(TRUE);

    $properties['alpha3'] = DataDefinition::create('string')
      ->setLabel(t('The alpha3 country code'))
      ->setRequired(TRUE);

    $properties['numeric'] = DataDefinition::create('string')
      ->setLabel(t('The numeric country code'))
      ->setRequired(TRUE);

    $properties['continent'] = DataDefinition::create('string')
      ->setLabel(t('The continent code for the country'))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $fieldDefinition) {
    return [
      'columns' => [
        'name' => [
          'description' => 'Stores the name of the location',
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
        'specifications' => [
          'description' => 'Stores the specifications of the location',
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
        'street_name' => [
          'description' => 'Stores the street name of the location',
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
        'street_number' => [
          'description' => 'Stores the street number of the location',
          'type' => 'int',
          'not null' => FALSE,
        ],
        'street_addition' => [
          'description' => 'Stores the street addition of the location',
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
        'district' => [
          'description' => 'Stores the district of the location',
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
        'city' => [
          'description' => 'Stores the city of the location',
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
        'province' => [
          'description' => 'Stores the province of the location',
          'type' => 'varchar',
          'length' => 255,
          'not null' => FALSE,
        ],
        'latitude' => [
          'description' => 'Stores the latitude value',
          'type' => 'float',
          'size' => 'big',
          'not null' => FALSE,
        ],
        'longitude' => [
          'description' => 'Stores the longitude value',
          'type' => 'float',
          'size' => 'big',
          'not null' => FALSE,
        ],
        'latitude_sin' => [
          'description' => 'Stores the sine of latitude',
          'type' => 'float',
          'size' => 'big',
          'not null' => TRUE,
        ],
        'latitude_cos' => [
          'description' => 'Stores the cosine of latitude',
          'type' => 'float',
          'size' => 'big',
          'not null' => TRUE,
        ],
        'longitude_rad' => [
          'description' => 'Stores the radian longitude',
          'type' => 'float',
          'size' => 'big',
          'not null' => TRUE,
        ],
        'alpha2' => [
          'description' => 'Stores the alpha2 country code value',
          'type' => 'varchar',
          'length' => 2,
          'not null' => FALSE,
        ],
        'alpha3' => [
          'description' => 'Stores the alpha3 country code value',
          'type' => 'varchar',
          'length' => 3,
          'not null' => FALSE,
        ],
        'numeric' => [
          'description' => 'Stores the numeric country code value',
          'type' => 'varchar',
          'length' => 3,
          'not null' => FALSE,
        ],
        'continent' => [
          'description' => 'Stores continent code for the country',
          'type' => 'varchar',
          'length' => 2,
          'not null' => FALSE,
        ],
      ],
      'indexes' => [
        'coordinate' => [
          'latitude',
          'longitude',
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    return !($this->get('street_name'));
  }

  /**
   * {@inheritdoc}
   *
   * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
   */
  public function onChange($propertyName, $notify = TRUE) {

    // Enforce that the computed location is recalculated.
    if (in_array($propertyName,
      [
        'name',
        'specifications',
        'street_name',
        'street_number',
        'street_addition',
        'street_name',
        'street_number',
        'street_addition',
        'district',
        'city',
        'province',
        'latitude',
        'longitude',
        'alpha2',
        'alpha3',
        'numeric',
        'continent'
      ])) {
      try {
        $this->set('value', NULL);
      }
      catch (\Exception $exception) {
        // In theory this will never throw an exception since we define
        // the property.
      }
    }

    parent::onChange($propertyName, $notify);

    if (!$this->isEmpty()) {
        try {
            $this->recalculateProximityFields();
        } catch (MissingDataException $e) {
        } catch (ReadOnlyException $e) {
        }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getValue() {
    parent::getValue();
    $this->values = $this->toLocation();
    return $this->values;
  }

    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     * @throws MissingDataException
     */
  public function setValue($values, $notify = TRUE) {
    // Allow callers to pass a CoordinateInterface object
    // as the field item value.
    if ($values instanceof LocationInterface) {
      $values = $values->toArray();
    }

    parent::setValue($values);

    if (!$this->isEmpty()) {
      $this->recalculateProximityFields();
    }
  }

  /**
   * Recalculate proximity fields.
   *
   * @throws MissingDataException
   * @throws ReadOnlyException|ReadOnlyException
   */
  private function recalculateProximityFields() {
    $service = $this->getProximityCalculationSerice();

    $latitudeSin = $this->getLatitude() ? $service->calcLatitudeSinus($this->getLatitude()) : NULL;
    $latitudeCos = $this->getLatitude() ? $service->calcLatitudeCosinus($this->getLatitude()) : NULL;
    $longitudeRad = $this->getLongitude() ? $service->calcLongitudeRadius($this->getLongitude()) : NULL;

    $this->get('latitude_sin')->setValue($latitudeSin, FALSE);
    $this->get('latitude_cos')->setValue($latitudeCos, FALSE);
    $this->get('longitude_rad')->setValue($longitudeRad, FALSE);
  }

  /**
   * Get the latitude.
   *
   * @return float|null
   *   A latitude.
   */
  private function getLatitude() {

    try {

      /** @var PrimitiveBase $latitudeValue */
      $latitudeValue = $this->get('latitude');
      if (!$latitudeValue instanceof PrimitiveBase) {
        return NULL;
      }

      return $latitudeValue->getCastedValue();

    }
    catch (\Exception $exception) {
      return NULL;
    }
  }

  /**
   * Get the longitude.
   *
   * @return float|null
   *   A longitude.
   */
  private function getLongitude() {

    try {

      /** @var PrimitiveBase $latitudeValue */
      $longitudeValue = $this->get('longitude');
      if (!$longitudeValue instanceof PrimitiveBase) {
        return NULL;
      }

      return $longitudeValue->getCastedValue();

    }
    catch (\Exception $exception) {
      return NULL;
    }

  }

  /**
   * Get the alpha 2.
   *
   * @return string|null
   *   An alpha 2.
   */
  private function getAlpha2() {

    try {

      /** @var PrimitiveBase $alphaValue */
      $alphaValue = $this->get('alpha2');
      if (!$alphaValue instanceof PrimitiveBase) {
        return NULL;
      }

      return $alphaValue->getCastedValue();

    }
    catch (\Exception $exception) {
      return NULL;
    }

  }

  /**
   * Get the coordinate object.
   */
  private function toCoordinate() {
    try {
      $coordinateFactory = $this->getCoordinateFactory();
      return $coordinateFactory->createCoordinate($this->getLatitude(), $this->getLongitude());
    }
    catch (\Exception $e) {
      return NULL;
    }
  }

  /**
   * Get country object.
   *
   * @return CountryInterface|null
   *   A country object or NULL
   */
  private function toCountry() {
    try {
      $countryFactory = $this->getCountryFactory();
      return $countryFactory->createCountry($this->getAlpha2());
    }
    catch (\Exception $e) {
      return NULL;
    }
  }

  /**
   * Get the coordinate object.
   */
  public function toLocation() {
    try {
      $coordinate = $this->toCoordinate();
      $country = $this->toCountry();
      $continent = $country->getContinent();

      return new Location(
        $this->get('name'),
        $this->get('specification'),
        $this->get('street_name'),
        $this->get('street_number'),
        $this->get('street_addition'),
        $this->get('postal_code'),
        $this->get('district'),
        $this->get('province'),
        $this->get('city'),
        $country,
        $continent,
        $coordinate
      );

    }
    catch (\Exception $e) {
      return NULL;
    }

  }

}
