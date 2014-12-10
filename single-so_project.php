<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/fav-icon.png">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/lightGallery.css">
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins.min.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

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
				<a href="<?= site_url(); ?>"><h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1></a>

			<? endwhile; ?>
		<? endif; ?>

	</article>

	

		<?
			$bgArgs = array (
				'pagename'	=> 'work',
			);

			$bgQuery = new WP_Query( $bgArgs );
		?>
		<? if($bgQuery->have_posts()) : ?>
			<? while($bgQuery->have_posts()) : ?>
			<? $bgQuery->the_post(); ?>
	<article class="main" id="project-page" style="background-image: url('<?= get_field('bg_work')['url']; ?>')">
			<? endwhile; ?>
		<? endif; ?>
		<div class="content work-margin">

			<? if(have_posts() ) : ?>
			<? while(have_posts() ) : ?>
				<? the_post(); ?>
				

				<div class="project-info">

					<?
							$category = get_the_category();

							if ($category[0]->count > 1) {

									$slug = $category[0]->slug;

							    echo '<a href="/category/' . $slug . '" class="back-link">Back to ' . $category[0]->name . '</a>';

							}

					?>
					
					<h3 class="project-title"><? the_title(); ?></h3>
					<h4 class="project-tagline"><?= get_field('tagline'); ?></h4>
					<div class="project-copy"><? the_content(); ?></div>

					<? if( have_rows('team_members') ) : ?>
					<div class="team">
					<? while( have_rows('team_members') ) : the_row(); ?>	
						<span class="member">
							<?= get_sub_field('role'); ?>:
							<a href="<?= get_sub_field('link'); ?>" target="_blank"><?= get_sub_field('person'); ?></a>
						</span>
					<? endwhile; ?>
					</div>
					<? endif; ?>

				</div>

			<? endwhile; ?>
			<? endif; ?>

			<? if( have_rows('project_images') ) : ?>
			<? while( have_rows('project_images') ) : the_row(); ?>	
			<? 
				$text = get_sub_field('caption');
				$img = get_sub_field('image')['url'];
			?>	
				<div class="project-image-wrap">
				<?if ( $text ) : ?>
						<p><?= $text ?></p>
				<? endif; ?>

				<img src="<?= $img ?>" alt="Project Image">
				</div>
			<? endwhile; ?>
			<? endif; ?>

			<? if( have_rows('carousels') ) : ?>
			<div class="please-swipe"><span>Please swipe to navigate the carousels below:</span></div>
			<? while( have_rows('carousels') ) : the_row(); ?>	
				<? 
					$carouselName = get_sub_field('carousel_name');
				?>
				<div class="carousel-holder">
				<div class="carousel" id="<?= $carouselName ?>">
				<? if( have_rows('carousel') ) : ?>
				<? while( have_rows('carousel') ) : the_row(); ?>	
					<? 
						$carouselImage = get_sub_field('carousel_image')['url'];
						$carouselText = get_sub_field('carousel_text');
					?>	
					<div>
						<img src="<?= $carouselImage ?>" alt="" title="<?= $carouselText ?>">
					</div>
				<? endwhile;?>
				<? endif; ?>
			
				</div>
				<div class="carousel-controls">
					<a class="carousel-prev" id="prev-<?= $carouselName ?>"></a>
					<a class="carousel-next" id="next-<?= $carouselName ?>"></a>
				</div>

				<script>
					$(document).ready(function() {
						$("#<?= $carouselName ?>").bxSlider({
						  mode: "fade",
						  nextSelector: "#next-<?= $carouselName ?>",
				  		prevSelector: "#prev-<?= $carouselName ?>",
				  		nextText: "<img src='<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right.png' alt='Right'>",
				  		prevText: "<img src='<?php echo get_template_directory_uri(); ?>/assets/img/arrow-left.png' alt='Left'>",
						  captions: true,
						  adaptiveHeight: true,
						  touchEnabled: true
						});
					});
				</script>

			</div>
			<? endwhile; ?>
			<? endif; ?>

			<div class="page-work-holder">
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

				<a href="<?= site_url(); ?>"><h1 style="background: url(<?= $logo ?>);" class="logo">Kayla Griffin</h1></a>

			<? endwhile; ?>
		<? endif; ?>

		<nav >
			<?php  wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</nav>

	</aside>

</section>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/work.js"></script>

<? get_footer(); ?>