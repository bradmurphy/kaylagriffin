<?php 

/* Template Name: Work Template */

?>

<? get_header(); ?>

<?php 
	$post_thumbnail_id = get_post_thumbnail_id();
	$logo = wp_get_attachment_url( $post_thumbnail_id );
?>

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
		
		<a href="<?= site_url(); ?>"><h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1></a>

	</article>
	
	<article class="main">

		<div class="content work-margin">

			<? $cats = get_categories(array("hide_empty" => 0)); ?>

			<? foreach($cats as $c => $cat) : ?>

				<? if($cat->count == "0") : ?>
					<!-- DO NOTHING IF CATEGORY IS EMPTY -->
				<? elseif ($cat->count == "1") : ?>

					<? $query = new WP_Query( array('post_type' => 'so_project', "cat" => $cat->cat_ID, 'order'	=>	'ASC', 'orderby'	=>	'date') ); ?>

					<? if($query -> have_posts()) : ?>
						<? while($query -> have_posts()) : ?>
							<? $query -> the_post(); ?>
							<? 
								$image = get_field('cat_image', $cat)['url'];
								$imageHover = get_field('cat_hover', $cat)['url'];
							?>
							<a href="<?= the_permalink(); ?>">
								<div class="work-circle">
									<img src="<?= $image ?>" alt="Category" class="work-image">
									<img src="<?= $imageHover ?>" alt="Category" class="work-hover">
								</div>
							</a>
						<? endwhile; ?>
					<? endif; ?>

				<? else : ?>

					<? 
						$link = get_category_link($cat->cat_ID);
						$image = get_field('cat_image', $cat)['url'];
						$imageHover = get_field('cat_hover', $cat)['url'];
					?>
					<a href="<?= $link ?>">
						<div class="work-circle">
							<img src="<?= $image ?>" alt="Category" class="work-image">
							<img src="<?= $imageHover ?>" alt="Category" class="work-hover">
						</div>
					</a>

				<? endif; ?>

			<? endforeach; ?>

		</div>
		
	</article>

	<aside class="d-sidebar">
		
		<a href="<?= site_url(); ?>"><h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1></a>

		<nav >
			<?php  wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>

	</aside>

</section>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/work.js"></script>

<? get_footer(); ?>