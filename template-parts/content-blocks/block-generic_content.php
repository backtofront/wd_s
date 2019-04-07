<?php
/**
 * The template used for displaying a generic content block.
 *
 * @package Back to Front Starter
 */

// Set up fields.
$block_title = get_sub_field( 'title' );
$content     = get_sub_field( 'content' );

// Start a <container> with possible block options.
back_to_front_starter_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block generic-block', // Container class.
	)
);
?>
	<div class="container<?php echo esc_attr( back_to_front_starter_get_animation_class() ); ?>">

		<?php if ( $block_title ) : ?>
			<h2 class="generic-content-title"><?php echo esc_html( $block_title ); ?></h2>
		<?php endif; ?>

		<?php echo back_to_front_starter_get_the_content( $content ); // WP XSS OK. ?>

	</div><!-- .container -->
</section><!-- .generic-content -->
