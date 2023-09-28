<?php
$extra_class = '';

if (isset($generated)) {
    $extra_class = ' generated';
}
?>

<div class="card <?php echo $extra_class; ?>">
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?><span> - Annexe</span>
    </a>
</div>
