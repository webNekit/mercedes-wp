<!DOCTYPE html>
<html <?php  language_attributes(); ?>>
<head>
    <meta charset="<?php  bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_meta_title(); ?> - <?php  bloginfo( 'name' ); ?></title>
    <meta name="title" content="<?php echo get_meta_title(); ?> - <?php  bloginfo( 'name' ); ?>">
    <meta name="description" content="<?php echo get_meta_description(); ?>">
    <meta name="keywords" content="Автосервис, mercedes-benz, автомобили, машины">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
    <!-- icons -->
    <?php wp_head(); ?>
</head>
<body data-site class="site" id="site">
<div class="site-wrapper">
    <header aria-label="Шапка сайта" data-header class="site-wrapper__header header" id="header">
        <div class="container header__container">
            <div class="header__wrapper">
                <div class="header__logo logo">
                    <a href="<?php echo home_url('/'); ?>" class="logo__link">
                        <div class="logo__brand"><?php bloginfo('name'); ?></div>
                    </a>
                </div>
                <nav data-navbar class="header__navbar navbar" id="navbar">
                    <menu class="navbar__menu">
                        <li class="navbar__menu-item"><a href="<?php echo home_url('/'); ?>" class="navbar__menu-link">Главная</a></li>
                        <li class="navbar__menu-item"><a href="<?php echo get_permalink(get_page_by_path('о-нас')); ?>" class="navbar__menu-link">О нас</a></li>
                        <li class="navbar__menu-item"><a href="<?php echo get_permalink(get_page_by_path('услуги')); ?>" class="navbar__menu-link">Сервисы</a></li>
                        <li class="navbar__menu-item"><a href="<?php echo get_permalink(get_page_by_path('гайды')); ?>" class="navbar__menu-link">Гайды</a></li>
                        <li class="navbar__menu-item"><a href="#footer" class="navbar__menu-link">Контакты</a></li>
                    </menu>
                </nav>
                <ul class="header__actions header-actions">
                    <li class="header-actions__item header-actions__item--burger">
                        <button data-menu-toggler class="header-actions__button header-actions__button--burger">
                            <i data-lucide="align-justify"></i
                        </button>
                    </li>
                    <li class="header-actions__item header-actions__item--contact">
                        <a href="#!" class="button button--blur header-actions__button header-action__button--contact">Обратный звонок</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>