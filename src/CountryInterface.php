<?php

namespace Drupal\locality;

/**
 * Country interface.
 */
interface CountryInterface {

  /**
   * Get the country code.
   *
   * @return string|null
   *   The country code.
   */
  public function getCountryCode();

  /**
   * Get the country name.
   *
   * @return string|null
   *   The country name.
   */
  public function getName();

}