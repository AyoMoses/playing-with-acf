<?php
/* 
Template Name: Options
*/


get_header();
?>

<?php

// variables 
$colour = get_field('choose_your_colour');
$hideContent = get_field('hide_content');

$linkArray = get_field('link_array');
$pageLink = get_field('page_link');
?>


<section class="page">
    <div class="container">

        <h1><?php the_title(); ?></h1>

        <!-- You can use this to display certain things on the page if the user takes an action or if the user clicks something using checkbox but you can also use select as i do here by adding switch to it  -->
        <?php if ($colour) : ?>
            <strong>Color:</strong> <?php echo $colour['value'] ?>
        <?php endif; ?>

        <!-- display certain things based on user selection  -->
        <?php switch ($colour['value']) {
            case 'red':
                echo 'Danger you have selected red';
                break;
            case 'yellow':
                echo 'You just did yellow';
                break;
            default:
                echo 'You have the normal color';
        } ?>

        <!-- if hide content is clicked do not show this div but if it is, hide it  -->
        <?php if (!$hideContent) : ?>
            <div style="background-color: red; height: 200px; width: 300px;">

            </div>
        <?php else : ?>

        <?php endif; ?>

        <?php if ($linkArray) : ?>
            <a href="<?php echo $linkArray['url']; ?>" target="<?php echo $linkArray['target']; ?>" title="<?php echo $linkArray['title']; ?>">
                <?php echo $linkArray['title']; ?>
            </a>
        <?php endif; ?>


        <!-- using page link  -->

        <!-- returns the link alone  -->
        <?php if ($pageLink) : ?>
            <a href="<?php echo $pageLink ?>">test link</a>
        <?php endif ?>


        <!-- USING REPEATERS  -->
        <?php if (have_rows('team')) : ?>
            <?php while (have_rows('team')) : the_row();
                $name = get_sub_field('name');
                $image = get_sub_field('profile_picture');
                $picture = $image['sizes']['thumbnail'];
                $link = get_sub_field('link');
            ?>

                <ul>
                    <li>

                        <?php if ($name) : ?>
                            <h4><?php echo $name; ?></h4>
                        <?php endif; ?>


                        <?php if (the_sub_field('biography')) : ?>
                            <?php the_sub_field('biography'); ?>
                        <?php endif; ?>

                        <?php if ($image) : ?>
                            <img src="<?php echo $picture; ?>" alt="<?php echo $image['alt'] ?>">
                        <?php endif; ?>


                        <?php if ($link) : ?>
                            <a href="<?php echo $link['url'] ?>">View profile</a>
                        <?php endif ?>
                    </li>
                </ul>

            <?php endwhile; ?>
        <?php endif; ?>
        <!-- USING REPEATERS  -->

        <!-- ALLOWS TO CREATE A LAYOUT OF REUSABLES ACROSS TEMPLATES AND PAGES - DRAG AND DROP AND EASY TO USE  -->

        <?php if (have_rows('image_and_content')) : ?>
            <?php while (have_rows('image_and_content')) : the_row(); ?>

                <!-- i check if the layout is created. If yes, i show it  -->
                <?php if (get_row_layout() == 'image_and_content_section') : ?>

                    <!-- then i get the post field (subfield) inside this layout  -->
                    <?php get_template_part('parts/blocks/section', 'imagecontent') ?>

                <?php endif; ?>


                <!-- IF I NEED ANOTHER LAYOUT THE IF STATEMENT GOES HERE ETC 
                IF I NEED ANOTHER LAYOUT THE IF STATEMENT GOES HERE ETC  -->

            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
