<?php $tooltip_slug = slugify($tooltip['title'] . '-' . $tooltip['ID']);  ?>
<span class="tooltip" data-src="#<?php echo $tooltip_slug; ?>">
    <span class="tooltip__caption"><?php echo $tooltip['text']; ?></span>
    <span class="tooltip__content" id="<?php echo $tooltip_slug ?>">
        <?php if ($tooltip['show_title']) : ?>
            <span class="tooltip__title">
                <strong><?php echo $tooltip['title']; ?></strong>
                <?php if ($tooltip['subtitle']) : ?>
                    <span class="tooltip__subtitle"><?php echo $tooltip['subtitle']; ?></span>
                <?php endif; ?>
            </span>
        <?php endif; ?>
        <span class="wysiwyg">
            <?php echo $tooltip['content']; ?>
        </span>
        <?php if ($tooltip['link_url']) : ?>
            <a href="<?php echo $tooltip['link_url'] ?>" class="tooltip__link"><?php echo isset($tooltip['link_label']) ? $tooltip['link_label'] : $tooltip['link_url'] ?></a>
        <?php endif; ?>
    </span>
</span>