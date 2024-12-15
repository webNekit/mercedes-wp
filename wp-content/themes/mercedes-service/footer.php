<a href="#header" data-toggle-up class="button-up">
    <i data-lucide="chevron-up"></i>
</a>
<footer aria-label="Подвал сайта" data-footer class="site-wrapper__footer footer" id="footer">
    <div class="container footer__container">
        <div class="footer__wrapper footer__wrapper--top">
            <div class="footer__column footer__column--left" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero/bg.jpg');">
                <div class="footer__info">
                    <ul class="footer__info-list">
                        <?php
                        // Получаем данные из настроек плагина
                        $address = get_option('sci_address', 'Адрес не указан');
                        $working_hours = get_option('sci_working_hours', 'График работы не указан');
                        $phone = get_option('sci_phone', 'Телефон не указан');

                        // Форматируем телефон для ссылки
                        $phone_href = preg_replace('/\s+/', '', $phone);
                        ?>
                        <li class="footer__info-item">
                            <div class="footer__info-value">
                                <span class="footer__info-value-span">Адрес: </span><?php echo esc_html($address); ?>
                            </div>
                        </li>
                        <li class="footer__info-item">
                            <div class="footer__info-value">
                                <span class="footer__info-value-span">График работы: </span><?php echo esc_html($working_hours); ?>
                            </div>
                        </li>
                        <li class="footer__info-item">
                            <a href="tel:<?php echo esc_attr($phone_href); ?>" class="footer__info-value">
                                <span class="footer__info-value-span">Телефон для связи: </span><?php echo esc_html($phone); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer__column footer__column--right">
                <h3 class="footer__title">Запишитесь на диагностику</h3>
                <?php echo do_shortcode('[contact-form-7 id="79f7325" title="main-form"]'); ?>
            </div>
        </div>
        <div class="footer__wrapper footer__wrapper--bottom">
            <p class="footer__copyright">© <?php bloginfo('name'); ?>, <?php echo date("Y"); ?></p>
        </div>
    </div>
</footer>
</div>
<!-- vendors -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://unpkg.com/imask"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/fslightbox.js"></script>
<!-- main -->
<script type="module" src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js"></script>
<?php wp_footer(); ?>
</body>
</html>
