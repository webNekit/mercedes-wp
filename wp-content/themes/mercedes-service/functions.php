<?php
/**
 * mercedes-service functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mercedes-service
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mercedes_service_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mercedes-service, use a find and replace
		* to change 'mercedes-service' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mercedes-service', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'mercedes-service' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mercedes_service_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mercedes_service_setup' );


// Кастомные поля для записей
function create_service_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Услуги',
            'singular_name' => 'Услуга',
            'add_new' => 'Добавить новую',
            'add_new_item' => 'Добавить новую услугу',
            'edit_item' => 'Редактировать услугу',
            'new_item' => 'Новая услуга',
            'view_item' => 'Посмотреть услугу',
            'search_items' => 'Искать услуги',
            'not_found' => 'Услуги не найдены',
            'not_found_in_trash' => 'Услуги не найдены в корзине',
            'all_items' => 'Все услуги',
            'archives' => 'Архив услуг',
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true, // Для Gutenberg
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-businessman',
        'rewrite' => array('slug' => 'services'), // Укажите slug для услуг
    );
    register_post_type('services', $args); // Убедитесь, что имя типа поста правильно
}
add_action('init', 'create_service_post_type');



function create_guide_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Гайды',
            'singular_name' => 'Гайд',
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый гайд',
            'edit_item' => 'Редактировать гайд',
            'new_item' => 'Новый гайд',
            'view_item' => 'Посмотреть гайд',
            'search_items' => 'Искать гайды',
            'not_found' => 'Гайды не найдены',
            'not_found_in_trash' => 'Гайды не найдены в корзине',
            'all_items' => 'Все гайды',
            'archives' => 'Архив гайдов',
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true, // Для Gutenberg
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-media-text', // Иконка для кастомного типа записи
        'rewrite' => array('slug' => 'guides'), // ЧПУ для страниц
    );
    register_post_type('guide', $args);
}
add_action('init', 'create_guide_post_type');


// Этот код выполняет сброс перезаписи (flush) один раз.
function my_custom_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('init', 'my_custom_flush_rewrite_rules', 20);

// Добавление метабокса для видео
function add_video_meta_box() {
    add_meta_box(
        'guide_video_meta', // ID метабокса
        'Ссылка на видео', // Название метабокса
        'video_meta_box_callback', // Функция для отображения поля
        'guide', // Кастомный тип записи
        'normal', // Расположение метабокса
        'high' // Приоритет
    );
}
add_action('add_meta_boxes', 'add_video_meta_box');

// Функция для отображения метабокса
function video_meta_box_callback($post) {
    // Добавление nonce для безопасности
    wp_nonce_field('save_video_meta', 'video_meta_nonce');

    // Получаем текущее значение поля
    $video_url = get_post_meta($post->ID, '_video_link', true);

    // Поле для ввода ссылки на видео
    echo '<label for="video_link">Ссылка на видео</label>';
    echo '<input type="url" id="video_link" name="video_link" value="' . esc_url($video_url) . '" style="width: 100%;" />';
}

// Сохранение данных метабокса
function save_video_meta($post_id) {
    // Проверка безопасности
    if (!isset($_POST['video_meta_nonce']) || !wp_verify_nonce($_POST['video_meta_nonce'], 'save_video_meta')) {
        return $post_id;
    }

    // Проверка, не автосохранение ли это
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Проверка, если пользователь имеет право редактировать запись
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Сохраняем или удаляем ссылку на видео
    if (isset($_POST['video_link'])) {
        update_post_meta($post_id, '_video_link', esc_url_raw($_POST['video_link']));
    } else {
        delete_post_meta($post_id, '_video_link');
    }
}
add_action('save_post', 'save_video_meta');


function create_employee_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Сотрудники',
            'singular_name' => 'Сотрудник',
            'add_new' => 'Добавить нового сотрудника',
            'add_new_item' => 'Добавить нового сотрудника',
            'edit_item' => 'Редактировать сотрудника',
            'new_item' => 'Новый сотрудник',
            'view_item' => 'Посмотреть сотрудника',
            'search_items' => 'Искать сотрудников',
            'not_found' => 'Сотрудники не найдены',
            'not_found_in_trash' => 'Сотрудники не найдены в корзине',
            'all_items' => 'Все сотрудники',
            'archives' => 'Архив сотрудников',
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true, // Для Gutenberg
        'supports' => array('title', 'editor', 'thumbnail'), // Стандартные поля
        'menu_icon' => 'dashicons-businessman', // Иконка для кастомного типа записи
        'rewrite' => array('slug' => 'employees'), // ЧПУ для сотрудников
    );
    register_post_type('employee', $args); // Убедитесь, что имя типа поста правильно
}
add_action('init', 'create_employee_post_type');


// Настройка seo-полей - заголовок
function get_meta_title() {
    // Если это страница или запись
    if (is_singular()) {
        // Получаем значение поля 'meta_title' через ACF
        $title = get_field('meta_title');
        if (!$title) {
            // Если поле пустое, используем стандартный заголовок
            $title = get_the_title();
        }
    }
    // Для других типов страниц (например, главной)
    elseif (is_home() || is_front_page()) {
        $title = get_bloginfo('name');
    }
    // По умолчанию
    else {
        $title = "Добро пожаловать на наш сайт!";
    }

    return esc_attr($title); // Экранируем строку для безопасности
}

// Настройка seo-полей - описание
function get_meta_description() {
    if (is_singular()) {
        // Получаем значение поля 'meta_description' через ACF
        $description = get_field('meta_description');
        if (!$description) {
            // Если поле пустое, используем краткое описание записи
            $description = get_the_excerpt();
        }
    } elseif (is_home() || is_front_page()) {
        // Для главной страницы
        $description = get_bloginfo('description');
    } else {
        // По умолчанию
        $description = "Добро пожаловать на наш сайт!";
    }

    return esc_attr($description); // Экранируем строку для безопасности
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mercedes_service_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mercedes_service_content_width', 640 );
}
add_action( 'after_setup_theme', 'mercedes_service_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mercedes_service_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mercedes-service' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mercedes-service' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mercedes_service_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mercedes_service_scripts() {
	wp_enqueue_style( 'mercedes-service-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mercedes-service-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mercedes-service-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mercedes_service_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

