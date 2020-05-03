<?php get_header() ?>

<div id="main-carousel">
    <div class="carousel-cell">...</div>
    <div class="carousel-cell">...</div>
    <div class="carousel-cell">...</div>
    ...
</div>

<?php bloginfo('name') ?>
<?php bloginfo('description') ?>

<hr>
<img src="<?php echo get_theme_file_uri('assets/image/test.jpg') ?>" alt="">
<hr>

CUSTOM FUNCTION
<?php echo pageBanner(); ?>

//TEMPLATE PARTS
<?php get_template_part('includes/separador'); ?>


<div style="background: #565656">
    <?php $produtos = new WP_Query(array(
        'posts_per_page' => 10, // Se usar -1, vai trazer tudo que tiver
        'post_type' => 'product',
        'orderby' => 'post_date', // Aceita 'rand', 'title', creio que qualquer campo
        'order' => 'ASC',
        'meta_query' => array( // META_QUERY é utilizado para filtrar
            array(
                'key' => 'product_image', // É o nome do CUSTOM FIELD criado com o plugin
                'compare' => '>', // Aqui e onde colocamos como será comparado... ex: = => =< % todos os operadores logicos
                'value' => 1,
//                'type' => 'numeric', //Aceita parametros para ajudar com o tipo de variavel
            ), // No caso esta pegando apenas os produtos que que o campo product_image for maior que 1, ou seja, existir imagem
        ),

    )) ?>

    <h1><a href="<?php echo get_post_type_archive_link('product'); ?>">Pagina produto</a></h1>

    <?php while ($produtos->have_posts()) : ?>
        <?php $produtos->the_post(); ?>
        <li style="display: flex"><?php the_title() ?> - <?php echo get_the_excerpt(); ?> - <a href="<?php the_permalink(); ?>">LINK</a></li>

    <?php endwhile; ?>
</div>

<h1>BLOG</h1>

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

