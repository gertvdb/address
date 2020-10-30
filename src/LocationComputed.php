<?php

namespace Drupal\location;

use Drupal\Core\TypedData\DataDefinitionInterface;
use Drupal\Core\TypedData\TypedDataInterface;
use Drupal\Core\TypedData\TypedData;
use Drupal\location\Plugin\Field\FieldType\LocationFieldItemInterface;
use InvalidArgumentException;

/**
 * A computed location.
 */
class LocationComputed extends TypedData {

  /**
   * Cached computed location.
   *
   * @var LocationInterface|null
   */
  protected ?LocationInterface $location = NULL;

  /**
   * {@inheritdoc}
   */
  public function __construct(DataDefinitionInterface $definition, $name = NULL, TypedDataInterface $parent = NULL) {
    parent::__construct($definition, $name, $parent);

    if (!$this->getParent() instanceof LocationFieldItemInterface) {
      throw new InvalidArgumentException("The location computer will only work on an implementation of the LocationFieldItemInterface");
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getValue() {
    if ($this->location !== NULL) {
      return $this->location;
    }

    /** @var LocationFieldItemInterface $locationFieldItem */
    $locationFieldItem = $this->getParent();
    return $locationFieldItem->toLocation();
  }

  /**
   * {@inheritdoc}
   *
   * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
   */
  public function setValue($value, $notify = TRUE) {
    $this->location = $value;
    // Notify the parent of any changes.
    if (isset($this->parent)) {
      $this->parent->onChange($this->name);
    }
  }

}
