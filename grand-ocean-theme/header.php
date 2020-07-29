<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Grand Ocean Seafood</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); //includes scripts and stylesheets ?>
</head>

<body <?php body_class(); //displays class names for the body ?>>

    <nav class="navbar navbar-expand-md navbar-light fixed-top">
        <!-- Brand -->
        <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
            <img id="navbar-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="Logo">
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_site_url(); ?>/#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_site_url(); ?>/#products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_site_url(); ?>/#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tel:347-532-0987"><i class="fas fa-phone"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.google.com/maps?q=35-20+College+Point+Blvd+Flushing,+NY+11354&rlz=1C1GCEA_enUS885US885&um=1&ie=UTF-8&sa=X&ved=2ahUKEwiPk6vaivPqAhXsmOAKHVwWBdYQ_AUoAXoECA0QAw" target="_blank"><i class="fas fa-map-marker-alt"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo get_site_url(); ?>/#footer"><i class="fab fa-weixin"></i></a>
                </li>          
            </ul>
        </div>
    </nav>