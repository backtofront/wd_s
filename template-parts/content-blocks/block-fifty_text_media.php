<?php
/**
 *  The template used for displaying fifty/fifty text/media.
 *
 * @package Back to Front Starter
 */

// Set up fields.
$image_data = get_sub_field( 'media_right' );
$text       = get_sub_field( 'text_primary' );

// Start a <container> with a possible media background.
back_to_front_starter_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block grid-container fifty-fifty fifty-text-media', // Container class.
	)
);
?>
	<div class="display-flex container<?php echo esc_attr( back_to_front_starter_get_animation_class() ); ?>">

		<div class="half">
			<?php echo back_to_front_starter_get_the_content( $text ); // WPCS: XSS OK. ?>
		</div>

		<div class="half">
			<img class="fifty-media-image" src="<?php echo esc_url( $image_data['url'] ); ?>" alt="<?php echo esc_html( $image_data['alt'] ); ?>">
		</div>

	</div><!-- .container -->
</section><!-- .fifty-text-media -->
