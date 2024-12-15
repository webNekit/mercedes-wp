<?php
/*
 Template Name: Шаблон "Страница услуг"
 */
?>
<?php get_header(); ?>
<main aria-label="Контент страницы" data-main class="site-wrapper__main main" id="main">
    <div data-main-wrapper class="main-wrapper" id="main-wrapper">
        <section class="services-section" id="services-section">
            <div class="container services-section__container">
                <div class="services-section__wrapper">
                    <div class="badge-section services-section__badge"><?php  the_title(); ?></div>
                    <div class="services-section__headline">
                        <h2 class="services-section__title">Lorem ipsum dolor sit amet consectetur.</h2>
                    </div>
                    <div class="services-section__content">
                        <ul class="services-section__list">
                            <?php
                            $query = new WP_Query(array(
                                'post_type' => 'services', // Укажите ваш кастомный тип записей
                                'posts_per_page' => -1, // Вывести все записи
                            ));
                            if ($query->have_posts()):
                                while ($query->have_posts()): $query->the_post();
                                    ?>
                                    <li class="services-section__list-item">
                                        <article class="services-section__list-card services-card">
                                            <div class="services-card__wrapper">
                                                <div class="services-card__info">
                                                    <h3 class="services-card__info-name"><?php the_title(); ?></h3>
                                                    <p class="services-card__info-description"><?php the_excerpt(); ?></p>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="button button--primary services-card__link-detail">Подробнее</a>
                                            </div>
                                        </article>
                                    </li>
                                <?php
                                endwhile;
                                wp_reset_postdata(); // Сбрасываем глобальные данные WP_Query
                            else:
                                ?>
                                <p>На данный момент услуги отсутствуют.</p>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>
