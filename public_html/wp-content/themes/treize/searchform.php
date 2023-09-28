<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label class="search-form__input">
        <span class="visually-hidden"><?php echo _x('Rechercher pour:', 'label') ?></span>
        <input type="search" placeholder="<?php echo esc_attr_x('Entrer un terme, un sujet ou autre…', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Rechercher pour:', 'label') ?>" />
    </label>
    <button type="submit" class="search-form__button">
        <span class="visually-hidden"><?php _e('Lancer la recherche', 'treize'); ?></span>
        <span class="search-form__icon">
            <?php include(locate_template('assets/svg/big-search-icon.svg')); ?>
        </span>
    </button>
</form>
