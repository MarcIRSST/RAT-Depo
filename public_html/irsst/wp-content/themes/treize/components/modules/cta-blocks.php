<?php
$cta_blocks_section = $row['cta_blocks_section'];
$title = $cta_blocks_section['title'];
$subtitle = $cta_blocks_section['subtitle'];
$cta_repeater = $cta_blocks_section['repeater'];
$display_mode = $cta_blocks_section['radio_button'];
$class_section = '';
$anchor = $row['anchor_group']['anchor_id'];

if ($display_mode == "full-width") {
    $class_section .= ' full-width-mode';
} else {
    $class_section .= ' wrapper';
}

if (is_array($cta_repeater) && count($cta_repeater) > 2 && $display_mode !== "full-width") {
    $class_section .= ' three-cards';
}
?>

<section class="cta-blocks" id="<?php echo $anchor ?>">
    <div class="<?php echo $class_section; ?>">
        <div class="cta-blocks__description">
            <?php if ($subtitle) : ?>
                <p class="subtitle"><?php echo $subtitle; ?></p>
            <?php endif; ?>
            <?php if ($title) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>
        </div>
        <?php if ($cta_repeater) : ?>
            <div class="row cta-blocks__container">
                <?php include_repeater('components/partials/cta-block.php', $cta_repeater, false); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
