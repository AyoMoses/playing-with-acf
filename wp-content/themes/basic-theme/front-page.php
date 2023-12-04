<?php

get_header();


$title = get_field('page_title');
$description = get_field('enter_description');
$other_description = get_field('enter_description');
$my_input = get_field('my_input');
$email_test = get_field('email_test');
?>

<section class='page'>
        <div class='container'>

                <h1><?php the_title(); ?></h1>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <?php the_content(); ?>

                <?php endwhile;
                else : endif; ?>

                <?php if ($title) : ?>
                        <h1>
                                <?php echo $title; ?>
                        </h1>
                <?php endif; ?>

             
              
                <?php if ($description) : ?>
                        <?php echo nl2br($description); ?>
                <?php endif; ?>

                <!-- other description using wysiwyg editor  -->
                <?php if ($other_description) : ?>
                        <?php echo $other_description ?>
                <?php endif; ?>

                <!-- using number  -->
                <!-- var_dump() --- use this to test if a variable is a typeof just like JS -->
                <!-- php doesn't know its a number and uses it as a string so to make it an actual number, you need to do var_dump((int)$my_input) -->
                <?php if ($my_input) : ?>
                        <?php echo $my_input  ?>
                <?php endif; ?>


                <!-- using email  -->
                <?php if ($email_test) : ?>
                        <?php echo $email_test  ?>
                        <a href="mailto:<?php echo $email_test  ?>">send email</a>
                <?php endif; ?>
        </div>
</section>

<?php get_footer();
?>
