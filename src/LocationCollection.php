<?php

namespace Drupal\location;

/**
 * LocationCollection.
 */
final class LocationCollection implements LocationCollectionInterface {

  /**
   * The locations.
   *
   * @var \Drupal\location\LocationInterface[]|array
   */
  protected $locations;

  /**
   * Constructor.
   *
   * @param \Drupal\location\LocationInterface[]|array $locations
   *   An array of locations.
   */
  public function __construct(array $locations = array()) {
    $this->locations = $locations;
  }

  /**
   * {@inheritdoc}
   */
  public function count() {
    return count($this->locations);
  }

  /**
   * {@inheritdoc}
   */
  public function add(LocationInterface $location) {
    $this->locations[] = $location;
  }

  /**
   * {@inheritdoc}
   */
  public function override($key, LocationInterface $location) {
    if (isset($this->locations[$key])) {
      $this->locations[$key] = $location;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getCollection() {
    return $this->locations ? $this->locations : [];
  }

  /**
   * {@inheritdoc}
   */
  public function getIterator() {
    return new \ArrayIterator($this->locations);
  }

}
