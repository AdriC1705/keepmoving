<?php
/* ------------------------------------------------------------------------ */
/* Theme Events Single Post
/* ------------------------------------------------------------------------ */
get_header(); ?>
<!--left col-->

<div class="sd-blog-page">
	<div class="container">
		<div class="row"> 
			<!--left col-->
			<div class="col-md-8 <?php if ( $sd_data['sd_sidebar_location'] == '2' ) echo 'pull-right'; ?>">
				<div class="sd-left-col">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					
					
					
					<?php get_template_part( 'framework/inc/post-formats/events/single', get_post_format() ); ?>
					<?php endwhile; else: ?>
					<p>
						<?php _e( 'Sorry, no posts matched your criteria', 'sd-framework'); ?>
						.</p>
					<?php endif; ?>
					
					<?php if ( $sd_data['sd_events_comments'] == '1' ) : ?>
					<!--comments-->
					<?php comments_template( '', true ); ?>
					<!--comments end--> 
					<?php endif; ?>
					
				</div>
			</div>
			<!--left col end--> 
			<!--sidebar-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--sidebar end--> 
		</div>
	</div>
</div>
<?php get_footer(); ?>
