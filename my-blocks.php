<?php
/**
 * Plugin Name: My Blocks
 * Description: Gutenburg custom blocks. 
 * Author: Jakaria Istauk
 * Version: 1.0.0
 * Author URI: https://profiles.wordpress.org/jakariaistauk/#content-plugins
 * Text Domain: my-block
 * Domain Path: /languages
 *
 */

namespace Jakaria\My_Block;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Main class for the plugin
 * @package Plugin
 * @author Jakaria <jakariamd35@gmail.com>
 */
final class Plugin {
    
    public static $_instance;

    public function __construct() {
        $this->include();
        $this->define();
        $this->hook();
    }

    /**
     * Includes files
     */
    public function include() {
        require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );
    }

    /**
     * Define variables and constants
     */
    public function define() {
        // constants
        define( 'MYBLOCK', __FILE__ );
        define( 'MYBLOCK_DIR', dirname( MYBLOCK ) );
        define( 'MYBLOCK_ASSETS', plugins_url( 'assets', MYBLOCK ) );
    }

    /**
     * Hooks
     */
    public function hook() {

        if ( is_admin() ):
            $admin = new Admin;
            add_action( 'plugins_loaded', [ $admin, 'i18n'] );
        
        else:
            $front = new Front;
            add_action( 'wp_enqueue_scripts', [ $front, 'enqueue_scripts' ] );
        endif;

    }
 
    /**
     * Cloning is forbidden.
     */
    public function __clone() { }

    /**
     * Unserializing instances of this class is forbidden.
     */
    public function __wakeup() { }

    /**
     * Instantiate the plugin
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}

Plugin::instance();