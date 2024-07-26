<?php
// Cargar estilos y scripts
function enqueue_custom_stylesheets() {
    // Cargar el CSS compilado
    wp_enqueue_style('main-styles', get_template_directory_uri() . '/assets/css/main.css');

    // Cargar fuentes de Google (si es necesario)
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', false);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_stylesheets');

// Soporte para características del tema
function theme_setup() {
    // Soporte para título dinámico
    add_theme_support('title-tag');
    
    // Soporte para imágenes destacadas
    add_theme_support('post-thumbnails');
    
    // Registro de menús
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mi-tema'),
    ));
}

add_action('after_setup_theme', 'theme_setup');

// Registrar área de widgets (si es necesario)
function theme_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'mi-tema'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'mi-tema'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'theme_widgets_init');

// Incluir archivos necesarios para ACF
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

// Añadir soporte para cargar traducciones (si es necesario)
function theme_load_textdomain() {
    load_theme_textdomain('mi-tema', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'theme_load_textdomain');

// Función para cargar scripts adicionales (si es necesario)
function enqueue_custom_scripts() {
    // Ejemplo: Cargar un script personalizado
    // wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom-script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

/*
Explicación de functions.php
Cargar Estilos y Scripts: La función enqueue_custom_stylesheets carga el archivo CSS compilado desde SCSS y, opcionalmente, fuentes de Google. Esta función se engancha en wp_enqueue_scripts.

Soporte para Características del Tema: La función theme_setup se usa para agregar soporte para varias características del tema, como títulos dinámicos, imágenes destacadas y menús de navegación. Esta función se engancha en after_setup_theme.

Registro de Widgets: La función theme_widgets_init registra una área de widgets. Esto se engancha en widgets_init.

ACF: Verifica si la función acf_add_options_page existe y la usa para agregar una página de opciones si es necesario.

Soporte para Traducciones: La función theme_load_textdomain carga archivos de traducción para el tema. Esto se engancha en after_setup_theme.

Cargar Scripts Adicionales: La función enqueue_custom_scripts está preparada para cargar scripts adicionales, si es necesario. Se engancha en wp_enqueue_scripts.
*/

?>