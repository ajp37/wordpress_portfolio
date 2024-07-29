<?php
/* Template Name: Landing Page */
get_header();
?>

<div class="section" id="buy-poison">
    <div class="buy-poison-content">
        <h1>
            <?php the_field('buy_poison_title'); ?><br>
            <span class="trust-us"><?php the_field('buy_poison_subtitle'); ?></span>
        </h1>
        <p><?php the_field('buy_poison_description'); ?></p>
        <button><?php the_field('buy_poison_button_text'); ?></button>
    </div>
    <div class="buy-poison-image">
        <?php
        $image = get_field('buy_poison_image');
        if (!empty($image)): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        <p class="image-caption"><?php the_field('buy_poison_image_description'); ?></p>
    </div>
</div>


<div class="section cruelty-free">
    <div class="header-decoration">
        <span class="section-number"><?php the_field('cruelty_free_title_numbers'); ?></span>
        <div class="line-decoration"></div>
    </div>
    <h2 class="cruelty-free-title">
        <?php the_field('cruelty_free_title'); ?>
        <span class="development"><?php the_field('cruelty_free_subtitle'); ?></span>
    </h2>
    <p class="cruelty-free-description"><?php the_field('cruelty_free_description'); ?></p>
    <div class="puppy-section">
        <div class="puppy-text">
            <h3 class="puppy-title"><?php the_field('cruelty_free_puppy_title'); ?></h3>
            <p class="puppy-description"><?php the_field('cruelty_free_puppy_description'); ?></p>
        </div>
        <div class="puppy-image">
            <img src="<?php the_field('cruelty_free_puppy_image'); ?>" alt="A cute puppy">
        </div>
    </div>
</div>






<div class="section" id="our-flavours">
    <div class="header-decoration2">
        <span class="section-number2"><?php the_field('flavours_title_numbers'); ?></span>
        <div class="line-decoration2"></div>
    </div>
    <h2 class="flavours-title">
        <?php the_field('flavours_title'); ?>
        <span class="flavours-subtitle"><?php the_field('flavours_subtitle'); ?></span>
    </h2>
    <div class="flavours-grid">
        <?php
        $query = new WP_Query(
            array(
                'post_type' => 'flavour',
                'posts_per_page' => 3 // Número de posts por página
            )
        );

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
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
        else:
            echo '<p>No flavours found</p>';
        endif; ?>
        <button id="load-more">Load More</button>
    </div>

</div>







<?php get_footer(); ?>