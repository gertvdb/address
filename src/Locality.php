<?php

namespace Drupal\locality;

use Drupal\locality\CountryInterface;
use Drupal\locality\ContinentInterface;

/**
 * Locality.
 *
 * A locality object.
 */
final class Locality implements LocalityInterface {

  /**
   * The locality name.
   *
   * Ex: Google Inc.
   *
   * @var string|null
   */
  protected $name;

  /**
   * The locality details.
   *
   * Ex: Second floor.
   *
   * @var string|null
   */
  protected $details;

  /**
   * The street name.
   *
   * Ex: Amphitheatre Parkway.
   *
   * @var string|null
   */
  protected $streetName;

  /**
   * The street number.
   *
   * Ex: 1600.
   *
   * @var int|null
   */
  protected $streetNumber;

  /**
   * The street addition.
   *
   * Ex: B2.
   *
   * @var string|null
   */
  protected $streetAddition;

  /**
   * The postal code.
   *
   * Ex: 94043.
   *
   * @var string|null
   */
  protected $postalCode;

  /**
   * The locality district, or sublocality, or neighborhood.
   *
   * Ex: Mountain View.
   *
   * @var string|null
   */
  protected $district;

  /**
   * The city or locality.
   *
   * Ex: California.
   *
   * @var string|null
   */
  protected $city;

  /**
   * A country object or country code string.
   *
   * @var \Drupal\locality\CountyInterface|null
   */
  protected $country;

  /**
   * A continent object or continent code string.
   *
   * @var \Drupal\locality\ContinentInterface|null
   */
  protected $continent;

  /**
   * Locality constructor.
   *
   * @param string|null $name
   *   The name of the locality.
   * @param string|null $details
   *   The details of the locality.
   * @param string|null $street_name
   *   The street name of the locality.
   * @param int|null $street_number
   *   The street number of the locality.
   * @param string|null $street_addition
   *   The street addition of the locality.
   * @param string|null $postal_code
   *   The postal code of the locality.
   * @param string|null $district
   *   The locality district, or sublocality, or neighborhood.
   * @param string|null $city
   *   The city or locality.
   * @param \Drupal\locality\CountryInterface|null $country
   *   The country object.
   * @param \Drupal\locality\ContinentInterface|null $continent
   *   The continent object.
   */
  public function __construct(string $name = NULL, string $details = NULL, string $street_name = NULL, string $street_number = NULL, string $street_addition = NULL, string $postal_code = NULL, string $district = NULL, string $city = NULL, CountryInterface $country = NULL, ContinentInterface $continent = NULL) {
    $this->name = $name;
    $this->details = $details;
    $this->streetName = $street_name;
    $this->streetNumber = $street_number;
    $this->streetAddition = $street_addition;
    $this->postalCode = $postal_code;
    $this->district = $district;
    $this->city = $city;
    $this->country = $country;
    $this->continent = $continent;
  }

  /**
   * Get the location name.
   *
   * @return null|string
   *   The location name.
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Set the location name.
   *
   * @param null|string $name
   *   The location name.
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * Get the location details.
   *
   * @return null|string
   *   The location details.
   */
  public function getDetails() {
    return $this->details;
  }

  /**
   * Set the location details.
   *
   * @param null|string $details
   *   The location details.
   */
  public function setDetails($details) {
    $this->details = $details;
  }

  /**
   * Get the street name.
   *
   * @return null|string
   *   The street name.
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
  public function setStreetName($street_name) {
    $this->streetName = $street_name;
  }

  /**
   * Get the street number.
   *
   * @return int|null
   *   the street number.
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
    $this->streetNumber = $street_number;
  }

  /**
   * Get the street addition.
   *
   * @return null|string
   *   The street addition.
   */
  public function getStreetAddition() {
    return $this->streetAddition;
  }

  /**
   * Set the street addition.
   *
   * @param null|string $street_addition
   *   The street addition.
   */
  public function setStreetAddition($street_addition) {
    $this->streetAddition = $street_addition;
  }

  /**
   * Get the postal code.
   *
   * @return null|string
   *   The postal code.
   */
  public function getPostalCode() {
    return $this->postalCode;
  }

  /**
   * Set the postal code.
   *
   * @param null|string $postal_code
   *   The postal code.
   */
  public function setPostalCode($postal_code) {
    $this->postalCode = $postal_code;
  }

  /**
   * Get the district.
   *
   * @return null|string
   *   The locality district, or sublocality, or neighborhood.
   */
  public function getDistrict() {
    return $this->district;
  }

  /**
   * Set the district.
   *
   * @param null|string $district
   *   The locality district, or sublocality, or neighborhood.
   */
  public function setDistrict($district) {
    $this->district = $district;
  }

  /**
   * Get the city.
   *
   * @return null|string
   *   The city or locality.
   */
  public function getCity() {
    return $this->city;
  }

  /**
   * Set the city.
   *
   * @param null|string $city
   *   The city or locality.
   */
  public function setCity($city) {
    $this->city = $city;
  }

  /**
   * Get the Country object.
   *
   * @return \Drupal\locality\CountryInterface|null
   *   A country object.
   */
  public function getCountry() {
    return $this->country;
  }

  /**
   * Set the Country object.
   *
   * @param \Drupal\locality\CountryInterface|null $country
   *   A country object.
   */
  public function setCountry($country) {
    $this->country = $country;
  }

  /**
   * Get the Continent object.
   *
   * @return \Drupal\locality\ContinentInterface|null
   *   A continent object.
   */
  public function getContinent() {
    return $this->continent;
  }

  /**
   * Set the Continent object.
   *
   * @param \Drupal\locality\ContinentInterface|null $continent
   *   A continent object.
   */
  public function setContinent($continent) {
    $this->continent = $continent;
  }

}
