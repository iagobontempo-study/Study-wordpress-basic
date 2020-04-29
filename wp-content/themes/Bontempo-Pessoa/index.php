<?php get_header() ?>

<?php bloginfo('name') ?>
<?php bloginfo('description') ?>

<hr>
<img src="<?php echo get_theme_file_uri('assets/image/test.jpg') ?>" alt="">
<hr>


<h1>Primeira Forma</h1>
<?php foreach (get_posts() as $post): ?>

    <h1>Titulo: <?php echo $post->post_title ?></h1>
    <h2><?php echo $post->post_author ?></h2>
    <div>
        <?php echo $post->post_content ?>
    </div>
    <a href="<?php echo $post->guid ?>">LINK</a>

<?php endforeach; ?>
<hr>

<h1>Segunda forma</h1>

<?php while (have_posts()): ?>
    <?php the_post(); ?>
    <h1>Titulo: <?php the_title() ?></h1>
    <h2><?php the_author() ?></h2>
    <div>
        <?php the_content(); ?>
    </div>
    <a href="<?php the_permalink(); ?>">LINK</a>
<?php endwhile; ?>
<hr>


<?php get_footer(); ?>

