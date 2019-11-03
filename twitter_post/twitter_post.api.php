<?php

/**
 * @file
 * Describe hooks provided by the Twitter post module.
 */

/**
 * Alter the twitter user settings page.
 *
 * @param $node
 *   A fully-populated node object.
 *
 * @return array $files
 *   An array of Drupal managed files.
 */
function hook_twitter_post_node_insert_files($node) {
  $files = array();

  if (empty($node->field_teaser_image[LANGUAGE_NONE])) {
    return $files;
  }

  foreach ($node->field_teaser_image[LANGUAGE_NONE] as $file) {
    $files[] = file_load($file['fid']);
  }

  return $files;
}