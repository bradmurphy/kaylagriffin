<?php 

/* Template Name: About Template */

?>

<? get_header(); ?>

<?php 
	$post_thumbnail_id = get_post_thumbnail_id();
	$logo = wp_get_attachment_url( $post_thumbnail_id );
	$meHeader = get_field('me_header')['url'];
	$lArrow = get_field('left_arrow')['url'];
	$rArrow = get_field('right_arrow')['url'];
	$squiggle = get_field('slide_arrow')['url'];
	$signature = get_field('signature')['url'];
	$s1Text = get_field('s1_text');
	$s1ImgMobile = get_field('s1_image_mobile')['url'];
	$s1ImgDesktop = get_field('s1_image_desktop')['url'];
	$s2Text = get_field('s2_text');
	$s2ImgMobile = get_field('s2_image_mobile')['url'];
	$s2ImgDesktop = get_field('s2_image_desktop')['url'];
	$s3Text = get_field('s3_text');
	$s3ImgMobile = get_field('s3_image_mobile')['url'];
	$s3ImgDesktop = get_field('s3_image_desktop')['url'];
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

		<img src="<?= $meHeader ?>" alt="About Me" class="header-me">

		<div class="content" id="about-content">
			
			<?php if(have_posts()) : ?>	
			<?php while(have_posts()) : ?>	
				<?php the_post(); ?>	
				<?php the_content();?>
			<?php endwhile; ?>	
			<?php endif; ?>

			<div class="slider">
			  <div>
				  <img src="<?= $s1ImgMobile ?>" title="<?= $s1Text ?> <img src='<?= $signature ?>' alt='Signature' class='sig'>" class="mobile">
				  <img src="<?= $s1ImgDesktop ?>" title="<?= $s1Text ?> <img src='<?= $signature ?>' alt='Signature' class='sig'>" class="desktop">
			  </div>
			  <div>
				  <img src="<?= $s2ImgMobile ?>" title="<?= $s2Text ?> <img src='<?= $squiggle ?>' alt='Signature' class='squiggle'>" class="mobile">
				  <img src="<?= $s2ImgDesktop ?>" title="<?= $s2Text ?> <img src='<?= $squiggle ?>' alt='Signature' class='squiggle'>" class="desktop">
			  </div>
			  <div>
				  <img src="<?= $s3ImgMobile ?>" title="<?= $s3Text ?> <img src='<?= $squiggle ?>' alt='Signature' class='squiggle'>" class="mobile">
				  <img src="<?= $s3ImgMobile ?>" title="<?= $s3Text ?> <img src='<?= $squiggle ?>' alt='Signature' class='squiggle'>" class="desktop">
			  </div>
			</div>

			<div class="controls">
				<span>More about me!</span>
				<a id="prev"></a>
				<a id="next"></a>
			</div>

			<script>

			$(document).ready(function() {

				$(".slider").bxSlider({
				  mode: "fade",
				  nextSelector: "#next",
		  		prevSelector: "#prev",
		  		nextText: "<img src='<?= $rArrow ?>' alt='Left'>",
		  		prevText: "<img src='<?= $lArrow ?>' alt='Right'>",
				  captions: true
				});

			});
			</script>

		</div>
		
	</article>

	<aside class="d-sidebar">
		
		<a href="<?= site_url(); ?>"><h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1></a>

		<nav >
			<?php  wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>

	</aside>

</section>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/about.js"></script>

<? get_footer(); ?>