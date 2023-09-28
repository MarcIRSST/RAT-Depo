<?php
$label = $module['title'];
$item = $module['post'];
$short_title = get_field('short_title', $item->ID);
$identification = get_field('identification', $item->ID);
$destination = get_permalink($item->ID);
$obj = get_post_type_object($item->post_type);
$right_title = $obj->labels->singular_name;
?>

<a href="<?php echo $destination; ?>" class="annex row">
    <?php if ($label) : ?>
        <p class="small-text"><?php echo $label; ?></p>
    <?php else : ?>
        <p class="small-text"><?php echo $short_title; ?></p>
    <?php endif; ?>
    <div class="annex__right">
        <?php if ($identification) : ?>
            <p class="xs-text"><?php echo $identification; ?></p>
        <?php else : ?>
            <p class="xs-text"><?php echo $right_title; ?></p>
        <?php endif; ?>
        <div class="annex__arrow">
            <?php include(locate_template('assets/svg/ext-arrow-white.svg', false, false)); ?>
        </div>
    </div>
</a>