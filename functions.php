<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );


/* MENU */


register_nav_menus(array(
	'principal' => 'Menu principale home',
	//'second' => 'Menu principale',
	//'deuxieme' => 'Petit menu optionnel',
	'footer' => 'Menu pied de page',
	//'lieux' => 'Menu des lieux',
	//'oeuvres' => 'Menu pour les oeuvres quand il n\'y a pas d\'Ã©vÃ©nements'
));


/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

/****** menu bts ******/

class b4st_walker_nav_menu extends Walker_Nav_menu {

	function start_lvl( &$output, $depth = 0, $args = array() ){ // ul
		$indent = str_repeat("\t",$depth); // indents the outputted HTML
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span

    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

    $li_attributes = '';
		$class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $item->ID;
		if( $depth && $args->walker->has_children ){
			$classes[] = 'dropdown-menu dropdown-menu-right';
		}

		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

		$attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
                $attributes_child = ' href="' . esc_attr($item->url) . '" data-child="submenu"'; 

		$item_output = $args->before;
		$item_output .= ( $depth > 0 ) ? '<a class="dropdown-item nav-link"' . $attributes_child . '>' : '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}

/*
Register Navbar
*/

//register_nav_menu('navbar', __('Navbar', 'b4st'));


/************ JS et CSS ***************/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 200 );
function theme_enqueue_styles() {
if( !is_admin() ) :
    //wp_deregister_script('popper.min.js','https://cdnjs.cloudflare.com/ajax/libs/');
    //wp_deregister_script('jquery');
    wp_register_script('functions', get_stylesheet_directory_uri().'/bundle.js','',false,true);
    wp_enqueue_script( 'functions' );
    wp_enqueue_style('style', get_stylesheet_directory_uri().'/css/style.css', array(), time());
endif;
}
//add_action( 'wp_footer', 'wpse_262301_wp_footer', 11 );
//function wpse_262301_wp_footer() { 
//  wp_dequeue_script( 'popper' );
//}