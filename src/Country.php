<?php

namespace Drupal\locality;

use Drupal\Core\Locale\CountryManagerInterface;
use InvalidArgumentException;

/**
 * Country.
 *
 * A country object.
 */
final class Country implements CountryInterface {

  /**
   * A country manager.
   *
   * @var \Drupal\Core\Locale\CountryManagerInterface
   */
  protected $countryManager;

  /**
   * The country code.
   *
   * @var string|null
   */
  protected $countryCode;

  /**
   * Country constructor.
   *
   * @param string|null $country_code
   *   The country code.
   * @param \Drupal\Core\Locale\CountryManagerInterface $country_manager
   *   The country manager.
   *
   * @throws \InvalidArgumentException
   */
  public function __construct(string $country_code = NULL, CountryManagerInterface $country_manager) {
    $this->countryManager = $country_manager;
    $this->setCountryCode($country_code);
  }

  /**
   * {@inheritdoc}
   */
  public function getCountryCode() {
    return $this->countryCode ? $this->countryCode : NULL;
  }

  /**
   * Set the country code.
   *
   * @param string|null $country_code
   *   The country code.
   *
   * @throws \InvalidArgumentException
   */
  public function setCountryCode(string $country_code) {
    if (!in_array($country_code, array_keys($this->countryManager->getList()))) {
      throw new InvalidArgumentException(
        'No valid country code provided!'
      );
    }
    $this->countryCode = strtoupper($country_code);
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    $list = $this->countryManager->getList();
    return isset($list[$this->getCountryCode()]) ? $list[$this->getCountryCode()] : NULL;
  }

}