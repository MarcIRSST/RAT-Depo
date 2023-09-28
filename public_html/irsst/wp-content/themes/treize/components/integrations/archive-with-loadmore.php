<?php
$thePosts = array();
$cardNamePath = 'components/card-news-ajax.php';
$btnLoadMoreLabel = 'Afficher plus';
$initialPostNumber = 8;
?>
<div class="posts-container">
    <div id="container-items-to-be-loaded-in" class="cards-container">
        <?php
        while (have_posts()) : the_post();
            $thePosts[] = get_the_ID();
        endwhile;
        $maxIndex = count($thePosts) >= $initialPostNumber ? $initialPostNumber : count($thePosts);
        include(locate_template('functions/ajax/load-more-loop.php', false, false));
        wp_reset_postdata();
        ?>
    </div>
    <?php include(locate_template('components/integrations/loadmore-btn.php', false, false)); ?>
</div>
