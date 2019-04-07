<?php
/**
 * Customizer sections.
 *
 * @package Back to Front Starter
 */

/**
 * Register the section sections.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function back_to_front_starter_customize_sections( $wp_customize ) {

	// Register additional scripts section.
	$wp_customize->add_section(
		'back_to_front_starter_additional_scripts_section',
		array(
			'title'    => esc_html__( 'Additional Scripts', 'back_to_front_starter' ),
			'priority' => 10,
			'panel'    => 'site-options',
		)
	);

	// Register a social links section.
	$wp_customize->add_section(
		'back_to_front_starter_social_links_section',
		array(
			'title'       => esc_html__( 'Social Media', 'back_to_front_starter' ),
			'description' => esc_html__( 'Links here power the display_social_network_links() template tag.', 'back_to_front_starter' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		)
	);

	// Register a header section.
	$wp_customize->add_section(
		'back_to_front_starter_header_section',
		array(
			'title'    => esc_html__( 'Header Customizations', 'back_to_front_starter' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);

	// Register a footer section.
	$wp_customize->add_section(
		'back_to_front_starter_footer_section',
		array(
			'title'    => esc_html__( 'Footer Customizations', 'back_to_front_starter' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);
}
add_action( 'customize_register', 'back_to_front_starter_customize_sections' );
