<?php
/* ------------------------------------------------------------------------ */
/* Theme Header
/* ------------------------------------------------------------------------ */
global $sd_data;
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
<?php if ( is_front_page() ) {
	echo get_bloginfo( 'name' ).' - '. get_bloginfo( 'description' );
	}
	elseif ( is_single() ) {
		wp_title( '' );
		}
		elseif ( is_page() ) {
			wp_title( '' ); echo ' | '; echo get_bloginfo( 'name' );
			}
			elseif ( is_category() ) {
				single_cat_title(); echo ' | '; echo get_bloginfo( 'name' );
				}
				elseif ( is_month() ) {
					echo 'Archive for '; echo the_time( 'F, Y' );
					}
					elseif ( is_tag() ) {
						__( 'Items tagged: ', '' ) .  single_tag_title();
						}
						else {
							wp_title( '' );
							}
?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/framework/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class( '' ); ?>>
<header id="sd-header" class="clearfix">
	
	<?php if ( $sd_data['sd_top_bar'] == '1' ) : ?>
	<div class="sd-header-top">
		<div class="container">
			
			<?php if ( $sd_data['sd_top_bar_left'] == '1' ) : ?>
    		<ul class="sd-header-left-options">
				
				<?php if ( !empty( $sd_data['sd_top_bar_first_field'] ) ) : ?>
		    	<li><?php if ( $sd_data['sd_top_bar_first_field_icon'] !== 'none' ) : ?><i class="<?php echo $sd_data['sd_top_bar_first_field_icon']; ?>"></i><?php endif; ?> <?php echo $sd_data['sd_top_bar_first_field']; ?></li>
				<?php endif; ?>
				
				<?php if ( !empty( $sd_data['sd_top_bar_second_field'] ) ) : ?>
			    <li><?php if ( $sd_data['sd_top_bar_second_field_icon'] !== 'none' ) : ?><i class="<?php echo $sd_data['sd_top_bar_second_field_icon']; ?>"></i><?php endif; ?> <?php echo $sd_data['sd_top_bar_second_field']; ?>
				<?php endif; ?>
				
				<?php if ( !empty( $sd_data['sd_top_news'] ) ) : ?>
			    <li class="hidden-sm"><span class="sd-news-span"><?php echo $sd_data['sd_top_news_word']; ?></span> <span class="sd-news-content-span"><?php echo $sd_data['sd_top_news']; ?></span></li>
				<?php endif; ?>
				
	    	</ul>
			<?php endif; ?>-->
    
			<?php if ( $sd_data['sd_social_icons'] == '1' ) : ?>	
   		    <div class="sd-header-social clearfix">
				<?php
				foreach ( $sd_data['sd_social_icons_data'] as $font_class => $url ) {
					if ( $url ) { ?>
						<a class="sd-bg-trans sd-header-<?php echo $font_class; ?>" href="<?php echo esc_url($url); ?>" title="<?php echo $font_class; ?>" target="_blank" rel="nofollow"><i class="fa fa-<?php echo $font_class; ?>"></i></a>
					<?php }
				} ?>
	    	</div>
			<?php endif; ?>
			
	    </div>
    </div>
    <!-- header top end -->
	<?php endif; ?>
	<div class="<?php if ( $sd_data['sd_sticky_header'] == '1' ) echo 'sd-sticky-header'; ?> clearfix">
    <div class="container">
		
			<h1 class="sd-logo">
				<?php if ( !empty($sd_data['sd_logo_upload']['url']) ) : ?>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo $sd_data['sd_logo_upload']['url']; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" /></a>
				<?php else : ?>
					<a name="top" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php echo get_bloginfo( 'name' );	?> </a>
				<?php endif; ?>
			</h1>
		<!-- logo end --> 
		<nav class="sd-menu-wrapper hidden-xs">
			<?php
			// Using wp_nav_menu() to display menu
			wp_nav_menu( array(
				'menu' => 'Header Menu', // Select the menu to show by Name
				'class' => '',
				'menu_class' =>'sf-menu',
				'menu_id' => 'sd-main-menu',
				'container' => false, // Remove the navigation container div
				'theme_location' => 'Header Menu'
				)
			);
		?>
		</nav>
		<span class="sd-responsive-menu-toggle hidden-lg hidden-sm hidden-md"><a href="#sidr-main"><i class="fa fa-bars"></i><?php _e( 'MENU', 'sd-framework' ); ?></a></span>
		<!-- primary menu end--> 
		</div>
	</div>
</header>
<!-- header end -->
<?php if ( is_front_page() && $sd_data['sd_home_slider'] == '1' ) : ?>
<?php if ( function_exists( putRevSlider( 'homeslider' )) ); ?>
<?php endif; ?>

<!--?php get_template_part( 'framework/inc/page-top' ); ?-->

<?php 
if ( $sd_data['sd_search_courses'] == '1' ) {
	if ( !is_page_template( 'blog.php' ) && !is_singular( 'post ') && is_singular( 'professors ' && is_singular( 'page' ) ) ) {
		get_template_part( 'framework/inc/search-courses' );
	}
}
?>