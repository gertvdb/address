<?php

namespace Drupal\locality;

use Drupal\locality\ContinentManagerInterface;
use InvalidArgumentException;

/**
 * Continent.
 *
 * A continent object.
 */
final class Continent implements ContinentInterface {

  /**
   * A continent manager.
   *
   * @var \Drupal\locality\ContinentManagerInterface
   */
  protected $continentManager;

  /**
   * The continent code.
   *
   * @var string|null
   */
  protected $continentCode;

  /**
   * Continent constructor.
   *
   * @param string|null $continent_code
   *   The continent code.
   * @param \Drupal\locality\ContinentManagerInterface $continent_manager
   *   The continent manager.
   *
   * @throws \InvalidArgumentException
   */
  public function __construct(string $continent_code = NULL, ContinentManagerInterface $continent_manager) {
    $this->continentManager = $continent_manager;
    $this->setContinentCode($continent_code);
  }

  /**
   * {@inheritdoc}
   */
  public function getContinentCode() {
    return $this->continentCode ? $this->continentCode : NULL;
  }

  /**
   * Set the continent code.
   *
   * @param string|null $continent_code
   *   The continent code.
   *
   * @throws \InvalidArgumentException
   */
  public function setContinentCode(string $continent_code = NULL) {
    if (!in_array($continent_code, array_keys($this->continentManager->getList()))) {
      throw new InvalidArgumentException(
        'No valid continent code provided!'
      );
    }
    $this->continentCode = strtoupper($continent_code);
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    $list = $this->continentManager->getList();
    return isset($list[$this->getContinentCode()]) ? $list[$this->getContinentCode()] : NULL;
  }

}