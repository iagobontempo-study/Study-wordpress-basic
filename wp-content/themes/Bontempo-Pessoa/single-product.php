// Dentro de produto

<?php while(have_posts()): ?>
    <?php the_post(); ?>

    <h1><?php the_title() ?></h1>

    <img src="<?php the_field('product_image'); ?>" alt="eita">

<?php endwhile; ?>
