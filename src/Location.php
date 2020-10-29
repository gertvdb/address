<?php

namespace Drupal\location;

use Drupal\iso3166\CountryInterface;
use Drupal\iso3166\ContinentInterface;
use Drupal\coordinates\CoordinateInterface;

/**
 * Location.
 *
 * A location object.
 */
final class Location implements LocationInterface {

  /**
   * Name of the location.
   *
   * The location name.
   * Ex: Google Inc.
   *
   * @var string|null
   */
  protected $name;

  /**
   * Specifications of the location.
   *
   * This is optional and can contain extra details
   * about the location.
   * Ex: Second floor or Building C.
   *
   * @var string|null
   */
  protected $specifications;

  /**
   * The street name of the location.
   *
   * Ex: Amphitheatre Parkway.
   *
   * @var string|null
   */
  protected $streetName;

  /**
   * The street number of the location.
   *
   * Ex: 1600.
   *
   * @var int|null
   */
  protected $streetNumber;

  /**
   * The street addition of the location.
   *
   * Ex: B2.
   *
   * @var string|null
   */
  protected $streetAddition;

  /**
   * The postal code of the location.
   *
   * Ex: 94043.
   *
   * @var string|null
   */
  protected $postalCode;

  /**
   * The district, sublocality, or neighborhood of the location.
   *
   * Ex: Mountain View.
   *
   * @var string|null
   */
  protected $district;

  /**
   * The city of the location.
   *
   * Ex: San Francisco.
   *
   * @var string|null
   */
  protected $city;

  /**
   * The province of the location.
   *
   * Not all locations have a province,
   * since it's not used in all countries.
   *
   * Ex: California.
   *
   * @var string|null
   */
  protected $province;

  /**
   * A country object.
   *
   * @var CountryInterface
   */
  protected $country;

  /**
   * A continent object.
   *
   * @var ContinentInterface
   */
  protected $continent;

  /**
   * A coordinate object.
   *
   * @var CoordinateInterface
   */
  protected $coordinate;

    /**
     * Locality constructor.
     *
     * @param string|null $name
     *   The name of the locality.
     * @param string|null $specifications
     *   The specifications of the location.
     * @param string|null $street_name
     *   The street name of the locality.
     * @param string|null $street_number
     *   The street number of the locality.
     * @param string|null $street_addition
     *   The street addition of the locality.
     * @param string|null $postal_code
     *   The postal code of the locality.
     * @param string|null $district
     *   The locality district, or sublocality, or neighborhood.
     * @param string|null $province
     *   The province of the locality.
     * @param string|null $city
     *   The city or locality.
     * @param CountryInterface|null $country
     *   The country object.
     * @param ContinentInterface|null $continent
     *   The continent object.
     * @param CoordinateInterface|null $coordinate
     *   The continent object.
     */
  public function __construct(
    string $name = NULL,
    string $specifications = NULL,
    string $street_name = NULL,
    string $street_number = NULL,
    string $street_addition = NULL,
    string $postal_code = NULL,
    string $district = NULL,
    string $province = NULL,
    string $city = NULL,
    CountryInterface $country = NULL,
    ContinentInterface $continent = NULL,
    CoordinateInterface $coordinate = NULL
  ) {
    $this->name = $this->setName($name);
    $this->specifications = $this->setSpecifications($specifications);
    $this->streetName = $this->setStreetName($street_name);
    $this->streetNumber = $this->setStreetNumber($street_number);
    $this->streetAddition = $this->setStreetAddition($street_addition);
    $this->postalCode = $this->setPostalCode($postal_code);
    $this->district = $this->setDistrict($district);
    $this->city = $this->setCity($city);
    $this->province = $this->setProvince($province);
    $this->country = $this->setCountry($country);
    $this->continent = $this->setContinent($continent);
    $this->coordinate = $this->setCoordinates($coordinate);
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Set the location name.
   *
   * @param string $name
   *   The location name.
   */
  public function setName(string $name) {
    $this->name = !empty($name) ? $name : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getSpecifications() {
    return $this->specifications;
  }

  /**
   * Set the location specifications.
   *
   * @param string $specifications
   *   The location specifications.
   */
  public function setSpecifications(string $specifications) {
    $this->specifications = !empty($specifications) ? $specifications : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getStreetName() {
    return $this->streetName;
  }

  /**
   * Set the street name.
   *
   * @param null|string $street_name
   *   The street name.
   */
  public function setStreetName(string $street_name) {
    $this->streetName = !empty($street_name) ? $street_name : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getStreetNumber() {
    return $this->streetNumber;
  }

  /**
   * Set the street number.
   *
   * @param int|null $street_number
   *   The street number.
   */
  public function setStreetNumber($street_number) {
    $this->streetNumber = $street_number ? $street_number : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getStreetAddition() {
    return $this->streetAddition;
  }

  /**
   * Set the street addition.
   *
   * @param string $street_addition
   *   The street addition.
   */
  public function setStreetAddition(string $street_addition) {
    $this->streetAddition = !empty($street_addition) ? $street_addition : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getPostalCode() {
    return $this->postalCode;
  }

  /**
   * Set the postal code.
   *
   * @param string $postal_code
   *   The postal code.
   */
  public function setPostalCode(string $postal_code) {
    $this->postalCode = !empty($postal_code) ? $postal_code : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getDistrict() {
    return $this->district;
  }

  /**
   * Set the district.
   *
   * @param string $district
   *   The district, or sublocality, or neighborhood.
   */
  public function setDistrict(string $district) {
    $this->district = !empty($district) ? $district : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getCity() {
    return $this->city;
  }

  /**
   * Set the city.
   *
   * @param string $city
   *   The city or locality.
   */
  public function setCity(string $city) {
    $this->city = $city && !empty($city) ? $city : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getProvince() {
    return $this->province;
  }

  /**
   * Set the province.
   *
   * @param string $province
   *   The province or locality.
   */
  public function setProvince(string $province) {
    $this->province = $province && !empty($province) ? $province : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getCountry() {
    return $this->country;
  }

  /**
   * Set the Country object.
   *
   * @param CountryInterface|null $country
   *   A country object.
   */
  public function setCountry($country) {
    $this->country = $country && $country instanceof CountryInterface ? $country : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getContinent() {
    return $this->continent;
  }

  /**
   * Set the Continent object.
   *
   * @param ContinentInterface|null $continent
   *   A continent object.
   */
  public function setContinent($continent) {
    $this->continent = $continent && $continent instanceof ContinentInterface ? $continent : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getCoordinates() {
    return $this->coordinate;
  }

  /**
   * Set the Coordinate object.
   *
   * @param CoordinateInterface|null $coordinate
   *   A coordinate object.
   */
  public function setCoordinates($coordinate) {
    $this->coordinate = $coordinate && $coordinate instanceof CoordinateInterface ? $coordinate : NULL;
  }

}
