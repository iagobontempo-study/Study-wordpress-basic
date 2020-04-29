<?php get_header() ?>

<h1>THIS IS THE BLOG SCREEN</h1>


<h1>BLOG</h1>

<?php while (have_posts()): ?>
    <?php the_post(); ?>
    <h1>Titulo: <?php the_title() ?></h1>
    <div>
        Content = <?php the_content(); ?>
    </div>
    Excerpt = <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>">LINK</a>
    <?php the_author_posts_link(); ?>
    <?php the_time('n.j.y'); ?>
    <?php echo get_the_category_list() ?>
<?php endwhile; ?>
<hr>
<hr>
<?php echo paginate_links() ?>

<?php get_footer(); ?>

