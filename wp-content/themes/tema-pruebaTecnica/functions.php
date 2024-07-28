<?php
function my_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');








// En functions.php o en un plugin personalizado

function load_more_flavours() {
    $paged = $_POST['page'] + 1; // Incrementar el número de página
    $query = new WP_Query(array(
        'post_type' => 'flavour',
        'posts_per_page' => 2, // Número de posts por página
        'paged' => $paged
    ));

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $title = get_field("flavour_title");
            $description = get_field("flavour_description");
            $image = get_field("flavour_image");
            if ($title && $description && $image): ?>
                <div class="flavour-card">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($description); ?></p>
                    <button>Details →</button>
                </div>
            <?php endif;
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No more flavours found</p>';
    endif;

    wp_die();
}
add_action('wp_ajax_nopriv_load_more_flavours', 'load_more_flavours');
add_action('wp_ajax_load_more_flavours', 'load_more_flavours');




//encolar js
// En functions.php o en un plugin personalizado

function enqueue_load_more_script() {
    wp_enqueue_script('load-more-flavours', get_template_directory_uri() . '/js/load-more-flavours.js', array(), null, true);
    wp_localize_script('load-more-flavours', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_script');


















// Registrar Custom Post Type "flavour"
function create_flavour_cpt() {
    $labels = array(
        'name' => _x('Flavours', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Flavour', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => _x('Flavours', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Flavour', 'Add New on Toolbar', 'textdomain'),
        'archives' => __('Flavour Archives', 'textdomain'),
        'attributes' => __('Flavour Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent Flavour:', 'textdomain'),
        'all_items' => __('All Flavours', 'textdomain'),
        'add_new_item' => __('Add New Flavour', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'new_item' => __('New Flavour', 'textdomain'),
        'edit_item' => __('Edit Flavour', 'textdomain'),
        'update_item' => __('Update Flavour', 'textdomain'),
        'view_item' => __('View Flavour', 'textdomain'),
        'view_items' => __('View Flavours', 'textdomain'),
        'search_items' => __('Search Flavour', 'textdomain'),
        'not_found' => __('Not found', 'textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into Flavour', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this Flavour', 'textdomain'),
        'items_list' => __('Flavours list', 'textdomain'),
        'items_list_navigation' => __('Flavours list navigation', 'textdomain'),
        'filter_items_list' => __('Filter Flavours list', 'textdomain'),
    );
    $args = array(
        'label' => __('Flavour', 'textdomain'),
        'description' => __('Custom post type for flavours', 'textdomain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('flavour', $args);
}
add_action('init', 'create_flavour_cpt', 0);


?>
