// Archive-product.php é responsavel pela listagem/pagina dos post Type 'product'


<?php while(have_posts()): ?>
    <?php the_post(); ?>

    <h1><?php the_title() ?></h1>

    <?php the_post_thumbnail(); ?> <?php // Pode se usar como parametro desta função, os tipos de imagem criados em functions.php. Ex: the_post_thumbnail('imagemLateral'), assim ele irá utilizar a resolução correta  ?>
<?php endwhile; ?>

<?php echo paginate_links() ?>
