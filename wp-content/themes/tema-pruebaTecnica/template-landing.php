<?php
/* Template Name: Landing Page */
get_header();
?>

<div class="section" id="buy-poison">
    <div class="buy-poison-content">
        <h1>
            <?php the_field('buy_poison_title'); ?><br>
            <span class="trust-us">Trust us.</span>
        </h1>
        <p><?php the_field('buy_poison_description'); ?></p>
        <button><?php the_field('buy_poison_button_text'); ?></button>
    </div>
    <div class="buy-poison-image">
        <?php 
        $image = get_field('buy_poison_image');
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        <p class="image-caption">*We keep the right to deny any refunds on our own terms. Total responsibility is up to the final user buying poison.</p>
    </div>
</div>



<div class="section" id="cruelty-free">
    <h2><?php the_field('cruelty_free_title'); ?></h2>
    <p><?php the_field('cruelty_free_description'); ?></p>
    <div class="puppy-section">
        <h3><?php the_field('cruelty_free_puppy_title'); ?></h3>
        <p><?php the_field('cruelty_free_puppy_description'); ?></p>
        <img src="<?php the_field('cruelty_free_puppy_image'); ?>" alt="A cute puppy">
    </div>
</div>


<div class="section" id="our-flavours">
    <h2>Our Flavours</h2>
    <div class="flavours-grid">
        <?php for ($i = 1; $i <= 12; $i++): 
            $title = get_field("flavour_{$i}_title");
            $description = get_field("flavour_{$i}_description");
            $image = get_field("flavour_{$i}_image");
            if ($title && $description && $image): ?>
                <div class="flavour-card">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($description); ?></p>
                    <button>Details →</button>
                </div>
            <?php endif; 
        endfor; ?>
    </div>
</div>


<?php get_footer(); ?>
