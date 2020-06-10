<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/bcgov/bcgov-looker-snowplow.git
 * @since      1.0.0
 *
 * @package    BCGov_Looker_Snowplow
 * @subpackage BCGov_Looker_Snowplow/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    BCGov_Looker_Snowplow
 * @subpackage BCGov_Looker_Snowplow/includes
 * @author     Steve Howard <Steve.M.Howard@gov.bc.ca>
 */
class BCGov_Looker_Snowplow_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bcgov-looker-snowplow',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
