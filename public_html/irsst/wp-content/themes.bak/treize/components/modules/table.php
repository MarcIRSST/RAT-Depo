<?php
$table = $row['table'];
$has_wrapper = isset($row['has_wrapper']) ? $row['has_wrapper'] : true;
$type = $table['table_type'];
$has_title = $table['has_title'];
$footnote = $table['table_footnote'];
$module_classes = ['table--' . $type];
$anchor = $row['table']['anchor_group']['anchor_id'];

if (isset($is_purpose) && $is_purpose) {
    $module_classes[] = 'scroll-aware-section';
}

?>
<section class="table <?php echo join(' ', $module_classes) ?>" id="<?php echo $anchor; ?>">
    <div class="table__wrapper <?php echo $has_wrapper ? 'wrapper' : ''; ?>">
        <?php if ($has_title) : ?>
            <div class="table__title"><?php echo $row['table']['table_title'] ?></div>
        <?php endif; ?>
        <div class="table__main">
            <?php include(locate_template('components/partials/tables/' . $type . '.php')); ?>
        </div>
        <?php if ($footnote) : ?>
            <div class="table__footer">
                <legend>
                    <?php echo $footnote ?>
                </legend>
            </div>
        <?php endif; ?>
    </div>
</section>