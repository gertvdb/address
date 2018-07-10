<?php

namespace Drupal\locality;

/**
 * Locality.
 *
 * A locality object.
 */
interface LocalityInterface {

  /**
   * Get the location name.
   *
   * @return null|string
   *   The location name.
   */
  public function getName();

  /**
   * Set the location name.
   *
   * @param null|string $name
   *   The location name.
   */
  public function setName($name);

  /**
   * Get the location details.
   *
   * @return null|string
   *   The location details.
   */
  public function getDetails();

  /**
   * Set the location details.
   *
   * @param null|string $details
   *   The location details.
   */
  public function setDetails($details);

  /**
   * Get the street name.
   *
   * @return null|string
   *   The street name.
   */
  public function getStreetName();

  /**
   * Set the street name.
   *
   * @param null|string $street_name
   *   The street name.
   */
  public function setStreetName($street_name);

  /**
   * Get the street number.
   *
   * @return int|null
   *   the street number.
   */
  public function getStreetNumber();

  /**
   * Set the street number.
   *
   * @param int|null $street_number
   *   The street number.
   */
  public function setStreetNumber($street_number);

  /**
   * Get the street addition.
   *
   * @return null|string
   *   The street addition.
   */
  public function getStreetAddition();

  /**
   * Set the street addition.
   *
   * @param null|string $street_addition
   *   The street addition.
   */
  public function setStreetAddition($street_addition);

  /**
   * Get the postal code.
   *
   * @return null|string
   *   The postal code.
   */
  public function getPostalCode();

  /**
   * Set the postal code.
   *
   * @param null|string $postal_code
   *   The postal code.
   */
  public function setPostalCode($postal_code);

  /**
   * Get the district.
   *
   * @return null|string
   *   The locality district, or sublocality, or neighborhood.
   */
  public function getDistrict();

  /**
   * Set the district.
   *
   * @param null|string $district
   *   The locality district, or sublocality, or neighborhood.
   */
  public function setDistrict($district);

  /**
   * Get the city.
   *
   * @return null|string
   *   The city or locality.
   */
  public function getCity();

  /**
   * Set the city.
   *
   * @param null|string $city
   *   The city or locality.
   */
  public function setCity($city);

  /**
   * Get the Country object.
   *
   * @return \Drupal\locality\CountyInterface|null
   *   A country object.
   */
  public function getCountry();

  /**
   * Set the Country object.
   *
   * @param \Drupal\locality\CountyInterface|null $country
   *   A country object.
   */
  public function setCountry($country);

  /**
   * Get the Continent object.
   *
   * @return \Drupal\locality\ContinentInterface|null
   *   A continent object.
   */
  public function getContinent();

  /**
   * Set the Continent object.
   *
   * @param \Drupal\locality\ContinentInterface|null $continent
   *   A continent object.
   */
  public function setContinent($continent);

}
