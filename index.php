<?php get_header(); ?>
<section class="container">
    <main class="row">
        <header class="col-sm-12">
            <h1><?php bloginfo('name'); ?></h1>
        </header>
        <div class="col-sm-12">
            <?php if(have_posts()):while(have_posts()):the_post();?>
            <article>
                <header>
                    <?php the_title(); ?>
                </header>
                <?php the_content(); ?>
            </article>
            <?php endwhile;
            endif;?>
        </div>
    </main>
</section>
<?php get_footer(); ?>