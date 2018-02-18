<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
            <meta charset="<?php bloginfo('charset'); ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title>
                    <?php 
                            if(is_home() || is_front_page()) :
                                bloginfo('name');
                            else :
                                wp_title("", true);
                            endif;
                    ?>
            </title>
            <?php //$date = new DateTime();?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
            <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
            <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarDropdown">
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'principal',
          'container'       => false,
          'menu_class'      => '',
          'fallback_cb'     => '__return_false',
          'items_wrap'      => '<ul id="%1$s" class="navbar-nav mr-auto">%3$s</ul>',
          'depth'           => 2,
          'walker'          => new b4st_walker_nav_menu()
        ) );
      ?>

      <form class="form-inline my-2 my-lg-0" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input class="form-control mr-sm-2" type="text" value="<?php echo get_search_query(); ?>" placeholder="Rechercher..." name="s" id="s">
        <button type="submit" id="searchsubmit" value="<?php esc_attr_x('Search', 'b4st') ?>" class="btn btn-outline-success my-2 my-sm-0">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
</nav>