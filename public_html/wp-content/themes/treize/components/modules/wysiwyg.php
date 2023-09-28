<?php
$anchor = $row['anchor_group'];
$module_classes = [];

if (isset($is_purpose) && $is_purpose) {
    $module_classes[] = 'scroll-aware-section';
}
if (get_post_type() == 'post') {
    $module_classes[] = ' small-wysi';
}

if ($row['wysiwyg_content']) {
    if (isset($row['wysiwyg_content']['wysiwyg'])) {
        $content = $row['wysiwyg_content']['wysiwyg'];
    } else {
        $content = $row['wysiwyg_content'];
    }
}

?>
<section class="wysiwyg-module <?php echo join(' ', $module_classes) ?>" id="<?php echo slugify($anchor['anchor_id']); ?>">
    <div class="wrapper wysiwyg_container">
        <?php if ($anchor && isset($anchor['anchor_number'])) : ?>
            <span class="section__number"><?php echo $anchor['anchor_number'] ?></span>
        <?php endif; ?>
        <?php if (isset($content)) : ?>
            <div class="wysiwyg">
                <?php echo apply_filters('the_content', $content); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
