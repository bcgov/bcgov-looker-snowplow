<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://cos.citz.gov.bc.ca/jira/browse/WD-608
 * @since      1.0.0
 *
 * @package    BCGov_Looker_Snowplow
 * @subpackage BCGov_Looker_Snowplow/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    BCGov_Looker_Snowplow
 * @subpackage BCGov_Looker_Snowplow/admin
 * @author     Steve Howard <Steve.M.Howard@gov.bc.ca>
 */
class BCGov_Looker_Snowplow_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bcgov-looker-snowplow-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bcgov-looker-snowplow-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add the network settings menu.
	 *
	 * @since    1.1.0
	 */
	public function add_network_settings_menu() {

		add_submenu_page(
			'settings.php',
			'Snowplow Settings',
			'Snowplow Settings',
			'manage_network_options',
			'bcgov-network-settings',
			array( $this, 'snowplow_network_settings_page')
		);
	}

	/**
	 * Add the network settings menu.
	 *
	 * @reference: https://zao.is/blog/2013/07/03/adding-settings-to-network-settings-for-wordpress-multisite/
	 *
	 * @since    1.1.0
	 */
	public function snowplow_network_settings_page() {

		// A cheat... kind of. We know the form will post to this page...
		if ( isset( $_POST['bcgov-looker-snowplow'] ) ) {
			$this->save_snowplow_network_settings();
		}
		$settings = $this->get_snowplow_network_settings();
		$form_url = esc_url(
				    add_query_arg(
				       'page',
				       'bcgov-network-settings',
				       network_admin_url( 'settings.php' )
				    ) );
		?>
        <h1><?php _e( 'Snowplow Settings' ); ?></h1>
        <form action="<?php echo $form_url; ?>" method="post">
        <table id="menu" class="form-table">
            <?php
                foreach ( $settings as $setting ) :
            ?>

            <tr valign="top">
                <th scope="row"><?php echo $setting['name']; ?></th>
                <td>
                    <input type="<?php echo $setting['type'];?>" class="<?php echo $setting['class'];?>" name="bcgov-looker-snowplow[<?php echo $setting['id']; ?>]" value="<?php echo esc_attr( get_site_option( $setting['id'] ) ); ?>" />
                    <br /><?php echo $setting['desc']; ?>
                </td>
            </tr>
            <?php
        endforeach;
        echo '</table>';
        @submit_button();
        echo '</form>';
	}

	/**
	 * Add the network settings fields
	 *
	 * @since    1.1.0
	 */
	public static function get_snowplow_network_settings() {

		$settings[] = array(
			'id'   => 'bcgov-snowplow-network-appid',
			'name' => __( 'App ID' ),
			'desc' => __( 'The App ID for the multisite. Defaults to "Snowplow_standalone"' ),
			'type' => 'text',
			'size' => 'regular',
			'class'=> 'regular-text'
		);

		$settings[] = array(
			'id'   => 'bcgov-snowplow-network-collector-url',
			'name' => __( 'Collector URL' ),
			'desc' => __( 'The URL for the Snowplow collector. Defaults to "spt.apps.gov.bc.ca"' ),
			'type' => 'text',
			'size' => 'regular',
			'class'=> 'regular-text'
		);

		return apply_filters( 'plugin_settings', $settings );
	}

	public static function save_snowplow_network_settings() {
        $posted_settings  = array_map( 'sanitize_text_field', $_POST['bcgov-looker-snowplow'] );

        foreach ( $posted_settings as $name => $value ) {
            update_site_option( $name, $value );
        }
    }


}
