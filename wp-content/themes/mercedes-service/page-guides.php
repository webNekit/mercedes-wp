<?php
/*
 Template Name: Шаблон "Страница гайдов"
 */
?>

<?php get_header(); ?>

<main aria-label="Контент страницы" data-main class="site-wrapper__main main" id="main">
    <div data-main-wrapper class="main-wrapper" id="main-wrapper">
        <section class="guides-section" id="guides-section">
            <div class="container guides-section__container">
                <div class="guides-section__wrapper">
                    <div class="badge-section guides-section__badge"><?php the_field('meta_title'); ?></div>
                    <div class="guides-section__headline">
                        <h2 class="guides-section__title"><?php the_field('meta_description'); ?></h2>
                    </div>
                    <div class="guides-section__content">
                        <ul class="guides-section__grid">
                            <?php
                            // Запрос для получения всех записей типа 'guide'
                            $args = array(
                                'post_type' => 'guide', // Тип записи
                                'posts_per_page' => -1, // Без ограничения по количеству
                                'orderby' => 'date', // Сортировка по дате
                                'order' => 'DESC' // От свежей к старой
                            );

                            $guide_query = new WP_Query($args);

                            if ($guide_query->have_posts()) :
                                while ($guide_query->have_posts()) : $guide_query->the_post();
                                    ?>
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
                                <?php
                                endwhile;
                                wp_reset_postdata(); // Восстановление глобальной переменной $post
                            else :
                                ?>
                                <p>Гайды не найдены.</p>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>