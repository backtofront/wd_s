<?php
/**
 * The template used for displaying a Hero block.
 *
 * @package Back to Front Starter
 */

// Set up fields.
$block_title = get_sub_field( 'title' );
$text        = get_sub_field( 'text' );

// Start a <container> with possible block options.
back_to_front_starter_display_block_options(
	array(
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block hero-block', // Container class.
	)
);
?>
	<div class="container hero-content<?php echo esc_attr( back_to_front_starter_get_animation_class() ); ?>">
		<?php back_to_front_starter_display_hero_heading( $block_title ); ?>

		<?php if ( $text ) : ?>
			<p class="hero-description"><?php echo esc_html( $text ); ?></p>
		<?php endif; ?>

		<?php
		back_to_front_starter_display_link(
			array(
				'button' => true,
				'class'  => 'button-hero',
			)
		);
		?>
	</div><!-- .hero-content-->
</section><!-- .hero -->
