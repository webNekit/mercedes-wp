<?php
/*
 Template Name: Шаблон "Главная страница"
 */

?>
<?php get_header(); ?>
<main aria-label="Контент страницы" data-main class="site-wrapper__main main" id="main">
    <div data-main-wrapper class="main-wrapper" id="main-wrapper">
        <section class="hero-section" id="hero-section" style="background-image: url('<?php the_field('main-bg'); ?>');">
            <div class="container hero-section__container">
                <div class="hero-section__content">
                    <div class="hero-section__row hero-section__row--top">
                        <h1 class="hero-section__title"><?php the_field('main-title'); ?></h1>
                    </div>
                    <div class="hero-section__row hero-section__row--bottom">
                        <div class="hero-section__information">
                            <h2 class="hero-section__information-title"><?php the_field('main-subtitle'); ?></h2>
                        </div>
                        <div class="hero-section__footer">
                            <p class="hero-section__footer-text"><?php the_field('main-text'); ?></p>
                            <a href="#services-section" class="hero-section__footer-button button button--outline">Наши услуги</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-section" id="about-section">
            <div class="container about-section__container">
                <div class="about-section__content">
                    <div class="about-section__column about-section__column--left">
                        <div class="badge-section about-section__badge"><?php the_field('about-title'); ?></div>
                        <h2 class="about-section__title"><?php the_field('about-subtitle') ?></h2>
                        <?php if (have_rows('about-repeater')): ?>
                            <ul class="about-section__advantages">
                                <?php  while (have_rows('about-repeater')): the_row(); ?>
                                <li class="about-section__advantages-item">
                                    <div class="about-section__advantages-card">
                                        <h3 class="about-section__advantages-title"><?php  the_sub_field('about-repeater-title'); ?></h3>
                                        <p class="about-section__advantages-description"><?php the_sub_field('about-repeater-text'); ?></p>
                                    </div>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="about-section__column about-section__column--right">
                        <img loading="lazy" src="<?php  the_field('about-bg'); ?>" alt="Автомобиль" class="about-section__img">
                    </div>
                </div>
            </div>
        </section>
        <section class="services-section" id="services-section">
            <div class="container services-section__container">
                <div class="services-section__wrapper">
                    <div class="badge-section services-section__badge"><?php the_field('services-title'); ?></div>
                    <div class="services-section__headline">
                        <h2 class="services-section__title"><?php the_field('services-subtitle'); ?></h2>
                        <a href="<?php echo get_permalink(get_page_by_path('услуги')); ?>" class="button button--secondary services-section__link-more">Все услуги</a>
                    </div>
                    <div class="services-section__content">
                        <?php
                        // WP Query для получения последних 10 услуг
                        $args = array(
                            'post_type'      => 'services',  // Укажите ваш кастомный тип поста
                            'posts_per_page' => 10,  // Количество записей
                        );

                        $services_query = new WP_Query($args);

                        if ($services_query->have_posts()) : ?>
                            <ul class="services-section__list">
                                <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
                                    <li class="services-section__list-item">
                                        <article class="services-section__list-card services-card">
                                            <div class="services-card__wrapper">
                                                <div class="services-card__info">
                                                    <h3 class="services-card__info-name"><?php the_title(); ?></h3>
                                                    <p class="services-card__info-description"><?php the_excerpt(); ?></p> <!-- Выводим краткое описание -->
                                                </div>
                                                <div class="button button--primary services-card__link-detail">
                                                    <a href="<?php the_permalink(); ?>">Подробнее</a>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php wp_reset_postdata(); // сбросим данные после запроса ?>
                        <?php else : ?>
                            <p>Услуги не найдены.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="guides-section" id="guides-section">
            <div class="container guides-section__container">
                <div class="guides-section__wrapper">
                    <div class="badge-section guides-section__badge"><?php the_field('guides-title'); ?></div>
                    <div class="guides-section__headline">
                        <h2 class="guides-section__title"><?php the_field('guides-subtitle') ?></h2>
                        <a href="<?php echo get_permalink(get_page_by_path('гайды')); ?>" class="button button--secondary guides-section__link-more">Все гайды</a>
                    </div>
                    <div class="guides-section__content">
                        <?php
                        // Запрос для получения 8 последних записей типа 'guide'
                        $args = array(
                            'post_type' => 'guide', // Тип записи
                            'posts_per_page' => 8, // Ограничение на количество выводимых записей
                            'orderby' => 'date', // Сортировка по дате
                            'order' => 'DESC' // От свежей к старой
                        );

                        $guide_query = new WP_Query($args);
                        ?>

                        <ul class="guides-section__grid">
                            <?php if ($guide_query->have_posts()) : ?>
                                <?php while ($guide_query->have_posts()) : $guide_query->the_post(); ?>
                                    <li class="guides-section__grid-item">
                                        <article class="guides-section__grid-card guide-card">
                                            <div class="guide-card__wrapper">
                                                <a href="<?php the_permalink(); ?>" class="guide-card__link guide-card__link--img">
                                                    <!-- Изображение записи -->
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <img loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" class="guide-card__img">
                                                    <?php else : ?>
                                                        <img loading="lazy" src="./assets/img/about/img-1.jpg" alt="Изображение гайда" class="guide-card__img">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="guide-card__info">
                                                    <a href="<?php the_permalink(); ?>" class="guide-card__info-link">
                                                        <h3 class="guide-card__info-name"><?php the_title(); ?></h3>
                                                    </a>
                                                    <p class="guide-card__info-text"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); // Восстановление глобальной переменной $post ?>
                            <?php else : ?>
                                <p>Гайды не найдены.</p>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="staff-section" id="staff-section">
            <div class="container staff-section__container">
                <div class="staff-section__wrapper">
                    <div class="badge-section staff-section__badge"><?php the_field('staff-title'); ?></div>
                    <div class="staff-section__headline">
                        <h2 class="staff-section__title"><?php the_field('staff-subtitle'); ?></h2>
                    </div>
                    <div class="staff-section__content">
                        <?php
                        $args = array(
                            'post_type'      => 'employee', // Ваш кастомный тип записи
                            'posts_per_page' => -1, // Выводим все записи
                        );

                        $employee_query = new WP_Query($args);

                        if ($employee_query->have_posts()) : ?>
                            <ul class="staff-section__grid">
                                <?php while ($employee_query->have_posts()) : $employee_query->the_post(); ?>
                                    <li class="staff-section__grid-item">
                                        <article class="staff-section__grid-card staff-card">
                                            <div class="staff-card__wrapper">
                                                <!-- Фото сотрудника -->
                                                <img loading="lazy" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="staff-card__wrapper-photo">

                                                <div class="staff-card__info">
                                                    <!-- Имя сотрудника -->
                                                    <h3 class="staff-card__info-name"><?php the_title(); ?></h3>

                                                    <!-- Стаж работы -->
                                                    <div class="staff-card__info-experience">
                                                        Стаж работы <?php echo get_the_content(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p>Сотрудники не найдены.</p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
        <section class="reviews-section" id="reviews-section">
            <div class="container reviews-section__container">
                <div class="reviews-section__wrapper">
                    <div class="badge-section reviews-section__badge"><?php the_field('reviews-title'); ?></div>
                    <div class="reviews-section__headline">
                        <h2 class="reviews-section__title"><?php the_field('reviews-subtitle'); ?></h2>
                    </div>
                    <div class="reviews-section__content">
                        <div class="swiper reviews-section__slider">
                            <div class="swiper-wrapper reviews-section__slider-wrapper">
                                <?php if (have_rows('reviews-repeater')): ?>
                                    <?php while (have_rows('reviews-repeater')): the_row(); ?>
                                        <div class="swiper-slide reviews-section__slider-slide reviews-slide">
                                            <div class="reviews-slide__wrapper">
                                                <p class="reviews-slide__wrapper-text"><?php  the_sub_field('reviews-repeater-text'); ?></p>
                                                <div class="reviews-slide__wrapper-info">
                                                    <p class="reviews-slide__wrapper-author">
                                                        <?php the_sub_field('reviews-repeater-title'); ?> <?php
                                                        // Получаем и форматируем дату
                                                        echo ' • ' . date_i18n('d.m.Y', strtotime(get_sub_field('reviews-repeater-date'))) . ' г.';
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="swiper-pagination reviews-section__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>