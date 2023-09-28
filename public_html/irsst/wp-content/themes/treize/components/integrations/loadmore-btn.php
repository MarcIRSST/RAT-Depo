<?php if (count($the_posts) > $args['initial_posts_number']) : ?>
    <div id="loadmore">
        <div class="spinner-container">
            <?php include(locate_template('assets/svg/spinner.svg', false, false)); ?>
        </div>
        <?php if ($add_button) : ?>
            <div class="flex-center">
                <div id="load-more-btn" class="cta--main" data-path="<?php echo $card_path ?>">
                    <span><?php echo $btn_load_more_label; ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
