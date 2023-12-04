<?php
/* 
Template Name: Content page 
*/


get_header();
?>

<!-- variables  -->
<?php

// image using array 
// $image = get_field('feature_image');
// $picture = $image['sizes']['custom_hero_size'];
// $alt = $image['alt'];
// $title = $image['title'];

// image using url 
// $image_url = get_field('image_url');

// file download 
// $file = get_field('file_download');
// $filename = $file['filename'];
// $fileurl = $file['url'];

// embed a video 
// $embed = get_field('embed_a_video');


// gallery for images as an array you cna also use url if need be but for alt array is best to be dynamic alt
// $gallery_images = get_field('gallery_images');
// $galleryalt = $gallery_images['alt'];
// $galleryTitle = $gallery_images['title'];

?>


<section class="page">
    <div class="container">



        <h1><?php the_title(); ?></h1>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

                <!-- rendering image using the image array in custom fields  -->
                <!-- you also create a custom image size in functions.php this will be passed as the array to sizes  -->
                <!-- this is useful when doing repeaters for sliders etc  -->

                <!-- <?php if ($image) : ?>
                    <img src="<?php echo $picture ?>" alt="<?php echo $alt ?>" title="<?php echo $title ?>">
                <?php endif; ?> -->

                <!-- using image url  -->
                <!-- this does not get the alt and title just the src -->
                <!-- <?php if ($image_url) : ?>
                    <img src="<?php echo $image_url ?>" alt="a test" title="another test">
                <?php endif; ?> -->

                <!-- using file download  -->
                <!-- <?php if ($file) : ?>
                   <a href="<?php echo $fileurl; ?>" download>download the image</a>
                <?php endif; ?> -->


                <!-- Oembed is to add a video url getting the embed if you need to add a video url etc not for background autoplay video  -->
                <!-- supports the major paltforms. Youtube, vimeo, twitter etc for embed  -->
                <!-- this is to display video on a website copying and pasting the video -->
                <!-- <?php echo $embed ?> -->


                <!-- gallery for listing images  -->
                <!-- <?php if ($gallery_images) : ?>
                    <?php foreach ($gallery_images as $gallery_image) : ?>

                        <img src="<?php echo $gallery_image ?>" alt="<?php echo $galleryalt  ?>" title=" <?php echo $galleryTitle  ?>" class="testing-gallery">

                    <?php endforeach; ?>
                <?php endif; ?> -->






        <?php endwhile;
        else : endif; ?>



    </div>
</section>

<?php get_footer(); ?>
