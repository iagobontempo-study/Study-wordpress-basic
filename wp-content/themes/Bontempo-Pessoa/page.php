<?php get_header() ?>

<?php
$parent = wp_get_post_parent_id(get_the_ID());
echo $parent;
?>

<?php if (wp_get_post_parent_id(get_the_ID())): ?>
    <div>
        VOCE ESTA NA PAGINA FILHA! ///// => PAGINA PAI = <a href="<?php echo get_permalink($parent) ?>"><?php echo get_the_title($parent) ?></a>
    </div>
<?php endif; ?>


<?php while (have_posts()): ?>
    <?php the_post(); ?>
    <h1>Titulo da página: <?php the_title() ?></h1>
    <div>
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>


<?php get_footer(); ?>
