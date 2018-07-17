<?php

namespace Drupal\location;

/**
 * Locality.
 *
 * A locality object.
 */
interface LocationInterface {

  /**
   * Get the location name.
   *
   * @return null|string
   *   The location name.
   */
  public function getName();

  /**
   * Get the location specifications.
   *
   * @return null|string
   *   The location specifications.
   */
  public function getSpecifications();

  /**
   * Get the street name.
   *
   * @return null|string
   *   The street name.
   */
  public function getStreetName();

  /**
   * Get the street number.
   *
   * @return int|null
   *   the street number.
   */
  public function getStreetNumber();

  /**
   * Get the street addition.
   *
   * @return null|string
   *   The street addition.
   */
  public function getStreetAddition();

  /**
   * Get the postal code.
   *
   * @return null|string
   *   The postal code.
   */
  public function getPostalCode();

  /**
   * Get the district.
   *
   * @return null|string
   *   The locality district, or sublocality, or neighborhood.
   */
  public function getDistrict();

  /**
   * Get the city.
   *
   * @return null|string
   *   The city or locality.
   */
  public function getCity();

  /**
   * Get the Country object.
   *
   * @return \Drupal\country\CountryInterface|null
   *   A country object.
   */
  public function getCountry();

  /**
   * Get the Continent object.
   *
   * @return \Drupal\continent\ContinentInterface|null
   *   A continent object.
   */
  public function getContinent();

  /**
   * Get the Coordinate object.
   *
   * @return \Drupal\coordinates\CoordinateInterface|null
   *   A continent object.
   */
  public function getCoordinate();

}
