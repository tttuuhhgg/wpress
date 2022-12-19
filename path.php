<?php
//if ( ! defined( 'ABSPATH' ) ) {
//	define( 'ABSPATH', __DIR__ . '/' );
//}

if ( !defined('ABSPATH') ) {
  define('ABSPATH', dirname(__FILE__) . '/');
}
  define('WP_TEMP_DIR', ABSPATH.'wp-content/tmp');
  define("FS_METHOD", "direct");
  define("FS_CHMOD_DIR", 0777);
  define("FS_CHMOD_FILE", 0777);
  echo constant('WP_TEMP_DIR');
?>