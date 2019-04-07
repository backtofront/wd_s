<?php
/**
 * Customizer panels.
 *
 * @package Back to Front Starter
 */

/**
 * Add a custom panels to attach sections too.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function back_to_front_starter_customize_panels( $wp_customize ) {

	// Register a new panel.
	$wp_customize->add_panel(
		'site-options',
		array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Site Options', 'back_to_front_starter' ),
			'description'    => esc_html__( 'Other theme options.', 'back_to_front_starter' ),
		)
	);
}
add_action( 'customize_register', 'back_to_front_starter_customize_panels' );
