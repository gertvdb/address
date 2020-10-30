<?php

namespace Drupal\location\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\location\LocationCollectionInterface;

/**
 * Interface LocationFieldItemListInterface.
 *
 * @package Drupal\location\Plugin\Field\FieldType
 */
interface LocationFieldItemListInterface extends FieldItemListInterface {

  /**
   * Gets a location collection from field.
   *
   * @return LocationCollectionInterface[]
   *   A location collection object.
   */
  public function locationCollection();

}
