<?php
// TODO: Cleanup this file somehow
$object = get_queried_object();

if (get_page_template_slug() === 'template-faq.php') {
    $title = $module['faq_section_title'];
    $repeater = $module['faq_section_questions'];
} else {
    $faq = $row['faq__section'];
    $subtitle = $faq['faq_subtitle'];
    $title = $faq['faq_title'];
    $repeater = $faq['faq_questions'];
    $anchor = $row['anchor_group']['anchor_id'];
}
?>
<?php if (get_page_template_slug() !== 'template-faq.php') : ?>
    <section class="accordions-section" id="<?php echo $anchor; ?>">
        <div class="wrapper">
        <?php endif; ?>
        <div class="accordions-flex">
            <div class="wysi">
                <?php if (get_page_template_slug() !== 'template-faq.php' && $subtitle) : ?>
                    <div class="subtitle"><?php echo $subtitle; ?></div>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
            </div>
            <?php if ($repeater) : ?>
                <div class="accordions-container">
                    <?php include_repeater('components/partials/accordions.php', $repeater, false); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if (get_page_template_slug() !== 'template-faq.php') : ?>
        </div>
    </section>
<?php endif; ?>