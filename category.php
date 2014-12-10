<? get_header(); ?>

<section class="wrap">

	<div id="nav-icon">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	 </div>

	<aside class="m-sidebar">
		<span class="menu">Menu</span>
		<hr>
		<nav >
			<?php  wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>
		<hr>

	</aside>

	<article class="mobile">

		<?
			$logoArgs = array (
				'page_id'	=> '2',
			);

			$logoQuery = new WP_Query( $logoArgs );
		?>
		<? if($logoQuery->have_posts()) : ?>
			<? while($logoQuery->have_posts()) : ?>
			<? $logoQuery->the_post(); ?>
				<?php 
					$post_thumbnail_id = get_post_thumbnail_id();
					$logo = wp_get_attachment_url( $post_thumbnail_id );
				?>
				<h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1>

			<? endwhile; ?>
		<? endif; ?>

	</article>
	
	<article class="main">

		<div class="content  work-margin">

			<?
				$pArgs = array (
					'post_type'	=>	'so_project',
					'order'	=>	'ASC', 
					'orderby'	=>	'date',
					'cat' => $cat,
				);

				// The Query
				$pQuery = new WP_Query( $pArgs );
			?>

			<? if( $pQuery -> have_posts() ) : ?>
				<? while ($pQuery -> have_posts() ) : ?>
				<? $pQuery -> the_post(); ?>
					<? 
						$image = get_field('project_image')['url'];
						$imageHover = get_field('project_hover')['url'];
					?>
					<a href="<?= the_permalink(); ?>">
						<div class="work-circle">
							<img src="<?= $image ?>" alt="Category" class="work-image">
							<img src="<?= $imageHover ?>" alt="Category" class="work-hover">
						</div>
					</a>

				<? endwhile; ?>
			<? endif; ?>

		</div>
		
	</article>

	<aside class="d-sidebar">
		
		<?
			$logoArgs = array (
				'page_id'	=> '2',
			);

			$logoQuery = new WP_Query( $logoArgs );
		?>
		<? if($logoQuery->have_posts()) : ?>
			<? while($logoQuery->have_posts()) : ?>
			<? $logoQuery->the_post(); ?>
				<?php 
					$post_thumbnail_id = get_post_thumbnail_id();
					$logo = wp_get_attachment_url( $post_thumbnail_id );
				?>

				<h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1>

			<? endwhile; ?>
		<? endif; ?>

		<nav >
			<?php  wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>

	</aside>

</section>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/work.js"></script>

<? get_footer(); ?>