<?php 

/* Template Name: Resume Template */

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
		
		<h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1>

	</article>
	
	<article class="main">

		<div class="content">
			
			<?php if(have_posts()) : ?>	
			<?php while(have_posts()) : ?>	
				<?php the_post(); ?>	
				<?php the_content();?>
			<?php endwhile; ?>	
			<?php endif; ?>

		</div>
		
	</article>

	<aside class="d-sidebar">
		
		<h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1>

		<nav >
			<?php  wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>

	</aside>

</section>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/resume.js"></script>

<? get_footer(); ?>