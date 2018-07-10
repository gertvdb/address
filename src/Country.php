<?php

namespace Drupal\locality;

use Drupal\Core\Locale\CountryManager;
use InvalidArgumentException;

/**
 * Country.
 *
 * A country object.
 */
final class Country implements CountryInterface {

  /**
   * The country code.
   *
   * @var string|null
   */
  protected $countryCode;

  /**
   * Constructor.
   *
   * @throws \InvalidArgumentException
   */
  public function __construct(string $country_code = NULL) {
    if (!in_array($country_code, array_keys(CountryManager::getStandardList()))) {
      throw new InvalidArgumentException(
        'No valid country code provided!'
      );
    }
    $this->countryCode = strtoupper($country_code);
  }

  /**
   * {@inheritdoc}
   */
  public function getCountryCode() {
    return $this->countryCode ? $this->countryCode : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getIso3CountryCode() {
    $list = Iso3CountryManager::getIso2ToIso3List();
    return isset($list[$this->countryCode]) ? $list[$this->countryCode] : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    $list = CountryManager::getStandardList();
    return isset($list[$this->getCountryCode()]) ? $list[$this->getCountryCode()] : NULL;
  }

}