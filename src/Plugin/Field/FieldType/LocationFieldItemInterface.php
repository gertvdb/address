<?php

namespace Drupal\location\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemInterface;
use Drupal\location\Location;

/**
 * Interface LocationFieldItemInterface.
 *
 * @package Drupal\location\Plugin\Field\FieldType
 */
interface LocationFieldItemInterface extends FieldItemInterface {

  /**
   * Get the location object.
   *
   * @return Location|null
   *   A Location object.
   */
  public function toLocation();

}
