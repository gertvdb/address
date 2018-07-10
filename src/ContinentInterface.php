<?php

namespace Drupal\locality;

/**
 * Continent interface.
 */
interface ContinentInterface {

  /**
   * Get the continent code.
   *
   * @return string|null
   *   The continent code.
   */
  public function getContinentCode();

  /**
   * Get the continent name.
   *
   * @return string|null
   *   The continent name.
   */
  public function getName();

}