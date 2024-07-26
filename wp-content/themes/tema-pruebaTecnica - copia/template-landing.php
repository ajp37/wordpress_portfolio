<?php
/* Template Name: Landing Page */
get_header();
?>

<div class="hero" style="background-image: url('<?php the_field('hero_image'); ?>');">
    <h1><?php the_field('hero_title'); ?></h1>
    <p><?php the_field('hero_description'); ?></p>
    <a href="<?php the_field('cta_link'); ?>" class="btn-cta"><?php the_field('cta_text'); ?></a>
</div>

<div class="features">
    <h2>Características</h2>
    <ul>
        <?php if (get_field('feature_1_title')): ?>
            <li>
                <h3><?php the_field('feature_1_title'); ?></h3>
                <p><?php the_field('feature_1_description'); ?></p>
            </li>
        <?php endif; ?>

        <?php if (get_field('feature_2_title')): ?>
            <li>
                <h3><?php the_field('feature_2_title'); ?></h3>
                <p><?php the_field('feature_2_description'); ?></p>
            </li>
        <?php endif; ?>

        <?php if (get_field('feature_3_title')): ?>
            <li>
                <h3><?php the_field('feature_3_title'); ?></h3>
                <p><?php the_field('feature_3_description'); ?></p>
            </li>
        <?php endif; ?>
    </ul>
</div>

<div class="testimonials">
    <h2>Testimonios</h2>
    <div class="testimonials-wrapper">
        <?php if (get_field('testimonial_1_text')): ?>
            <div class="testimonial">
                <p><?php the_field('testimonial_1_text'); ?></p>
                <span><?php the_field('testimonial_1_author'); ?></span>
            </div>
        <?php endif; ?>

        <?php if (get_field('testimonial_2_text')): ?>
            <div class="testimonial">
                <p><?php the_field('testimonial_2_text'); ?></p>
                <span><?php the_field('testimonial_2_author'); ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
?>
