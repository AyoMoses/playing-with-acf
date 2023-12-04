<?php get_header(); ?>


<section class="page">
    <div class="container">



        <h1><?php echo get_the_archive_title(); ?></h1>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article>
                    <!-- we get the title, then the date, the link to the post  -->
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <div class="a-test-class">
                        <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?> </p>
                        <?php if (has_category()) : ?>
                            <span>Categories: <?php the_category(', ') ?></span>
                        <?php endif; ?>

                        <?php if (has_tag()) : ?>
                            <span>Tags: <?php the_tags('', ', '); ?></span>
                        <?php endif; ?>

                        <?php the_excerpt(); ?>
                    </div>

                </article>


        <?php endwhile;
        else : endif; ?>



    </div>
</section>

<?php get_footer(); ?>
