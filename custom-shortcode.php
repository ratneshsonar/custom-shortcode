<?php
/**
 * Plugin Name:       Custom Shortcode
 * Plugin URI:        https://lazlo.in/plugins/Custom Shortcode/
 * Description:       Plugin to add custom shortcode to get the oldest five post.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shubham Gupta
 * Author URI:        https://lazlo.in/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://lazlo.in/my-plugin/
 * Text Domain:       custom-shortcode-plugin
 * Domain Path:       /languages
 *
 * @package plugins
 */

add_shortcode( 'custom_shortcode', 'custom_shortcode_get_posts' );

/** Function to get 5 oldest post*/
function custom_shortcode_get_posts() {

	$args = array(
		'post_status'   => 'publish',
		'post_per_page' => 5,
		'orderby'       => 'post_date',
		'order'         => 'DESC',
	);

	$oldest_posts_query = new WP_Query( $args );

	print_r( $oldest_posts_query->posts );
	
	//Loops to get post from $old_post
	foreach ( $oldest_posts_query->posts as $old_post ) {
		include 'templates/custom-shortcode.php';
	}
}
