<?php

/**
 * Glossaries archive page
 */
get_header();
/** @var wp_query $wp_query WP Query */
global $wp_query;
$object = get_queried_object();
$number_of_posts = wp_count_posts($object->name)->publish;
$alphabet = range('a', 'z');
$glossaries = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'glossaries'
));
$glossaries_chunks = array();

function split_by_first_letter(&$post, $key, $letter)
{
    global $glossaries_chunks;
    $first_char = $post->post_title[0];

    if ($first_char === $letter || $first_char === strtoupper($letter)) {
        $glossaries_chunks[$letter][$key] = $post;
    }
}

foreach ($alphabet as $letter) {
    array_walk($glossaries, 'split_by_first_letter', $letter);
}

foreach ($glossaries_chunks as $letter => $items) {
    usort($glossaries_chunks[$letter], function ($a, $b) {
        return strcmp($a->post_name, $b->post_name);
    });
}

?>
<div id="primary">
    <main id="main" class="site-main archive archive--glossaries" role="main">
        <?php
        $hero_title = '<h1>' . $object->label . '<span class="glossaries-counter">(' . $number_of_posts . ')</span></h1>';
        $has_search = true;
        include(locate_template('components/partials/archive/hero.php'));
        ?>
        <?php if ($content = get_field('glossaries_archive_content', 'option')) : ?>
            <section class="archive-context wrapper">
                <div class="row">
                    <div class="wysiwyg col-xxl-5 col-xxl-offset-6 col-lg-12 col-lg-offset-0">
                        <?php echo apply_filters('the_content', $content); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <section class="archive glossaries wrapper" style="--nav-min-width: calc(72px * <?php echo count($alphabet); ?> )">
            <div class="archive__nav" id="scroll-aware-navigation">
                <div class="archive__nav-wrapper">
                    <div class="archive__nav-list">
                        <?php foreach ($alphabet as $letter) :
                            $item_class = isset($glossaries_chunks[$letter]) ? '' : 'archive__nav-item--empty';
                        ?>
                            <a href="#lettre-<?php echo $letter ?>" title="<?php echo sprintf(__('Aller à la lettre %s', 'treize'), strtoupper($letter)); ?>" class="archive__nav-item scroll-aware-link <?php echo $item_class ?>"><?php echo $letter ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div id="scroll-aware-content" data-root-margin="-180px 0px 0px 0px">
                <?php foreach ($glossaries_chunks as $letter => $items) : ?>
                    <div class="archive__index glossaries__index" data-letter="<?php echo $letter; ?>">
                        <div id="lettre-<?php echo $letter; ?>" class="row scroll-aware-section">
                            <div class="letter col-xxl-2 col-lg-12">
                                <h2><?php echo $letter ?></h2>
                            </div>
                            <div class="col-xxl-10 col-lg-12">
                                <?php foreach ($items as $item) : ?>
                                    <?php include(locate_template('components/partials/cards/glossaries.php')) ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php include(locate_template('components/partials/archive/empty-message.php')); ?>
        </section>
        <?php if ($content = get_field('glossaries_archive_footer', 'option')) : ?>
            <section class="archive-footer wrapper">
                <div class="row">
                    <div class="wysiwyg col-xxl-12">
                        <?php echo apply_filters('the_content', $content); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();
