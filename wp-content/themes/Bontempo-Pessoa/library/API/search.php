<?php

function restApiSearch()
{
    register_rest_route('/v1/', 'search', array(
        'methods' => 'GET', // Se o método não funcionar, pode ser substituido por WP_REST_SERVER::READABLE
        'callback' => 'searchResults' // Nome da função mostrada aqui
    ));
}

function searchResults($data)
{
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'page', 'product'), // Os tipos de post que irá buscar
        's' => sanitize_text_field($data['text']) // 's' é um parametro de busca do wp, sanitize_text_field é para cancelar inject e $data['text'] é o parametro na url EX: http://localhost/wordpress/wp-json/api/v1/search?text=1
    ));

    $results = array(
        'pages' => array(),
        'blog' => array(),
        'products' => array(),
    );

    while ($mainQuery->have_posts()) {
        $mainQuery->the_post();

        if (get_post_type() == 'page') {
            array_push($results['pages'], array(
                'title' => get_the_title(),
                'link' => get_the_permalink()
            ));
        }

        if (get_post_type() == 'post') {
            array_push($results['blog'], array(
                'title' => get_the_title(),
                'link' => get_the_permalink()
            ));
        }


        if (get_post_type() == 'product') {
            array_push($results['products'], array(
                'title' => get_the_title(),
                'link' => get_the_permalink()
            ));
        }
    }

    return $results;
}

add_action('rest_api_init', 'restApiSearch');