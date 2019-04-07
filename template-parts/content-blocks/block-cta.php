<?php
/**
 * The template used for displaying a CTA block.
 *
 * @package Back to Front Starter
 */

// Set up fields.
$block_title = get_sub_field( 'title' );
$text        = get_sub_field( 'text' );

// Start a <container> with possible block options.
back_to_front_starter_display_block_options(
	array(
		'container' => 'aside', // Any HTML5 container: section, div, etc...
		'class'     => 'content-block cta-block', // Container class.
	)
);
?>
	<div class="container display-flex align-center<?php echo esc_attr( back_to_front_starter_get_animation_class() ); ?>">
		<header>
			<?php if ( $block_title ) : ?>
				<h1 class="cta-title"><?php echo esc_html( $block_title ); ?></h1>
			<?php endif; ?>

			<?php if ( $text ) : ?>
				<h2 class="cta-text"><?php echo esc_html( $text ); ?></h2>
			<?php endif; ?>
		</header>

		<?php
		back_to_front_starter_display_link(
			array(
				'button' => true,
				'class'  => 'button-cta',
			)
		);
		?>
	</div><!-- .container -->
</aside><!-- .cta-block -->
