<?php
/**
 * Plugin Name: Elementor Job List Widget
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Iqbal Hossen
 * Text Domain: job_list_table
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register oEmbed Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_job_list( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/job_list.php' );

	$widgets_manager->register( new \Elementor_Job_List() );

}
add_action( 'elementor/widgets/register', 'register_job_list' );