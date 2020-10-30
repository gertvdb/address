<?php

namespace Drupal\location\Plugin\Field\FieldType;

use Drupal\coordinates\CoordinateCollection;
use Drupal\Core\Field\FieldItemList;
use Drupal\location\LocationCollection;

/**
 * Represents a configurable entity coordinate field.
 */
class LocationFieldItemList extends FieldItemList implements LocationFieldItemListInterface {

  /**
   * {@inheritdoc}
   */
  public function locationCollection() {
    if (empty($this->list)) {
      return NULL;
    }
    return new LocationCollection($this->list);
  }

}
