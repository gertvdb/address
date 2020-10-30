<?php

namespace Drupal\location\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\location\LocationInterface;

/**
 * Default formatter for location.
 *
 * @FieldFormatter(
 *   id = "location_default",
 *   label = @Translation("Location"),
 *   field_types = {
 *     "coordinate"
 *   }
 * )
 */
class LocationFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    foreach ($items as $delta => $item) {
      if ($item->value && $item->value instanceof LocationInterface) {

        /** @var LocationInterface $location */
        $location = $item->value;
        $elements[$delta] = ['#markup' => $location->getName() . ' ,' . $location->getStreetName()  . ' ' . $location->getStreetNumber() . ' - ' . $location->getPostalCode() . ' ' . $location->getCity()];
      }
    }

    return $elements;
  }

}
