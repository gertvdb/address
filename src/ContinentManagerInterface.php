<?php

namespace Drupal\locality;

/**
 * Interface ContinentManagerInterface.
 */
interface ContinentManagerInterface {

  /**
   * Returns a list of continent code => continent name pairs.
   *
   * @return array
   *   An array of continent code => continent name pairs.
   */
  public function getList();

}