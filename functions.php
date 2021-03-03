<?php 
/*This file is part of BeShop child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if ( ! defined( 'BESHOP_FREE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BESHOP_FREE_VERSION', '1.0.0' );
}



function beshop_free_fonts_url() {
	$fonts_url = '';

		$font_families = array();

		$font_families[] = 'Oxygen:400,500,700';
		$font_families[] = 'Rubik:400,500,500i,700,700i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );


	return esc_url_raw( $fonts_url );
}


function beshop_free_enqueue_child_styles() {
	wp_enqueue_style( 'beshop-free-google-font',beshop_free_fonts_url(), array(), null );
	wp_enqueue_style( 'beshop-free-parent-style', get_template_directory_uri() . '/style.css',array('beshop-main','beshop-google-font', 'beshop-default'), '', 'all');
   wp_enqueue_style( 'beshop-free-main',get_stylesheet_directory_uri() . '/assets/css/main.css',array(), BESHOP_FREE_VERSION, 'all');

   	wp_enqueue_script( 'masonry.pkgd-js', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.js',array('jquery'), BESHOP_FREE_VERSION, false );
   	wp_enqueue_script( 'beshop-free-main-js', get_stylesheet_directory_uri() . '/assets/js/main.js',array('jquery'), BESHOP_FREE_VERSION, true );

  
}
add_action( 'wp_enqueue_scripts', 'beshop_free_enqueue_child_styles');




/**
 * Customizer additions.
 */
 require get_stylesheet_directory() . '/inc/customizer.php';
// // Nav walker for menu
// require get_stylesheet_directory() . '/inc/class-walker-page.php';
// require get_stylesheet_directory() . '/inc/class-walker-nav-menu.php';
/*

if ( ! function_exists( 'beshop_free_inline_css' ) ) :
functionbeshop_free_inline_css() {
	 $beshop_free_grid_height = get_theme_mod('beshop_free_grid_height', 750 );
	 $beshop_free_posts_image = get_theme_mod('beshop_free_posts_image', '1' );
	 $beshop_free_posts_blank_image = get_theme_mod('beshop_free_posts_blank_image', '1' );
	 $style = '';
	 if ($beshop_free_posts_image == '1' && $beshop_free_posts_blank_image == '1' ){
		 if( $beshop_free_grid_height != 750 ){
		 	$style .= '.site-main article.xgrid-item{min-height:'.esc_attr($beshop_free_grid_height).'px}';
		 }
	 }
		 if( $beshop_free_posts_image != '1' ){
		 	$style .= '.site-main article.xgrid-item{min-height:auto;padding-bottom:30px;}';
		 }


        wp_add_inline_style( 'beshop-free-main', $style );
}
add_action( 'wp_enqueue_scripts', 'beshop_free_inline_css' );
endif;
*/

