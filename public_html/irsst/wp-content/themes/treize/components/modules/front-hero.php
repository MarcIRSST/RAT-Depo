<?php if ($title = get_field('hero_front_title')) :
    $left_col = get_field('hero_front_left_col');
    $right_col = get_field('hero_front_right_col'); ?>
    <section class="hero hero--front different-background">
        <div class="wrapper">
            <div class="hero__text-content">
                <div class="row hero__title">
                    <h1 class="col-xxl-8 col-lg-10"><?php echo $title ?></h1>
                </div>
                <div class="row">
                    <div class="hero__arrow col-xxl-2 hidden-lg">
                        <a href="#<?php _e('prochaine-section', 'treize'); ?>" title="<?php _e('Passer à la prochaine section', 'treize') ?>" class="scroll-to-next-section">
                            <?php include(locate_template('assets/svg/big-arrow.svg')); ?>
                        </a>
                    </div>
                    <?php if (count($left_col) > 0) : ?>
                        <figure class="col-xxl-3 col-xxl-offset-1 col-xlg-4 col-xlg-offset-0 col-lg-12">
                            <?php if ($subtitle = $left_col['hero_front_left_col_subtitle']) : ?>
                                <figcaption class="subtitle"><?php echo $subtitle; ?></figcaption>
                            <?php endif; ?>
                            <?php if ($content = $left_col['hero_front_left_col_content']) : ?>
                                <div class="wysiwyg">
                                    <?php echo apply_filters('the_content', $content); ?>
                                </div>
                            <?php endif; ?>
                        </figure>
                    <?php endif; ?>
                    <?php if (count($right_col) > 0) : ?>
                        <figure class="col-xxl-5 col-xxl-offset-1 col-xl-6 col-xl-offset-0 col-lg-12">
                            <?php if ($subtitle = $right_col['hero_front_right_col_subtitle']) : ?>
                                <figcaption class="subtitle"><?php echo $subtitle; ?></figcaption>
                            <?php endif; ?>
                            <?php if ($content = $right_col['hero_front_right_col_content']) : ?>
                                <div class="wysiwyg">
                                    <?php echo apply_filters('the_content', $content); ?>
                                </div>
                            <?php endif; ?>
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>