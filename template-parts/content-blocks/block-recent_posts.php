<?php
/**
 * The template used for displaying a recent posts block.
 *
 * This block will either display all recent posts or posts
 * from a specific category. The amount of posts can be
 * limited through the admin.
 *
 * @package Back to Front Starter
 */

// Set up fields.
$block_title = get_sub_field( 'title' );
$post_count  = get_sub_field( 'number_of_posts' );
$categories  = get_sub_field( 'categories' );
$tags        = get_sub_field( 'tags' );

// Variable to hold query args.
$args = array();

// Only if there are either categories or tags.
if ( $categories || $tags ) {
	$args = back_to_front_starter_get_recent_posts_query_arguments( $categories, $tags );
}

// Always merge in the number of posts.
$args['posts_per_page'] = is_numeric( $post_count ) ? $post_count : 3;

// Get the recent posts.
$recent_posts = back_to_front_starter_get_recent_posts( $args );

// Display section if we have any posts.
if ( $recent_posts->have_posts() ) :

	// Start a <container> with possible block options.
	back_to_front_starter_display_block_options(
		array(
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'content-block recent-posts-block', // Container class.
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
			while ( $recent_posts->have_posts() ) :
				$recent_posts->the_post();

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

			endwhile;
			wp_reset_postdata();
			?>
		</div><!-- .container -->
	</section><!-- .recent-posts -->
<?php endif; ?>
