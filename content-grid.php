<?php
/**
 * @package monomedia
 * 
 * Single content for grid template.
 */
?>

<!-- Portfolio Grid -->
<div class="col-md-4 col-sm-6 portfolio-item">
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="post-img-wrap">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="portfolio-link">
			<?php the_post_thumbnail( 'post-thumbnail' ); ?>
		</a>
		<?php
		}
		?>
	</div>
	<div class="portfolio-caption">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header>
	</div>
</div>
