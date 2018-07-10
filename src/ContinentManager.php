<?php

namespace Drupal\locality;

use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides list of countries.
 */
class ContinentManager implements ContinentManagerInterface {

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * An array of continent code => continent name pairs.
   *
   * @var array
   */
  protected $continents;

  /**
   * Constructor.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(ModuleHandlerInterface $module_handler) {
    $this->moduleHandler = $module_handler;
  }

  /**
   * Get an array of all two-letter country code => country name pairs.
   *
   * @return array
   *   An array of country code => country name pairs.
   */
  public static function getStandardList() {
    $continents = array(
      'AF' => t('Africa'),
      'AN' => t('Antarctica'),
      'AS' => t('Asia'),
      'EU' => t('Europe'),
      'NA' => t('North america'),
      'OC' => t('Oceania'),
      'SA' => t('South america'),
    );

    // Sort the list.
    natcasesort($continents);
    return $continents;
  }

  /**
   * Get an array of country code => country name pairs, altered by alter hooks.
   *
   * @return array
   *   An array of country code => country name pairs.
   *
   * @see \Drupal\Core\Locale\CountryManager::getStandardList()
   */
  public function getList() {

    // Populate the country list if it is not already populated.
    if (!isset($this->continents)) {
      $this->continents = static::getStandardList();
      $this->moduleHandler
        ->alter('countries', $this->continents);
    }
    return $this->continents;
  }

}