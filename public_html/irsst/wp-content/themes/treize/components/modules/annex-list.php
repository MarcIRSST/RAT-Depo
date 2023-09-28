<?php
$annex_section = $row['annex_list_section'];
$title = $annex_section['title'];
$repeater = $annex_section['repeater'];
$anchor = $row['anchor_group']['anchor_id'];
?>
<section class="annex-list" id="<?php echo $anchor; ?>">
    <div class="wrapper">
        <div class="annex-list__title col-xxl-5 col-lg-12">
            <h2 class="looks-h1"><?php echo $title; ?></h2>
        </div>
        <div class="annex-list__repeater col-xxl-7 col-lg-12 col-xxl-offset-5 col-lg-offset-0">
            <?php include_repeater('components/partials/annex.php', $repeater, false); ?>
        </div>
    </div>
</section>
