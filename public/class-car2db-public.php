<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://car2db.com
 * @since      1.0.0
 *
 * @package    Car2db
 * @subpackage Car2db/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Car2db
 * @subpackage Car2db/public
 * @author     Car2DB dev team <support@car2db.com>
 */
class Car2db_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->init_hooks();
	}
	
	public function init_hooks() {
	    add_action('wp_ajax_car2db_get_types',        array($this,'car2db_get_types_callback'));
	    add_action('wp_ajax_nopriv_car2db_get_types', array($this,'car2db_get_types_callback'));
	    add_action('wp_ajax_car2db_get_makes',        array($this,'car2db_get_makes_callback'));
	    add_action('wp_ajax_nopriv_car2db_get_makes', array($this,'car2db_get_makes_callback'));
	    add_action('wp_ajax_car2db_get_models',       array($this,'car2db_get_models_callback'));
	    add_action('wp_ajax_nopriv_car2db_get_models',array($this,'car2db_get_models_callback'));
	    add_action('wp_ajax_car2db_get_generations',       array($this,'car2db_get_generations_callback'));
	    add_action('wp_ajax_nopriv_car2db_get_generations',array($this,'car2db_get_generations_callback'));
	    add_action('wp_ajax_car2db_get_series',           array($this,'car2db_get_series_callback'));
	    add_action('wp_ajax_nopriv_car2db_get_series',    array($this,'car2db_get_series_callback'));
	    add_action('wp_ajax_car2db_get_trims',            array($this,'car2db_get_trims_callback'));
	    add_action('wp_ajax_nopriv_car2db_get_trims',     array($this,'car2db_get_trims_callback'));
	    add_action('wp_ajax_car2db_get_equipments',       array($this,'car2db_get_equipments_callback'));
	    add_action('wp_ajax_nopriv_car2db_get_equipments',array($this,'car2db_get_equipments_callback'));

	}
	
	public function car2db_get_types_callback(){
	    global $wpdb;
	    
	    $query = "SELECT id_car_type as id, name FROM car_type";
	    $elementList = $wpdb->get_results($query);

	    wp_send_json_success($elementList);
	}
	
	public function car2db_get_makes_callback(){
	    global $wpdb;
	    $elementList = [];
	    
	    $filterElementVal = $_GET['filter_element_val'] ?: null;
	    if (empty($filterElementVal)){
	        wp_send_json_success($elementList);
	    }
	    
	    $query = "SELECT id_car_make as id, name FROM car_make WHERE id_car_type = {$filterElementVal}";
	    $elementList = $wpdb->get_results($query);

	    wp_send_json_success($elementList);
	}
	
	public function car2db_get_models_callback(){
	    global $wpdb;
	    $elementList = [];
	    
	    $filterElementVal = $_GET['filter_element_val'] ?: null;
	    if (empty($filterElementVal)){
	        wp_send_json_success($elementList);
	    }
	    
	    $query = "SELECT id_car_model as id, name FROM car_model WHERE id_car_make = {$filterElementVal}";
	    $elementList = $wpdb->get_results($query);
	    
	    wp_send_json_success($elementList);
	}
	
	public function car2db_get_generations_callback(){
	    global $wpdb;
	    $elementList = [];
	    
	    $filterElementVal = $_GET['filter_element_val'] ?: null;
	    if (empty($filterElementVal)){
	        wp_send_json_success($elementList);
	    }
	    
	    $query = "SELECT id_car_generation as id, CONCAT(name, ' (', year_begin, '-', year_end, ')') as name FROM car_generation WHERE id_car_model = {$filterElementVal}";
	    $elementList = $wpdb->get_results($query);
	    
	    wp_send_json_success($elementList);
	}
	
	public function car2db_get_series_callback(){
	    global $wpdb;
	    $elementList = [];
	    
	    $filterElementVal = $_GET['filter_element_val'] ?: null;
	    if (empty($filterElementVal)){
	        wp_send_json_success($elementList);
	    }
	    
	    $query = "SELECT id_car_serie as id, name FROM car_serie WHERE id_car_generation = {$filterElementVal}";
	    $elementList = $wpdb->get_results($query);
	    
	    wp_send_json_success($elementList);
	}
	
	public function car2db_get_trims_callback(){
	    global $wpdb;
	    $elementList = [];
	    
	    $filterElementVal = $_GET['filter_element_val'] ?: null;
	    if (empty($filterElementVal)){
	        wp_send_json_success($elementList);
	    }
	    
	    $query = "SELECT id_car_trim as id, name FROM car_trim WHERE id_car_serie = {$filterElementVal}";
	    $elementList = $wpdb->get_results($query);
	    
	    wp_send_json_success($elementList);
	}
	
	public function car2db_get_equipments_callback(){
	    global $wpdb;
	    $elementList = [];
	    
	    $filterElementVal = $_GET['filter_element_val'] ?: null;
	    if (empty($filterElementVal)){
	        wp_send_json_success($elementList);
	    }
	    
	    $query = "SELECT id_car_equipment as id, name FROM car_equipment WHERE id_car_trim = {$filterElementVal}";
	    $elementList = $wpdb->get_results($query);
	    
	    wp_send_json_success($elementList);
	}
	
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Car2db_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Car2db_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/car2db-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Car2db_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Car2db_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	    echo "<script type=\"text/javascript\">var ajaxurl = \"".admin_url('admin-ajax.php')."\";</script>";
	    
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/car2db-public.js', array( 'jquery' ), $this->version, false );

	}
	
	
	public function view(?array $params) {
	    extract($params);
	    $file = plugin_dir_path( __FILE__ ) . 'partials/car2db-public-display.php';
	    
	    include( $file );
	}
}
