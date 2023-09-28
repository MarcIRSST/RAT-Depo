<?php
$subtitle = $module['cta_subtitle'];
$title = $module['cta_title'];
$label = $module['cta_label'];
$destination_id = $module['cta_destination']->ID;
$destination = get_permalink($destination_id);
$theme = get_field('page_theme', $module['cta_destination']->ID);
$card_classes = array();

if ($theme) {
    $card_classes[] = ' theme-' . $theme;
} else {
    $card_classes[] = ' theme-neutral';
}

?>

<?php if ($destination) : ?>
    <div class="col-xxl-6 col-lg-12 cta-block <?php echo join(' ', $card_classes); ?>">
        <a href="<?php echo $destination; ?>" class="cta-block__container">
            <div>
                <?php if ($subtitle) : ?>
                    <p class="subtitle"><?php echo $subtitle; ?></p>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h4><?php echo $title; ?></h4>
                <?php endif; ?>
            </div>
            <?php if ($label) : ?>
                <div class="cta--main"><?php echo $label; ?></div>
            <?php endif; ?>
        </a>
    </div>
<?php endif; ?>
