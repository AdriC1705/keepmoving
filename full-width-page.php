<?php
/* ------------------------------------------------------------------------ */
/* Template Name: Page: Full Width
/* ------------------------------------------------------------------------ */
get_header();

?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-full-width clearfix container' ); ?>> 
	
	<!-- entry content -->
<<<<<<< HEAD
	<div class="entry-content container">
=======
	<div class="entry-content">
>>>>>>> 5bb7be9afa80fd5c8d9606faae730e3368e0cd8e
		<?php the_content(); ?>
	</div>
	<!-- entry content end--> 
</article>
<!--post-end-->

<?php endwhile; else: ?>
<p>
	<?php _e( 'Sorry, no posts matched your criteria', 'sd-framework' ) ?>
	.</p>
<?php endif; ?>
<!-- content end -->
<?php get_footer(); ?>