<?php
$currentPostType = get_post_type();
$currentCat = get_category(get_query_var('cat'));
$terms = get_terms('category');
?>

<div id="filter-<?php echo $currentPostType; ?>" class="filter-container">
    <div class="categories-menu-container">
        <p class="title"><?php _e('Categories', 'treize'); ?></p>
        <ul class="actual-menu">
            <li><a <?php if (is_home()) echo 'class="active"'; ?>href="<?php echo get_permalink(get_option('page_for_posts')); ?>#filter-<?php echo $currentPostType; ?>"><?php _e('All', 'treize'); ?></a></li>
            <?php
            foreach ($terms as $term) :
                $active = '';
                if (is_category()) {
                    if ($currentCat->slug == $term->slug) {
                        $active = 'active';
                    }
                }
            ?>
                <li><a <?php echo 'class="' . $active . '"'; ?> href="<?php echo get_term_link($term->term_id) ?>#filter-<?php echo $currentPostType; ?>"><?php echo $term->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
