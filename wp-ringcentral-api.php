<?php
/**
 * WP RingCentral API (https://ringcentral-api-docs.readthedocs.io/en/latest/)
 *
 * @package WP-RingCentral-API
 */
/*
* Plugin Name: WP CodeClimate API
* Plugin URI: https://github.com/wp-api-libraries/wp-ringcentral-api
* Description: Perform API requests to RingCentral in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Text Domain: wp-ringcentral-api
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-ringcentral-api
* GitHub Branch: master
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

/* Check if class exists. */
if ( ! class_exists( 'RingCentralAPI' ) ) {
	
	/**
	 * RingCentralAPI class.
	 */
	class RingCentralAPI {
		
		/**
		 * API Token.
		 *
		 * @var string
		 */
		static private $api_token;
		
		
		/**
		 * Production URI.
		 * 
		 * (default value: 'https://platform.ringcentral.com')
		 * 
		 * @var string
		 * @access private
		 */
		private $prod_uri = 'https://platform.ringcentral.com';
		
		/**
		 * Dev URI.
		 * 
		 * (default value: 'https://platform.devtest.ringcentral.com')
		 * 
		 * @var string
		 * @access private
		 */
		private $dev_uri = 'https://platform.devtest.ringcentral.com';
		
		/**
		 * __construct function.
		 *
		 * @access public
		 * @param mixed $api_token API Token.
		 * @return void
		 */
		public function __construct( $api_token ) {
			static::$api_token = $api_token;
		}
		
		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {
			$request .= '?api_token=' .static::$api_token;
			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );
			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'wp-ringcentral-api' ), $code ) );
			}
			$body = wp_remote_retrieve_body( $response );
			return json_decode( $body );
		}

		
		/**
		 * Get Call Logs.
		 * 
		 * @access public
		 * @param mixed $account_id Account ID.
		 * @param mixed $extension_id Extension ID.
		 * @return void
		 */
		public function get_call_logs( $account_id, $extension_id ) {
			
			//	/restapi/v1.0/account/{accountId}/extension/{extensionId}/call-log 

		}
		
		public function get_active_calls_logs( $account_id, $extension_id ) {
			// /restapi/v1.0/account/{accountId}/extension/{extensionId}/active-calls 
		}
		
		public function get_call_log( $call_record_id ) {
			// restapi/v1.0/account/{accountId}/extension/{extensionId}/call-log/{callRecordId}
		}
			
			
		public function make_call() {
			
			// http://ringcentral-api-docs.readthedocs.io/en/latest/ring_out/
			// POST /restapi/v1.0/account/~/extension/~/ringout
		}
		
		public function poll_call_status() {
			// GET/restapi/v1.0/account/~/extension/~/ringout/234343434
		}
		
		public function cancel_ringout() {
			// DELETE /restapi/v1.0/account/~/extension/~/ringout/234343434  
		}
		
		public function get_call_queue_list( $account_id, $type ) {
			// GET /restapi/v1.0/account/11111111/extension?type=Department
		}
		
		public function get_agent_queue_list( $account_id, $department_id ) {
			// POST /restapi/v1.0/account/11111111/department/22223333/members

		}

	}
}