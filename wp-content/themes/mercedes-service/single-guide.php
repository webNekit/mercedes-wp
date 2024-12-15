<?php get_header(); ?>

<main aria-label="Контент страницы" data-main class="site-wrapper__main main" id="main">
    <div data-main-wrapper class="main-wrapper" id="main-wrapper">
        <section class="single-section" id="single-section">
            <div class="container single-section__container">
                <div class="single-section__wrapper">
                    <!-- Заголовок статьи -->
                    <h1 class="single-section__title"><?php the_title(); ?></h1>

                    <!-- Баннер с изображением (если оно есть) -->
                    <div class="single-section__banner">
                        <?php if (has_post_thumbnail()) : ?>
                            <img loading="lazy" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" class="single-section__banner-img">
                        <?php endif; ?>
                    </div>

                    <!-- Контент статьи -->
                    <div class="single-section__content">
                        <?php the_content(); ?>
                    </div>

                    <!-- Видео (если есть поле для видео) -->
                    <div class="single-section__video">
                        <?php
                        // Получаем URL видео из кастомного поля
                        $video_url = get_field('guide_video_url');
                        if ($video_url) :
                            ?>
                            <iframe width="560" height="315" src="<?php echo esc_url($video_url); ?>" frameborder="0" allowfullscreen></iframe>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>