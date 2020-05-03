<?php

function customHeaderUrl()
{
    return esc_url(site_url('/'));
}
add_filter('login_headerurl', 'customHeaderUrl'); // Muda url ao clikcar no icone do wp

function customLoginCSS()
{
    wp_enqueue_style('loginCSS', get_theme_file_uri('/assets/css/login.css'));
}
add_filter('login_enqueue_scripts', 'customLoginCSS'); // Carrega CSS na pagina Login

function customLoginTitle()
{
    return get_bloginfo('name') . '- Criado por Iago Bontempo';
}
add_filter('login_headertitle', 'customLoginTitle');