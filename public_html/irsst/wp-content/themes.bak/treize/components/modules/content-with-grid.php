<?php
$content_with_grid_section = $row['content_with_grid_section'];
$anchor = $row['anchor_group']['anchor_id'];
$section_classes = '';

if ($content_with_grid_section['choice']) {
    $section_classes .= ' background-color';
}

if ($content_with_grid_section['grid']['radio_button']) {
    $section_classes .= ' ' . $content_with_grid_section['grid']['radio_button'];
}
?>
<section class="content-with-grid <?php echo $section_classes; ?>" id="<?php echo $anchor; ?>">
    <div class="wrapper">
        <div class="row">
            <?php if ($content_with_grid_section['content']) : ?>
                <div class="col-xxl-3 col-xxl-offset-2 col-lg-7 col-lg-offset-0 col-md-12 wysiwyg">
                    <?php echo $content_with_grid_section['content']; ?>
                </div>
            <?php endif; ?>
            <div class="col-xxl-5 col-xxl-offset-1 col-xl-6 col-lg-12 col-lg-offset-0">
                <?php if ($content_with_grid_section['grid']['title']) : ?>
                    <div class="content-with-grid__title row">
                        <h4><?php echo $content_with_grid_section['grid']['title']; ?></h4>
                    </div>
                <?php endif; ?>
                <?php if ($content_with_grid_section['grid']['repeater']) : ?>
                    <div class="row">
                        <?php include_repeater('components/partials/grid.php', $content_with_grid_section['grid']['repeater'], false); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>