<?php

$subtitle = $module['cta_subtitle'];
$title = $module['cta_title'];
$label = $module['cta_label'];
$destination = $module['cta_destination'];
$link = get_permalink($destination);

?>

<li>
    <a href="<?php echo $link; ?>">
        <h4><?php echo $subtitle; ?></h4>
        <h3><?php echo $title; ?></h3>
        <p><?php echo $label; ?></p>
    </a>
</li>
