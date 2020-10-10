<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('debug_to_console')) {

  /*
  Write output to browser console.
   */

  function debug_to_console(...$args) {
    $output = implode(',', $args);

    // PHP Heredocs for multi-line strings with variable interpolations

    echo <<<END
    <script>
      console.log('$output');
    </script>
    END;
  }

}

/**
 * This function is used to print the content of any data
 */

if (!function_exists('pre')) {

  function pre($data) {
    echo '<pre>' . print_r($data) . '</pre>';

    die;
  }

}