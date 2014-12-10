<section class="entry-content">
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	<?php the_content(); ?>
	<pre>
	<?php //print_r (get_field('post_image_1') ); ?>
	<?php //print_r (get_field('post_image_2') ); ?>
	<?php //print_r (get_field('post_image_3') ); ?>
	</pre>
	
	<?php 
				$image1 = get_field('post_image_1');
				$image2 = get_field('post_image_2');
				$image3 = get_field('post_image_3');
	?>

	<img src="<?= $image1['url'];?>" alt="">
	<img src="<?= $image2['url'];?>" alt="">
	<img src="<?= $image3['url'];?>" alt="">

	<div class="entry-links">
		<?php wp_link_pages(); ?>
	</div>
</section>