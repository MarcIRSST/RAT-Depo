<section">
$anchor = $row['anchor_group']['anchor_id'];

if (isset($is_purpose) && $is_purpose) {
    $module_classes[] = 'scroll-aware-section';
<section class="quote <?php echo join(' ', $module_classes) ?>" id="<?php echo $anchor; ?>">
    <div class="wrapper">
        <?php if ($row['quote_content']) : ?>
            <div>
                <blockquote><?php echo $row['quote_content']; ?></blockquote>
            </div>
        <?php endif; ?>
    </div>
    </section>
