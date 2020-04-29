<?php get_header() ?>

// Single post

<?php while (have_posts()): ?>
    <?php the_post(); ?>
    <h1>Titulo: <?php the_title() ?></h1>
    <h2><?php the_author() ?></h2>
    <div>
        <?php the_content(); ?>
    </div>
    <a href="<?php the_permalink(); ?>">LINK</a>
<?php endwhile; ?>


<?php get_footer(); ?>
