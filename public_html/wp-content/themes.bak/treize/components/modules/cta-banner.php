<?php
$anchor = $row['anchor_group']['anchor_id'];

if (get_page_template_slug() === 'template-faq.php' || get_page_template_slug() === 'template-purpose.php') {
    $subtitle = get_field('cta_subtitle');
    $label = get_field('cta_label');
    $destination = get_field('cta_destination');
} else {
    $banner = $row['cta_banner'];
    $label = $banner['cta_label'];
    $subtitle = $banner['cta_subtitle'];
    $destination = $banner['cta_destination'];
}
?>

<?php if (isset($destination) && isset($label) && !empty($label)) : ?>
    <section class="cta-banner" id="<?php echo $anchor; ?>">
        <a href="<?php the_permalink($destination->ID); ?>" class="cta-banner__container">
            <?php if ($subtitle) : ?>
                <p class="subtitle"><?php echo $subtitle; ?></p>
            <?php endif; ?>
            <div class="cta-banner__label">
                <h2 class="cta-banner__link"><?php echo $label; ?></h2>
                <div class="cta-banner__arrow">
                    <?php include(locate_template('assets/svg/big-arrow.svg', false, false)); ?>
                </div>
            </div>
        </a>
    </section>
<?php endif; ?>