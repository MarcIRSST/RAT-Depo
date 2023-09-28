<?php
$fields = get_fields($item->ID);


if (isset($fields['sources']) && $fields['sources'] && count($fields['sources']) > 0) :

    $search_terms = strtolower($item->post_title);

    foreach ($fields['sources'] as $source) {
        $search_terms .= ' ' . strtolower(wp_strip_all_tags($source['source_content']));
    }
?>
    <div class="archive-card bibliographies-card" data-search-term="<?php echo $search_terms; ?>">
        <div class="row">
            <div class="bibliographies-card__title col-xxl-3 col-md-12">
                <h3 class="row">
                    <span class="col-xxl-2 col-md-12"><?php echo $fields['sub_number']; ?></span>
                    <b class="col-xxl-8 col-md-12"><?php echo $item->post_title; ?></b>
                </h3>
            </div>
            <ul class="bibliographies-card__list col-xxl-9 col-md-12">
                <?php foreach ($fields['sources'] as $source) :
                    $anchor = isset($source['anchor']) ? 'id="' . $source['anchor'] . '"' : ''; ?>
                    <li <?php echo $anchor; ?> class="wysiwyg">
                        <?php if (isset($source['source_content']) && $source['source_content']) : ?>
                            <?php echo apply_filters('the_content', $source['source_content']); ?>
                        <?php endif; ?>
                        <?php if ($source['source_link']) : ?>
                            <a href="<?php echo $source['source_link'] ?>" target="_blank">
                                <span class="source-link"><?php echo str_replace('/', '/<wbr>', $source['source_link']); ?></span>
                                <span class="link-arrow">
                                    <img src="<?php echo assets('svg/small-arrow-white.svg') ?>" alt="">
                                </span>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
