<?php
$content_with_cta_section = $row['content_with_cta_section'];
$anchor = $row['anchor_group']['anchor_id'];
$section_classes = '';

if ($content_with_cta_section['choice']) {
    $section_classes .= ' background-color';
}

?>
<section class="content-with-cta <?php echo $section_classes; ?>" id="<?php echo $anchor; ?>">
    <div class="wrapper">
        <div class="row">
            <?php if ($content_with_cta_section['content']) : ?>
                <div class="col-xxl-4 col-lg-7 col-md-12 wysiwyg">
                    <?php echo $content_with_cta_section['content']; ?>
                </div>
            <?php endif; ?>
            <?php if ($content_with_cta_section['repeater']) : ?>
                <div class="col-xxl-7 col-xxl-offset-1 col-lg-12 col-lg-offset-0 content-with-cta__ctas">
                    <?php include_repeater('components/partials/cta-block.php', $content_with_cta_section['repeater'], false); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
