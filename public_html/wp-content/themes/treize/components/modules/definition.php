<?php
$definition_section = $row['definition_section'];
$anchor = $row['anchor_group']['anchor_id'];

$section_classes = '';
if ($definition_section['choice']) {
    $section_classes .= ' background-color';
}
?>

<section class="definition <?php echo $section_classes; ?>" id="<?php echo $anchor; ?>">
    <div class="wrapper">
        <div class="row">
            <?php if ($definition_section['subtitle']) : ?>
                <div class="col-xxl-1 col-md-3 col-md-6">
                    <p class="subtitle"><?php echo $definition_section['subtitle']; ?></p>
                </div>
            <?php endif; ?>
            <div class="col-xxl-7 col-xxl-offset-1 col-lg-10 col-md-12 col-md-offset-0">
                <?php if ($definition_section['definition_group']['title']) : ?>
                    <h2><?php echo $definition_section['definition_group']['title']; ?></h2>
                <?php endif; ?>
                <?php if ($definition_section['definition_group']['link']['url'] && $definition_section['definition_group']['link']['title']) : ?>
                    <a href="<?php echo $definition_section['definition_group']['link']['url']; ?>" class="cta--main"><?php echo $definition_section['definition_group']['link']['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
