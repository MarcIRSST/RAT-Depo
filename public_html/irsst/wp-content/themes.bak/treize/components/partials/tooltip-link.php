<?php $tooltip_slug = slugify($tooltip['title'] . '-' . $tooltip['ID']);  ?>
<?php if ($tooltip['link_url']) : ?>
    <a href="<?php echo $tooltip['link_url'] ?>" class="tooltip__caption"><?php echo $tooltip['text']; ?></a>
<?php endif; ?>
