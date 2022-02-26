<?php
namespace Jakaria\My_Block;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Admin
 * @author Jakaria Istauk <jakariamd35@gmail.com>
 */
class Admin{
    /**
    * Internationalization
    */
   public function i18n() {
       load_plugin_textdomain( 'my-block', false, MYBLOCK_DIR . '/languages/' );
   }
}