<?php

namespace Drupal\location\Element;

use Drupal\coordinates\Utility\CoordinateValidator;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\FormElement;

/**
 * Provides a location form element.
 *
 * Usage example:
 * @code
 *
 * $location = new Location();
 *
 * $form['location'] = array(
 *   '#type' => 'location',
 *   '#title' => $this->t('Location'),
 *   '#default_value' => $location->toArray(),
 *   '#required' => TRUE,
 *   '#coordinates' =>
 *      '#latitude' => [
 *        '#description' => $this->t('Extra description for latitude'),
 *        '#attributes' => ['class' => ['extra-class']],
 *      ],
 *    ]
 * );
 * @endcode
 *
 * @FormElement("location")
 */
class Location extends FormElement {

  const PRESERVED_KEYS = [
    '#type',
  ];

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $class = get_class($this);
    return [
      '#input' => TRUE,
      '#process' => [
        [$class, 'processLocation'],
      ],
      '#theme' => 'location',
      '#theme_wrappers' => ['form_element'],
    ];
  }

  /**
   * Processes a coordinate form element.
   *
   * @param array $element
   *   The element.
   * @param FormStateInterface $formState
   *   The form state.
   * @param array $completeForm
   *   The form.
   *
   * @return array
   *   The processed element
   *
   * @SuppressWarnings(PHPMD)
   */
  public static function processLocation(array &$element, FormStateInterface $formState, array &$completeForm) {
    $element['#tree'] = TRUE;

    $element['name'] = [
      '#type' => 'textfield',
      '#title' => t('name'),
      '#default_value' => isset($element['#default_value']['name']) ? $element['#default_value']['name'] : NULL,
    ];

    $element['specifications'] = [
      '#type' => 'textfield',
      '#title' => t('specifications'),
      '#default_value' => isset($element['#default_value']['specifications']) ? $element['#default_value']['specifications'] : NULL,
    ];

    $element['street_name'] = [
      '#type' => 'textfield',
      '#title' => t('street name'),
      '#default_value' => isset($element['#default_value']['street_name']) ? $element['#default_value']['street_name'] : NULL,
    ];

    $element['street_number'] = [
      '#type' => 'textfield',
      '#title' => t('street number'),
      '#default_value' => isset($element['#default_value']['street_number']) ? $element['#default_value']['street_number'] : NULL,
    ];

    $element['street_addition'] = [
      '#type' => 'textfield',
      '#title' => t('street addition'),
      '#default_value' => isset($element['#default_value']['street_addition']) ? $element['#default_value']['street_addition'] : NULL,
    ];

    $element['postal_code'] = [
      '#type' => 'textfield',
      '#title' => t('postal code'),
      '#default_value' => isset($element['#default_value']['postal_code']) ? $element['#default_value']['postal_code'] : NULL,
    ];

    $element['district'] = [
      '#type' => 'textfield',
      '#title' => t('district'),
      '#default_value' => isset($element['#default_value']['district']) ? $element['#default_value']['district'] : NULL,
    ];

    $element['province'] = [
      '#type' => 'textfield',
      '#title' => t('province'),
      '#default_value' => isset($element['#default_value']['province']) ? $element['#default_value']['province'] : NULL,
    ];

    $element['city'] = [
      '#type' => 'textfield',
      '#title' => t('city'),
      '#default_value' => isset($element['#default_value']['city']) ? $element['#default_value']['city'] : NULL,
    ];

    $element['city'] = [
      '#type' => 'textfield',
      '#title' => t('city'),
      '#default_value' => isset($element['#default_value']['city']) ? $element['#default_value']['city'] : NULL,
    ];

    $form['country'] = [
      '#type' => 'country',
      '#title' => t('Country'),
      '#plugin_id' => FALSE,
      '#plugin_config' => [],
      '#multiple' => FALSE,
      '#required' => TRUE,
      '#excluded_countries' => [],
    ];

    $element['coordinates'] = [
      '#type' => 'coordinate',
      '#title' => t('coordinates'),
      '#default_value' => isset($element['#default_value']['coordinates']) ? $element['#default_value']['coordinates'] : NULL,
    ];

    return $element;
  }

}
