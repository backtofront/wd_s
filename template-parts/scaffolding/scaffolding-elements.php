<?php
/**
 * The template used for displaying generic elements in the scaffolding library.
 *
 * @package Back to Front Starter
 */

?>

<section class="section-scaffolding">

	<h2 class="scaffolding-heading"><?php esc_html_e( 'Generic Elements', 'back_to_front_starter' ); ?></h2>

	<?php
	// Right-aligned Image.
	back_to_front_starter_display_scaffolding_section(
		array(
			'title'       => 'Numeric Pagination',
			'description' => 'Display numeric pagination.',
			'usage'       => 'back_to_front_starter_display_numeric_pagination()',
			'output'      => '
				<nav class="pagination-container">
					<a class="prev page-numbers" href="#>«</a>
					<a class="page-numbers" href="#">1</a>
					<span aria-current="page" class="page-numbers current">2</span>
					<a class="page-numbers" href="#">3</a>
					<a class="next page-numbers" href="#">»</a>
				</nav>
			',
		)
	);

	?>
</section>
