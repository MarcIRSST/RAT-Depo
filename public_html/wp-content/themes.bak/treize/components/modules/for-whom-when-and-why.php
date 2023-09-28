<?php
$whom_section = $row['whom_section'];
$for_whom_label = $whom_section['for_whom_label'];
$for_whom = $whom_section['for_whom'];
$for_when_label = $whom_section['for_when_label'];
$for_when = $whom_section['for_when'];
$repeater = $whom_section['repeater'];
$anchor = $row['anchor_group']['anchor_id'];
?>

<section class="for-whom-section" id="<?php echo $anchor; ?>">
    <div class="wrapper">
        <?php if ($for_whom || $for_when) : ?>
            <div class="row for-whom-section__row">
                <?php if ($for_whom) : ?>
                    <div class=" col-xxl-2 col-lg-12 for-whom-section__row-left">
                        <p class="subtitle for-whom-section__subtitle"><?php echo $for_whom_label; ?></p>
                        <p class="big-text"><?php echo $for_whom; ?></p>
                    </div>
                <?php endif; ?>
                <?php if ($for_when) : ?>
                    <div class="col-xxl-6 col-lg-12 col-xxl-offset-1 col-lg-offset-0 for-whom-section__row-right">
                        <p class="subtitle for-whom-section__subtitle-right"><?php echo $for_when_label;  ?></p>
                        <p class="big-text"><?php echo $for_when; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ($repeater) {
            include_repeater('components/partials/for-whom-when-and-why-repeater.php', $repeater, false);
        } ?>
    </div>
</section>
