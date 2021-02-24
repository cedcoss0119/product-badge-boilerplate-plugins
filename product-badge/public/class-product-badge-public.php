<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://cedcoss.com/
 * @since      1.0.0
 *
 * @package    Product_Badge
 * @subpackage Product_Badge/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Product_Badge
 * @subpackage Product_Badge/public
 * @author     Abdullah Shaikh <cedcoss@gmail.com>
 */
class Product_Badge_Public {

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
		 * defined in Product_Badge_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Product_Badge_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/product-badge-public.css', array(), $this->version, 'all' );

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
		 * defined in Product_Badge_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Product_Badge_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/product-badge-public.js', array( 'jquery' ), $this->version, false );

	}

	// hook
		/**
	 * Function : Ced_addSoldOutBadge
	 * Description : Whenever the Product Stock will Be 0 or less then Zero this will Show sold out Badges
	 *
	 * @return void
	 * Version:1.0.0
	 * Since:1.0.0
	 * @var $post 
	 * @var $product 
	 */

	public function ced_addSoldOutBadge()
	{
		global $product;
		if (!$product->is_in_stock()) {
			echo  '<span class="onsale" style="background-color:#EDDA74; ">' . esc_html__('Sold OUT!', 'woocommerce') . '</span>';
		} else {
			echo  '<span class="onsale">' . esc_html__('Sale Available!', 'woocommerce') . '</span>';
		}
	}

	public function heading_before_commerce()
	{
		echo "<h1>This is checkout page heading, it's custom creation";
	}


	public function ced_modify_checkoutField($fields)
	{
		$fields['billing']['billing_first_name']['label'] = 'Enter First Name';
		$fields['billing']['billing_first_name']['placeholder'] = 'Enter First Name';

		$fields['billing']['billing_last_name']['label'] = 'Enter Last Name';
		$fields['billing']['billing_last_name']['placeholder'] = 'Enter Last Name';

		$fields['billing']['billing_company']['placeholder'] = 'Enter Company name';

		$fields['billing']['billing_country']['label'] = 'Choose Country / Region';

		$fields['billing']['billing_address_1']['placeholder'] = 'Enter Street';

		$fields['billing']['billing_email']['label'] = 'Email';
		$fields['billing']['billing_phone']['label'] = 'Mobile';

		$fields['order']['order_comments']['placeholder'] = 'My new placeholder for address';
	    
		return $fields;

	}

	// Add our custom function
	public function my_function_before_single_product() {
		echo '<h2>Everything is 50% off today!</h2>';
	}


}
