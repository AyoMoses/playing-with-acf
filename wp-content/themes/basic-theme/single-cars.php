<?php get_header(); ?>


<section class="page">
    <div class="container">


        <!-- i add a custom hero for my category or post. I'd integrate ACF to this later  -->
        <!-- i'd break this into  -->
        <?php if (has_post_thumbnail()) : ?>
            <img class="featured-image" src="<?php the_post_thumbnail_url(''); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>




        <h1><?php the_title(); ?></h1>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

                <!-- playing with acf and post types  -->
                <?php if (get_field('car_colour')) : ?>
                    <h4 class="car-title"><?php echo the_field('car_colour'); ?></h4>
                <?php endif; ?>

                <?php if (get_field('car_year')) : ?>
                    <h5 class="car-title"><?php echo the_field('car_year'); ?></h5>
                <?php endif; ?>




        <?php endwhile;
        else : endif; ?>



    </div>
</section>

<?php get_footer(); ?>
