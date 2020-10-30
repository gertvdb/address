<?php

namespace Drupal\location\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\location\Location;
use Drupal\location\LocationInterface;

/**
 * Default widget for location.
 *
 * @FieldWidget(
 *   id = "location_default",
 *   label = @Translation("Location"),
 *   field_types = {
 *     "location"
 *   }
 * )
 */
class LocationFieldWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $formState) {
    /** @var Location|null $value */
    $value = isset($items[$delta]->value) && $items[$delta]->value instanceof LocationInterface ? $items[$delta]->value : NULL;

    $element += [
      '#title' => $this->t('Location'),
      '#type' => 'location',
      '#default_value' => $value ? $value->toArray() : NULL,
    ];

    return $element;
  }

}
