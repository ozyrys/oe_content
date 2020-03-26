<?php

namespace Drupal\oe_taxonomy_types;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a taxonomy type association entity type.
 */
interface OeTaxonomyTypeAssociationInterface extends ConfigEntityInterface {

  /**
   * Value indicating an association accepts an unlimited number of values.
   */
  const CARDINALITY_UNLIMITED = -1;

  /**
   * @return string
   */
  public function getLabel(): ?string;

  /**
   * @return string
   */
  public function getField(): ?string;

  /**
   * @return string
   */
  public function getWidgetType(): ?string;

  /**
   * @return string
   */
  public function getTaxonomyType(): ?string;

  /**
   * @return int
   */
  public function getCardinality(): ?int;

  /**
   * @return bool
   */
  public function isRequired(): ?bool;

  /**
   * @return string
   */
  public function getPredicate(): ?string;

  /**
   * @return string
   */
  public function getHelpText(): ?string;

}
