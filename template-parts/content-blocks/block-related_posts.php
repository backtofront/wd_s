<?php
/**
 * The template used for displaying related posts.
 *
 * @package Back to Front Starter
 */

// Set up fields.
$block_title   = get_sub_field( 'title' );
$related_posts = get_sub_field( 'related_posts' );

// Display section if we have any posts.
if ( $related_posts ) :

	// Start a <container> with possible block options.
	back_to_front_starter_display_block_options(
		array(
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'content-block related-posts-block', // Container class.
		)
	);
	?>

		<div class="container">
			<?php if ( $block_title ) : ?>
				<h2 class="content-block-title"><?php echo esc_html( $block_title ); ?></h2>
			<?php endif; ?>
		</div>

		<div class="container display-flex<?php echo esc_attr( back_to_front_starter_get_animation_class() ); ?>">

			<?php
			// Loop through recent posts.
			foreach ( $related_posts as $key => $post ) :// @codingStandardsIgnoreLine

				// Convert post object to post data.
				setup_postdata( $post );

						// Display a card.
				back_to_front_starter_display_card(
					array(
						'title' => get_the_title(),
						'image' => back_to_front_starter_get_post_image_url( 'medium' ),
						'text'  => back_to_front_starter_get_the_excerpt(
							array(
								'length' => 20,
								'more'   => '...',
							)
						),
						'url'   => get_the_permalink(),
						'class' => 'third',
					)
				);

			endforeach;
			wp_reset_postdata();
		?>
		</div><!-- .container -->
	</section><!-- .recent-posts -->
<?php endif; ?>
