<?php
$short_title = get_field("short_title", get_the_ID());
$identification = get_field("identification", get_the_ID());
?>
<div class="annex-link">
    <a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="row">
        <p class="annex-link__short-title"><?php echo $short_title; ?></p>
        <div class="row">
            <p class="annex-link__identification"><?php echo $identification; ?></p>
            <i><?php include(locate_template('assets/svg/ext-arrow-white.svg')) ?></i>
        </div>
    </a>
</div>