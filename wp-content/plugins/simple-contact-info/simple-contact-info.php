<?php
/**
 * Plugin Name: Simple Contact Info
 * Description: Плагин для отображения контактной информации (адрес, график работы, телефон).
 * Version: 1.0
 * Author: Александр
 */

// Запрет прямого доступа к файлу.
if (!defined('ABSPATH')) {
    exit;
}

// === Регистрация страницы настроек ===
function sci_register_settings_page() {
    add_options_page(
        'Контактная информация', // Заголовок страницы настроек
        'Контакты',             // Название пункта меню
        'manage_options',       // Права доступа (только админы)
        'simple-contact-info',  // Уникальный слаг страницы
        'sci_settings_page'     // Callback-функция для отображения страницы
    );
}
add_action('admin_menu', 'sci_register_settings_page');

// === Вывод страницы настроек ===
function sci_settings_page() {
    ?>
    <div class="wrap">
        <h1>Контактная информация</h1>
        <form method="post" action="options.php">
            <?php
            // Регистрация настроек.
            settings_fields('sci_settings_group');
            do_settings_sections('simple-contact-info');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// === Регистрация настроек и полей ===
function sci_register_settings() {
    // Регистрируем настройки.
    register_setting('sci_settings_group', 'sci_address');
    register_setting('sci_settings_group', 'sci_working_hours');
    register_setting('sci_settings_group', 'sci_phone');

    // Добавляем секцию настроек.
    add_settings_section(
        'sci_main_section',          // Идентификатор секции
        'Контактные данные',         // Заголовок
        '',                          // Callback (пустой, если описание не требуется)
        'simple-contact-info'        // Слаг страницы настроек
    );

    // Поле "Адрес".
    add_settings_field(
        'sci_address',               // Идентификатор поля
        'Адрес',                     // Заголовок
        'sci_address_field',         // Callback-функция для вывода поля
        'simple-contact-info',       // Слаг страницы настроек
        'sci_main_section'           // Секция, где отображается поле
    );

    // Поле "График работы".
    add_settings_field(
        'sci_working_hours',
        'График работы',
        'sci_working_hours_field',
        'simple-contact-info',
        'sci_main_section'
    );

    // Поле "Телефон".
    add_settings_field(
        'sci_phone',
        'Телефон',
        'sci_phone_field',
        'simple-contact-info',
        'sci_main_section'
    );
}
add_action('admin_init', 'sci_register_settings');

// === Поля ввода ===
function sci_address_field() {
    $address = get_option('sci_address', '');
    echo '<input type="text" name="sci_address" value="' . esc_attr($address) . '" class="regular-text">';
}

function sci_working_hours_field() {
    $working_hours = get_option('sci_working_hours', '');
    echo '<input type="text" name="sci_working_hours" value="' . esc_attr($working_hours) . '" class="regular-text">';
}

function sci_phone_field() {
    $phone = get_option('sci_phone', '');
    echo '<input type="text" name="sci_phone" value="' . esc_attr($phone) . '" class="regular-text">';
}

// === Шорткод для вывода контактов ===
function sci_display_contacts() {
    $address = get_option('sci_address', 'Адрес не указан');
    $working_hours = get_option('sci_working_hours', 'График работы не указан');
    $phone = get_option('sci_phone', 'Телефон не указан');

    ob_start();
    ?>
    <div class="contact-info">
        <p><strong>Адрес:</strong> <?php echo esc_html($address); ?></p>
        <p><strong>График работы:</strong> <?php echo esc_html($working_hours); ?></p>
        <p><strong>Телефон:</strong> <a href="tel:<?php echo esc_html($phone); ?>"><?php echo esc_html($phone); ?></a></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('simple_contact_info', 'sci_display_contacts');

// === Подключение CSS для шорткода ===
function sci_enqueue_styles() {
    wp_enqueue_style(
        'simple-contact-info-styles', // Уникальное имя стиля
        plugin_dir_url(__FILE__) . 'css/style.css' // Путь к стилям
    );
}
add_action('wp_enqueue_scripts', 'sci_enqueue_styles');

// === Создание директории и файла стилей при активации плагина ===
function sci_plugin_activation() {
    $upload_dir = wp_upload_dir();
    $plugin_dir = plugin_dir_path(__FILE__) . 'css/';
    $style_file = $plugin_dir . 'style.css';

    if (!file_exists($plugin_dir)) {
        mkdir($plugin_dir, 0755, true); // Создаём директорию, если её нет.
    }

    if (!file_exists($style_file)) {
        file_put_contents($style_file, '.contact-info { font-family: Arial, sans-serif; }'); // Добавляем базовые стили.
    }
}
register_activation_hook(__FILE__, 'sci_plugin_activation');
