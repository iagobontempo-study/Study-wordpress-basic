<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>  <?php // CARREGA OS ARQUIVOS CSS COLOCADOS NO FUNCTIONS.PHP ?>
</head>
<body <?php body_class(); ?>> <?php // Adiciona classes no body dependendo da pagina que estamos! e uma funcao auxiliar boa ?>
<h1>HEADER.PHP</h1>
<?php
    wp_nav_menu(array(
        'theme_location' => 'mainMenu'
    ));
?>
