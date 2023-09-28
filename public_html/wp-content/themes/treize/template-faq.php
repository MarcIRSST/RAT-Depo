<?php

/**
 * Template Name: FAQ
 *
 * @package TREIZE
 */

get_header();
$faq_sections = get_field('faq_sections');
$faq_title = get_field('faq_title');
$theme = get_field('page_theme', get_queried_object_id());
$section_classes = '';
if ($theme) {
    $section_classes .= ' theme-' . $theme;
} else {
    $section_classes .= ' theme-neutral';
}
?>

<div id="primary">
    <main id="main" role="main">
        <section class="faq-section <?php echo $section_classes; ?>">
            <div class="wrapper">
                <?php if ($faq_title) : ?>
                    <h1><?php echo $faq_title; ?></h1>
                <?php endif; ?>
                <?php if ($faq_sections) : ?>
                    <?php include_repeater('components/modules/faq.php', $faq_sections, false); ?>
                <?php endif; ?>
            </div>
        </section>
    </main>
</div>

<?php get_footer();
