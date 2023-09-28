<?php $anchors = get_anchor_navigation($flexible_content);
if (count($anchors) > 0) : ?>
    <div class="nav__anchor">
        <h2><?php _e('Dans cette page :', 'treize'); ?></h2>
        <ul>
            <?php foreach ($anchors as $anchor) : ?>
                <?php if (isset($anchor['main'])) : ?>
                    <li>
                        <a href="#<?php echo slugify($anchor['main']['id']) ?>" class="scroll-aware-link">
                            <span class="number"><?php echo $anchor['main']['number']; ?></span><?php echo $anchor['main']['label']; ?>
                        </a>
                        <?php if (isset($anchor['childs']) && count($anchor['childs']) > 0) : ?>
                            <ul>
                                <?php foreach ($anchor['childs'] as $child_anchor) : ?>
                                    <li>
                                        <a href="#<?php echo $child_anchor['id'] ?>" class="scroll-aware-link">
                                            <span class="number"><?php echo $child_anchor['number']; ?></span><?php echo $child_anchor['label']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="#<?php echo $anchor['id'] ?>" class="scroll-aware-link">
                            <span class="number"><?php echo $anchor['number']; ?></span><?php echo $anchor['label']; ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="nav__extra">
        <?php $bibliographie_anchor = get_field('bibliographie_anchor') ?>
        <a href="<?php echo get_post_type_archive_link('bibliographies') . '#' . $bibliographie_anchor; ?>"><?php _e('Bibliographie', 'treize'); ?></a>
        <a href="<?php echo get_post_type_archive_link('glossaries'); ?>"><?php _e('Glossaire', 'treize'); ?></a>
    </div>
    <div class="nav__arrows">
        <button class="scroll-aware-button" data-action="prev">
            <img src="<?php echo assets('svg/ext-arrow-white.svg') ?>" alt="<?php _e('Flèche vers le bas', 'treize') ?>">
        </button>
        <button class="scroll-aware-button" data-action="next">
            <img src="<?php echo assets('svg/ext-arrow-white.svg') ?>" alt="<?php _e('Flèche vers le haut', 'treize') ?>">
        </button>
    </div>
<?php endif; ?>
