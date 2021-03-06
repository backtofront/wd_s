<?php
/**
 * Customizer settings.
 *
 * @package Back to Front Starter
 */

/**
 * Register additional scripts.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 * @author WDS
 */
function back_to_front_starter_customize_additional_scripts( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'back_to_front_starter_header_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'back_to_front_starter_header_scripts',
		array(
			'label'       => esc_html__( 'Header Scripts', 'back_to_front_starter' ),
			'description' => esc_html__( 'Additional scripts to add to the header. Basic HTML tags are allowed.', 'back_to_front_starter' ),
			'section'     => 'back_to_front_starter_additional_scripts_section',
			'type'        => 'textarea',
		)
	);

	// Register a setting.
	$wp_customize->add_setting(
		'back_to_front_starter_footer_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'back_to_front_starter_footer_scripts',
		array(
			'label'       => esc_html__( 'Footer Scripts', 'back_to_front_starter' ),
			'description' => esc_html__( 'Additional scripts to add to the footer. Basic HTML tags are allowed.', 'back_to_front_starter' ),
			'section'     => 'back_to_front_starter_additional_scripts_section',
			'type'        => 'textarea',
		)
	);
}
add_action( 'customize_register', 'back_to_front_starter_customize_additional_scripts' );

/**
 * Register a social icons setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function back_to_front_starter_customize_social_icons( $wp_customize ) {

	// Create an array of our social links for ease of setup.
	$social_networks = array( 'facebook', 'instagram', 'linkedin', 'twitter' );

	// Loop through our networks to setup our fields.
	foreach ( $social_networks as $network ) {

		// Register a setting.
		$wp_customize->add_setting(
			'back_to_front_starter_' . $network . '_link',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url',
			)
		);

		// Create the setting field.
		$wp_customize->add_control(
			'back_to_front_starter_' . $network . '_link',
			array(
				'label'   => /* translators: the social network name. */ sprintf( esc_html__( '%s URL', 'back_to_front_starter' ), ucwords( $network ) ),
				'section' => 'back_to_front_starter_social_links_section',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'back_to_front_starter_customize_social_icons' );

/**
 * Register copyright text setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function back_to_front_starter_customize_copyright_text( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'back_to_front_starter_copyright_text',
		array(
			'default' => '',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		new Text_Editor_Custom_Control(
			$wp_customize,
			'back_to_front_starter_copyright_text',
			array(
				'label'       => esc_html__( 'Copyright Text', 'back_to_front_starter' ),
				'description' => esc_html__( 'The copyright text will be displayed in the footer. Basic HTML tags allowed.', 'back_to_front_starter' ),
				'section'     => 'back_to_front_starter_footer_section',
				'type'        => 'textarea',
			)
		)
	);
}
add_action( 'customize_register', 'back_to_front_starter_customize_copyright_text' );

/**
 * Register header button setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function back_to_front_starter_customize_header_button( $wp_customize ) {

	// Register a setting.
	$wp_customize->add_setting(
		'back_to_front_starter_header_button',
		array(
			'default'           => '',
			'sanitize_callback' => 'back_to_front_starter_sanitize_select',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'back_to_front_starter_header_button',
		array(
			'label'       => esc_html__( 'Header Button', 'back_to_front_starter' ),
			'description' => esc_html__( 'Display a custom button in the header.', 'back_to_front_starter' ),
			'section'     => 'back_to_front_starter_header_section',
			'type'        => 'select',
			'choices'     => array(
				'none'   => esc_html__( 'No button', 'back_to_front_starter' ),
				'search' => esc_html__( 'Trigger a search field', 'back_to_front_starter' ),
				'link'   => esc_html__( 'Link to a custom URL', 'back_to_front_starter' ),
			),
		)
	);

	// Register a setting for the URL.
	$wp_customize->add_setting(
		'back_to_front_starter_header_button_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url',
		)
	);

	// Display the URL field... maybe!
	$wp_customize->add_control(
		'back_to_front_starter_header_button_url',
		array(
			'label'           => esc_html__( 'Header Button URL', 'back_to_front_starter' ),
			'description'     => esc_html__( 'Enter the URL or email address to be used by the button in the header.', 'back_to_front_starter' ),
			'section'         => 'back_to_front_starter_header_section',
			'type'            => 'url',
			'active_callback' => 'back_to_front_starter_customizer_is_header_button_link', // Only displays if the Link option is selected above.
		)
	);

	// Register a setting for the link text.
	$wp_customize->add_setting(
		'back_to_front_starter_header_button_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);

	// Display the text field... maybe!
	$wp_customize->add_control(
		'back_to_front_starter_header_button_text',
		array(
			'label'           => esc_html__( 'Header Button Text', 'back_to_front_starter' ),
			'description'     => esc_html__( 'Enter the text to be displayed in the button in the header.', 'back_to_front_starter' ),
			'section'         => 'back_to_front_starter_header_section',
			'type'            => 'text',
			'active_callback' => 'back_to_front_starter_customizer_is_header_button_link', // Only displays if the Link option is selected above.
		)
	);
}
add_action( 'customize_register', 'back_to_front_starter_customize_header_button' );

/**
 * Sanitizes the select dropdown in the customizer.
 *
 * @author WDS
 * @param string $input  The input.
 * @param string $setting The setting.
 * @return string
 * @author Corey Collins
 */
function back_to_front_starter_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checks to see if the link option is selected in our button settings.
 *
 * @author WDS
 * @return boolean True/False whether or not the Link radio is selected.
 * @author Corey Collins
 */
function back_to_front_starter_customizer_is_header_button_link() {

	// Get our button setting.
	$button_setting = get_theme_mod( 'back_to_front_starter_header_button' );

	if ( 'link' !== $button_setting ) {
		return false;
	}

	return true;
}
