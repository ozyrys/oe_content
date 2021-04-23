<?php

/**
 * @file
 * Post update functions for OpenEuropa Content Entity Organisation module.
 */

declare(strict_types = 1);

use Drupal\Core\Config\FileStorage;

/**
 * Set address subfields as optional.
 */
function oe_content_entity_venue_post_update_00001(): void {
  $file_storage = new FileStorage(drupal_get_path('module', 'oe_content_entity_contact') . '/config/post_updates/00001_address_optional');
  $storage = \Drupal::entityTypeManager()->getStorage('field_config');
  $values = $file_storage->read('field.field.oe_venue.oe_default.oe_address');
  $field_setting = $storage->load($values['id']);
  if ($field_setting) {
    $storage->updateFromStorageRecord($field_setting, $values);
    $field_setting->save();
  }
}
