<div class="modal modal--search" id="search-modal">
    <div class="modal__content">
        <a href="#<?php _e('fermer', 'treize') ?>" id="modal-close" title="<?php _e('Fermer la modale de recherche', 'treize') ?>" class="modal__close">
            <?php _e('Fermer', 'treize'); ?>
            <i><?php include(locate_template('assets/svg/close-icon.svg')); ?></i>
        </a>
        <?php get_search_form(true); ?>
    </div>
</div>
