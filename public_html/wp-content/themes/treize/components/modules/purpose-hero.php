<?php
$context = get_field('purpose_hero_content');
$hero_title = get_field('purpose_hero_title');
$hero_title = $hero_title ? $hero_title : get_the_title();
?>
<section class="hero hero--purpose different-background">
    <div class="wrapper">
        <?php include(locate_template('components/partials/breadcrumbs.php')) ?>
        <div class="hero__text-content">
            <div class="row">
                <h1 class="col-xxl-12 col-xl-12"><?php echo $hero_title; ?></h1>
            </div>
            <div class="row">
                <div class="hero__arrow col-xxl-2 hidden-lg">
                    <a href="#<?php _e('prochaine-section', 'treize'); ?>" title="<?php _e('Passer à la prochaine section', 'treize') ?>" class="scroll-to-next-section">
                        <?php include(locate_template('assets/svg/big-arrow.svg')); ?>
                    </a>
                </div>
                <?php if ($context) : ?>
                    <div class="hero__context col-xxl-5 col-xxl-offset-6 col-xl-6 col-xl-offset-5 col-lg-12 col-lg-offset-0">
                        <!--<h2><?php _e('Mise en contexte', 'treize') ?></h2>-->
                        <div class="wysiwyg">
                            <?php echo apply_filters('the_content', $context) ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
