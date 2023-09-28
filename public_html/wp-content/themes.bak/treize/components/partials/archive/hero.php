<?php
$close_class = [];

if ($has_search !== null && !$has_search) {
    $close_class[] = 'col-xxl-offset-4';
}
?>
<section class="archive-hero wrapper">
    <div class="row middle-xxl">
        <div class="col-xxl-6 col-lg-8 col-sm-12">
            <?php echo $hero_title ?>
        </div>
        <?php if ($has_search !== null && $has_search) : ?>
            <div class="archive__search col-xxl-2 col-xxl-offset-2 last-lg col-lg-12 col-lg-offset-0">
                <div class="archive__search-container">
                    <i><?php include(locate_template('assets/svg/search-icon.svg')) ?></i>
                    <input type="text" id="archive-search" placeholder="<?php _e('Rechercher un terme...', 'treize'); ?>" class="col-xxl-12 archive-search-trigger">
                </div>
            </div>
        <?php endif; ?>
        <?php if (is_post_type_archive()) : ?>
            <div class=" archive__close col-xxl-2 col-lg-4 col-sm-12 col-sm-offset-0 first-sm <?php echo join(' ', $close_class); ?>">
                <a href="#<?php _e('fermer', 'treize') ?>" id="archive-close" title="<?php _e('Retour à la page précédente', 'treize') ?>" class="back-button">
                    <?php _e('Fermer', 'treize'); ?>
                    <i><?php include(locate_template('assets/svg/close-icon.svg')); ?></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>