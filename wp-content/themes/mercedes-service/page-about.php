<?php
/*
 Template Name: Шаблон "О нас"
 */

?>
<?php get_header(); ?>
<main aria-label="Контент страницы" data-main class="site-wrapper__main main" id="main">
    <div data-main-wrapper class="main-wrapper" id="main-wrapper">
        <?php
        // Получаем ID главной страницы
        $home_page_id = 9;
        ?>
            <section class="about-section" id="about-section">
                <div class="container about-section__container">
                    <div class="about-section__content">
                        <div class="about-section__column about-section__column--left">
                            <div class="badge-section about-section__badge">
                                <?php echo get_field('about-title', $home_page_id); ?>
                            </div>
                            <h2 class="about-section__title"><?php echo get_field('about-subtitle', $home_page_id); ?></h2>
                            <?php if (have_rows('about-repeater', $home_page_id)): ?>
                                <ul class="about-section__advantages">
                                    <?php  while (have_rows('about-repeater', $home_page_id)): the_row(); ?>
                                        <li class="about-section__advantages-item">
                                            <div class="about-section__advantages-card">
                                                <h3 class="about-section__advantages-title"><?php the_sub_field('about-repeater-title'); ?></h3>
                                                <p class="about-section__advantages-description"><?php the_sub_field('about-repeater-text'); ?></p>
                                            </div>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="about-section__column about-section__column--right">
                            <img loading="lazy" src="<?php echo get_field('about-bg', $home_page_id); ?>" alt="Автомобиль" class="about-section__img">
                        </div>
                    </div>
                </div>
            </section>
        <section class="gallery-section" id="gallery-section">
            <div class="container gallery-section__contianer">
                <div class="gallery-section__wrapper">
                    <div class="badge-section gallery-section__badge"><?php the_field('gallery-title'); ?></div>
                    <div class="gallery-section__headline">
                        <h2 class="gallery-section__title"><?php the_field('gallery-subtitle'); ?></h2>
                    </div>
                    <div class="gallery-section__content">
                        <?php if (have_rows('gallery-repeater')): ?>
                        <ul class="gallery-section__grid">
                            <?php while (have_rows('gallery-repeater')): the_row(); ?>
                            <li class="gallery-section__grid-item">
                                <div class="gallery-section__grid-card gallery-card">
                                    <a data-fslightbox="gallery" href="<?php the_sub_field('gallery-repeater-photo') ?>" class="gallery-card__link">
                                        <img loading="lazy" src="<?php the_sub_field('gallery-repeater-photo') ?>" alt="Изображение" class="gallery-card__img">
                                    </a>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>
