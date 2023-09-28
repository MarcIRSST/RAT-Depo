<?php
$fields = get_fields($item->ID);
$long_description_class = [];
?>
<div class="archive-card glossary-card" id="<?php echo $item->post_name; ?>" data-search-term="<?php echo strtolower($item->post_title) ?>">
    <figure class="row">
        <figcaption class="glossary-card__term col-xxl-4 col-lg-3 col-md-12">
            <h3><?php echo $item->post_title; ?></h3>
        </figcaption>
        <?php if (strlen($fields['short_description']['short_description_content']) > 0) :
            $long_description_class[] = 'col-xxl-offset-4 col-lg-offset-3 col-md-offset-0'; ?>
            <div class="glossary-card__short wysiwyg col-xxl-8 col-lg-9 col-md-12 col-md-offset-0">
                <?php echo $fields['short_description']['short_description_content'] ?>
                <span class="glossary-card__source"><?php echo str_replace('/', '/<wbr>', $fields['short_description']['short_description_source']) ?></span>
            </div>
        <?php endif; ?>
        <?php if (strlen($fields['long_description']['long_description_content']) > 0) : ?>
            <div class="glossary-card__long col-xxl-8 col-lg-9 col-md-12 <?php echo join(' ', $long_description_class) ?>">
                <?php echo $fields['long_description']['long_description_content'] ?>
                <?php if (isset($fields['long_description']['long_description_source']) && strlen($fields['long_description']['long_description_source']) > 0) : ?>
                    <span class="glossary-card__source"><?php echo str_replace('/', '/<wbr>', $fields['long_description']['long_description_source']) ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </figure>
</div>
