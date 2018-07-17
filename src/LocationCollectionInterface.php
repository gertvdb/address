<?php

namespace Drupal\location;

/**
 * LocationCollectionInterface.
 */
interface LocationCollectionInterface extends \IteratorAggregate {

  /**
   * Count the collection.
   *
   * @return int
   *   The count of the locations in the collection.
   */
  public function count();

  /**
   * Add a location to the collection.
   *
   * @param \Drupal\location\LocationInterface $location
   *   A location object.
   */
  public function add(LocationInterface $location);

  /**
   * Override a location in collection.
   *
   * @param int $key
   *   A numeric key.
   * @param \Drupal\location\LocationInterface $location
   *   A location object.
   */
  public function override($key, LocationInterface $location);

  /**
   * Get the locations collection.
   *
   * @return \Drupal\location\LocationInterface[]
   *   The collection array.
   */
  public function getCollection();

}
