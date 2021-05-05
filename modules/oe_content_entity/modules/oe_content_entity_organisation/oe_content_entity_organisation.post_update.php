<?php

/**
 * @file
 * Post update functions for OpenEuropa Content Entity Organisation module.
 */

declare(strict_types = 1);

use Drupal\Core\Config\FileStorage;

/**
 * Create oe_stakeholder bundle.
 */
function oe_content_entity_organisation_post_update_00001(): void {
  // Obtain configuration from yaml files.
  $storage = new FileStorage(drupal_get_path('module', 'oe_content_entity_organisation') . '/config/post_updates/00001_create_stakeholder_bundle');
  \Drupal::service('config.installer')->installOptionalConfig($storage);
}

/**
 * Set address subfields as optional.
 */
function oe_content_entity_organisation_post_update_00002(): void {
  $file_storage = new FileStorage(drupal_get_path('module', 'oe_content_entity_organisation') . '/config/post_updates/00002_address_optional');
  $storage = \Drupal::entityTypeManager()->getStorage('field_config');
  $values = $file_storage->read('field.field.oe_organisation.oe_stakeholder.oe_address');
  $field_setting = $storage->load($values['id']);
  if ($field_setting) {
    $storage->updateFromStorageRecord($field_setting, $values);
    $field_setting->save();
  }
}
