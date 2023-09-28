<?php
$ancestors_ids = array_reverse(get_post_ancestors(get_the_ID()));
$breadcrumbs = array();

foreach ($ancestors_ids as $parent_id) {
    $breadcrumb_item_title_field = get_field('purpose_hero_title', $parent_id);
    $breadcrumb_item_title = $breadcrumb_item_title_field ? $breadcrumb_item_title_field : get_the_title($parent_id);
    $breadcrumb_item_label = explode(' ', $breadcrumb_item_title);

    // Add ellipsis after 3 words if the page has more than 1 ancestors
    if (count($breadcrumb_item_label) > 3 && count($ancestors_ids) > 1) {
        $breadcrumb_item_label = join(' ', array_slice($breadcrumb_item_label, 0, 3)) . '&nbsp;<span class="ellipsis-text">' . join(' ', array_slice($breadcrumb_item_label, 3)) . '</span><span class="ellipsis">...</span>';
    } else {
        $breadcrumb_item_label = join(' ', $breadcrumb_item_label);
    }

    array_push($breadcrumbs, array(
        'title' => $breadcrumb_item_title,
        'label' => $breadcrumb_item_label,
        'link' => get_the_permalink($parent_id)
    ));

    unset($breadcrumb_item_label, $breadcrumb_item_title);
}

if (count($breadcrumbs) > 0) :
?>
    <nav class="breadcrumbs">
        <a href="javascript:history.back()" class="breadcrumbs--mobile">
            <span class="arrow--small">
                <?php include(locate_template('assets/svg/small-arrow.svg')); ?>
            </span>
            <?php _e('Retour', 'treize'); ?>
        </a>
        <ul class="breadcrumbs--desktop breadcrumbs__list">
            <li class="breadcrumbs__item">
                <a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('description');  ?>" class="breadcrumbs__link">
                    <?php include(locate_template('assets/svg/home-icon.svg')) ?>
                </a>
            </li>
            <?php foreach ($breadcrumbs as $crumb) : ?>
                <li class="breadcrumbs__item">
                    <a href="<?php echo $crumb['link']; ?>" class="breadcrumbs__link" title="<?php echo $crumb['title'] ?>">
                        <?php echo $crumb['label']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
<?php endif; ?>
