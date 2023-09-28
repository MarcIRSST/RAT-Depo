<?php

if (is_post_type_archive('modules') || is_tax()) {
    $postType = 'modules';
    $cardNamePath = 'components/integrations/card-module.php';
}

$initialPostNumber = 8;
$thePosts = array();

?>

<div id="container-items-to-be-loaded-in" class="container-cards">
    <?php
    while (have_posts()) : the_post();
        $thePosts[] = get_the_ID();
    endwhile;
    $maxIndex = count($thePosts) >= $initialPostNumber ? $initialPostNumber : count($thePosts);
    $btnLoadMoreLabel = 'Load more';
    include(locate_template('functions/ajax/load-more-loop.php', false, false));
    wp_reset_postdata();
    ?>
</div>
<div class="loader-container">
    <div class="loader"></div>
</div>
<?php if (count($thePosts) > 0) : ?>
    <div id="loadmore" class="row">
        <div class="col-xxl-12 text-center">
            <div id="load-more-btn" class="cta--main" data-path="<?php echo $cardNamePath; ?>">Voir plus</div>
        </div>
    </div>
<?php endif; ?>
