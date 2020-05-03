<?php

function restApiForm()
{
    register_rest_route('/v1/', 'form', array(
        'methods' => 'POST',
        'callback' => 'sendForm' // Nome da função mostrada aqui
    ));
}

function sendForm($data)
{

    $message = array(
        'Telefone:' => $data['telefone'],
        'Email:' => $data['email']
    );

    $output = implode(', ', array_map(function ($v, $k) {
        return sprintf("%s='%s'", $k, $v);
    }, $message, array_keys($message)));

    wp_insert_post(array(
        'post_type' => 'message',
        'post_status' => 'draft',
        'post_title' => $data['title'],
        'meta_input' => array(
            'message' => $output
        )
    ));
}

add_action('rest_api_init', 'restApiForm');