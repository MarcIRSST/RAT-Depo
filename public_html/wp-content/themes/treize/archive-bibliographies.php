<?php

/**
 * Bibliographies archive page
 */
get_header();
$object = get_queried_object();
$bibliographies_chunks = array();
$terms = get_terms(
    'sections',
    array(
        'hide_empty' => true
    )
);

foreach ($terms as $term) {

    if ($term->count > 0) {
        $args = array(
            'post_type' => 'bibliographies',
            'numberposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => $term->taxonomy,
                    'field' => 'id',
                    'terms' => array($term->term_id),
                )
            )
        );
        $bibliographies_chunks[$term->name] = array(
            'slug' => $term->slug,
            'items' => get_posts($args)
        );
    } else {
        $bibliographies_chunks[$term->name] = array(
            'slug' => $term->slug,
            'items' => array()
        );
    }
}

?>
<div id="primary">
    <main id="main" class="site-main archive archive--bibliographies" role="main">
        <?php
        $hero_title = '<h1>' . $object->label . '</h1>';
        $has_search = true;
        include(locate_template('components/partials/archive/hero.php'));
        ?>
        <section class="archive bibliographies wrapper" style="--nav-min-width: calc(364px * <?php echo count($terms); ?> )">
            <div class="archive__nav" id="scroll-aware-navigation">
                <div class="archive__nav-wrapper">
                    <div class="archive__nav-list">
                        <?php foreach ($terms as $term) : ?>
                            <a href="#section-<?php echo slugify($term->name) ?>" title="<?php echo sprintf(__('Aller à la section %s', 'treize'), $term->name); ?>" class="archive__nav-item scroll-aware-link"><?php echo $term->name ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div id="scroll-aware-content" data-root-margin="-180px 0px 0px 0px">
                <?php foreach ($bibliographies_chunks as $section => $chunks) :
                    if (count($chunks['items']) > 0) : ?>
                        <div class="archive__index bibliographies__index" data-letter="<?php echo $section; ?>">
                            <div id="section-<?php echo slugify($section); ?>" class="row scroll-aware-section">
                                <div class="col-xxl-12">
                                    <?php foreach ($chunks['items'] as $item) : ?>
                                        <?php include(locate_template('components/partials/cards/bibliographies.php')) ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                <?php endif;
                endforeach; ?>
            </div>
            <?php include(locate_template('components/partials/archive/empty-message.php')); ?>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();
