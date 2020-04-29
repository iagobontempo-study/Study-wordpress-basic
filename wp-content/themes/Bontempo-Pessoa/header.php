<!DOCTYPE html>
<html lang="pt">
<head>
    <?php wp_head(); ?>  <?php // CARREGA OS ARQUIVOS CSS COLOCADOS NO FUNCTIONS.PHP ?>
</head>
<body>
<h1>HEADER.PHP</h1>
<ul>
    <li>
        <a href="<?php echo site_url(); ?>">
            Home
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('sobre'); ?>">
            Sobre
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('cases'); ?>">
            Cases
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('duvidas'); ?>">
            Dúvidas
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('contato'); ?>">
            Contato
        </a>
    </li>
</ul>
