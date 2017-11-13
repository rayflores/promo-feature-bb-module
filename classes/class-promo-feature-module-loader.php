<?php
	
/**
 * A class that handles loading custom modules and custom
 * fields if the builder is installed and activated.
 */
class Promo_Feature_Module_Loader {
	
	/**
	 * Initializes the class once all plugins have loaded.
	 */
	static public function init() {
		add_action( 'plugins_loaded', __CLASS__ . '::setup_hooks' );
	}
	
	/**
	 * Setup hooks if the builder is installed and activated.
	 */
	static public function setup_hooks() {
		if ( ! class_exists( 'FLBuilder' ) ) {
			return;	
		}
		
		// Load custom modules.
		add_action( 'init', __CLASS__ . '::load_modules' );
		
		// Register custom fields.
		add_filter( 'fl_builder_custom_fields', __CLASS__ . '::register_fields' );
		
		// Enqueue custom field assets.
		add_action( 'init', __CLASS__ . '::enqueue_field_assets' );
	}
	
	/**
	 * Loads our custom modules.
	 */
	static public function load_modules() {
		require_once PROMO_FEATURE_FL_MODULE_DIR . 'modules/promo-feature/index.php';
	}
	
	/**
	 * Registers our custom fields.
	 * NOT NEEDED FOR NOW 11-9-2017
	 */
	static public function register_fields( $fields ) {
		//$fields['my-custom-field'] = PROMO_FEATURE_FL_MODULE_DIR . 'fields/my-custom-field.php';
		return $fields;
	}
	
	/**
	 * Enqueues our custom field assets only if the builder UI is active.
	 * NOT NEEDED FOR NOW 11-9-2017
	 */
	static public function enqueue_field_assets() {
		if ( ! FLBuilderModel::is_builder_active() ) {
			return;
		}
		
		// wp_enqueue_style( 'my-custom-fields', FL_MODULE_EXAMPLES_URL . 'assets/css/fields.css', array(), '' );
		// wp_enqueue_script( 'my-custom-fields', FL_MODULE_EXAMPLES_URL . 'assets/js/fields.js', array(), '', true );
	}
}

Promo_Feature_Module_Loader::init();