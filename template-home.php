<?php 

/* Template Name: Homepage Template */

?>

<? get_header(); ?>

<?php 
	$post_thumbnail_id = get_post_thumbnail_id();
	$logo = wp_get_attachment_url( $post_thumbnail_id );
	$bg = get_field('bg_image')['url'];
	$mailName = get_field('mail_name');
	$mailLink = get_field('mail_link');
	$socialLink1 = get_field('social_link_1');
	$socialImage1 = get_field('social_image_1')['url'];
	$socialLink2 = get_field('social_link_2');
	$socialImage2 = get_field('social_image_2')['url'];
	$socialLink3 = get_field('social_link_3');
	$socialImage3 = get_field('social_image_3')['url'];
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
	
	<article class="main" id="main-home" style="background-image: url('<?= $bg ?>');">

		<div class="content">
			
			<div class="intro-text">
				<?php if(have_posts()) : ?>	
				<?php while(have_posts()) : ?>	
					<?php the_post(); ?>	
					<?php the_content();?>
				<?php endwhile; ?>	
				<?php endif; ?>
			</div>

			<a href="mailto:<?= $mailLink ?>" class="mail-link"><?= $mailName ?></a>

			<div class="social-wrap">
				<a href="<?= $socialLink1 ?>" target="_blank"><img src="<?= $socialImage1 ?>" alt=""></a>
				<a href="<?= $socialLink2 ?>" target="_blank"><img src="<?= $socialImage2 ?>" alt=""></a>
				<a href="<?= $socialLink3 ?>" target="_blank"><img src="<?= $socialImage3 ?>" alt=""></a>
			</div>

		</div>
		
	</article>

	<aside class="d-sidebar">
		
		<a href="<?= site_url(); ?>"><h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1></a>

		<nav >
			<?php  wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>

	</aside>

</section>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/home.js"></script>

<? get_footer(); ?>