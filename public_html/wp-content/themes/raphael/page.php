<?php get_header() ?>

	<!-- BREADCRUMBS -->
	<div class="breadcrumbs">
		<div class="container">
			<?php adsTmpl::breadcrumbs() ?>
		</div>
	</div>
	<!-- SINGLE -->
	<div class="page-content">
		<div class="container">

			<?php if (have_posts()) : while (have_posts()) : the_post() ?>

				<h1><?php the_title() ?></h1>

				<?php the_content() ?>

			<?php endwhile; endif; ?>

		</div>
	</div>

<?php get_footer() ?>