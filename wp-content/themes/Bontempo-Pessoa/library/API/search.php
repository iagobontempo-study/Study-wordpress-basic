<?php

function restApi()
{
// Adiciona campo na API que vem com WORDPRESS! ou seja http://localhost/wordpress/wp-json/wp/v2/posts irá receber um campo TESTE com ALOKA dentro;
    register_rest_route('api/v1', 'search', array(
        'methods' => 'GET', // Se o método não funcionar, pode ser substituido por WP_REST_SERVER::READABLE
        'callback' => 'searchResults' // Nome da função mostrada aqui
    ));
}

function searchResults($data)
{
    $products = new WP_Query(array(
        'post_type' => 'product',
        's' => sanitize_text_field($data['text']) // 's' é um parametro de busca do wp, sanitize_text_field é para cancelar inject e $data['text'] é o parametro na url EX: http://localhost/wordpress/wp-json/api/v1/search?text=1
    ));

    $productsResults = array();

    while ($products->have_posts()) {
        $products->the_post();

        array_push($productsResults, array(
           'title' => get_the_title(),
            'link' => get_the_permalink()
        ));
    }

    return $productsResults;
}

add_action('rest_api_init', 'restApi');