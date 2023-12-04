<!-- then get the post field (subfield) inside this layout  -->
<?php
$image_contents = get_sub_field('image_contents');
?>
<?php foreach ($image_contents as $image_content) : ?>
    <h3><?php echo $image_content['title'] ?></h3>
    <h3><?php echo $image_content['content'] ?></h3>

    <?php if ($image_content['link']) : ?>
        <a href="<?php echo $image_content['link']['url'] ?>">Find out more</a>
    <?php endif ?>

<?php endforeach; ?>
