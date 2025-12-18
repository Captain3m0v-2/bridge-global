<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="bg-light border-bottom">
    <nav class="navbar navbar-expand-lg container">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php 
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1 class="h4 mb-0">Bridge Global</h1>';
                }
                ?>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="main-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'navbar-nav ms-auto',
                    'container' => false,
                ));
                ?>
            </div>
        </div>
    </nav>
</header>

<main class="container py-4">