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

    <nav class="navbar navbar-expand-md navbar-light">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img id="navbar-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo">
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-phone"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-map-marker-alt"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fab fa-weixin"></i></a>
                </li>          
            </ul>
        </div>
    </nav>