<?php

// Importando arquivo
require_once('library/API/search.php');



// NESTE ARQUIVO POSSO ADICIONAR NOVAS FUNCÔES
function pageBanner()
{
    return "<div>OPALELE PAGEBANNER FUNC</div>";
}


//Arquivo utilizado para carregar arquivos

// DICA: usar a função microtime() durante desenvolvimento no lugar do parametro de versão

function loadFiles()
{
    //CSS - primeiro parametro é um nome escolhido por mim e segundo parametro é a URL. (no caso já existe uma função WP para pegar o style.css principal
    wp_enqueue_style('mainStyles', get_stylesheet_uri()); // Carrega CSS
    wp_enqueue_style('bootstrap', get_theme_file_uri('/node_modules/bootstrap/dist/css/bootstrap.min.css'));
    wp_enqueue_style('flickity', get_theme_file_uri('/node_modules/flickity/dist/flickity.min.css'));

    //JS - primeiro parametro é um nome escolhido por mim, segundo é a url, terceiro é se este JS tem dependencias, quarto é a versão e quinto colocar true para carregar o arquivo no footer
    wp_enqueue_script('mainJS', get_theme_file_uri('assets/js/main.js'), null, '1.0', true);
    wp_enqueue_script('flickity', get_theme_file_uri('/node_modules/flickity/dist/flickity.pkgd.min.js'));
    wp_enqueue_script('carrousel', get_theme_file_uri('/assets/js/carrousel.js'));

    // Passando variaveis para dentro do arquivo main.js
    wp_localize_script('mainJS', 'config', array(
        'baseUrl' => get_site_url()
    ));
}

add_action('wp_enqueue_scripts', 'loadFiles'); // Primeiro parametro é o evento que o wordpress aceita, segundo param é o nome que eu quero dar

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function loadFeatures()
{
    register_nav_menu('mainMenu', 'Main Menu');
    add_theme_support('title-tag'); // title-tag: adiciona a tag title com os respectivos titulos de cada pagina e blog
    add_theme_support('post-thumbnails'); // Adiciona aos posts um campo de imagem tipo thumbnail - USAR SEMPRE HEHE
    add_image_size('imagemLateral', 400, 260, true); // Adiciona um tipo de tamanho de imagem custom, ultimo parametro e para saber se ira cortar ou não
}

add_action('after_setup_theme', 'loadFeatures');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function postTypes()
{
    register_post_type('product', array(
        'show_in_rest' => true, // Permite que exista uma rota para acessar na API
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'), // Diz quais tipos de campos o produto possui suporte, no caso adicionamos o 'excerpt' que é uma descrição... 'custom-fields' habilita custom-fields...
        'rewrite' => array('slug' => 'produtos'), //Muda a URL do tipo de post
        'has_archive' => true, // Diz que tem uma pagina de listagem
        'public' => true, // Torna o tipo do post publico para todos verem
        'menu_icon' => 'dashicons-cart', //https://developer.wordpress.org/resource/dashicons/#migrate
        'labels' => array(
            'name' => 'Produtos',
            'add_new_item' => 'Adicionar novo produto',
            'add_new' => 'Adicionar produto',
            'edit_item' => 'Editar produto',
            'all_items' => 'Todos produtos',
            'singular_name' => 'Produto',
        )

    ));

}

add_action('init', 'postTypes');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ajustPageQuery($query)
{
    if (!is_admin() && is_post_type_archive('product') && $query->is_main_query()) { // Irá executar apenas se não estiver na view da APP e se a view for do post_type 'product'. No caso archive-product.php && is_main_query só retorna true se for o retorno default da url
        $query->set('posts_per_page', 1);
        $query->set('orderby', 'post_date');
        $query->set('order', 'ASC');
    }
}

add_action('pre_get_posts', 'ajustPageQuery'); // Utilizado para ajustar e filtrar do jeito que quisermos as queries das paginas (Assim não precisamos criar custom query no front, pois ja teremos acesso com the_post();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function customRestApi() {
    // Adiciona campo na API que vem com WORDPRESS! ou seja http://localhost/wordpress/wp-json/wp/v2/posts irá receber um campo TESTE com ALOKA dentro;
    register_rest_field('post', 'teste', array(
        'get_callback' => function() {
            return 'ALOKA';
        }
    ));

}

add_action('rest_api_init', 'customRestApi');