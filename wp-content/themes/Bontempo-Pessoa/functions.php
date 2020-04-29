<?php

//Arquivo utilizado para carregar arquivos

// DICA: usar a função microtime() durante desenvolvimento no lugar do parametro de versão

function loadFiles() {
    //CSS - primeiro parametro é um nome escolhido por mim e segundo parametro é a URL. (no caso já existe uma função WP para pegar o style.css principal
    wp_enqueue_style('mainStyles', get_stylesheet_uri()); // Carrega CSS

    //JS - primeiro parametro é um nome escolhido por mim, segundo é a url, terceiro é se este JS tem dependencias, quarto é a versão e quinto colocar true para carregar o arquivo no footer
    wp_enqueue_script('mainJS', get_theme_file_uri('assets/js/test.js'), NULL, '1.0', true);
}

add_action('wp_enqueue_scripts', 'loadFiles'); // Primeiro parametro é o evento que o wordpress aceita, segundo param é o nome que eu quero dar


function loadFeatures() {
    register_nav_menu('mainMenu', 'Main Menu');
    add_theme_support('title-tag'); // title-tag: adiciona a tag title com os respectivos titulos de cada pagina e blog
}

add_action('after_setup_theme', 'loadFeatures');


