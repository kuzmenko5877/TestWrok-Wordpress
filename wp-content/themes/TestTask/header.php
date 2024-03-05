<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="page-container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="<?php echo esc_url(home_url('/')); ?>">Головна</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo esc_url(home_url('/about')); ?>">Про</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo esc_url(home_url('/contact')); ?>">Контакт</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo esc_url(home_url('/blog')); ?>">Блог</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="content" class="site-content">
