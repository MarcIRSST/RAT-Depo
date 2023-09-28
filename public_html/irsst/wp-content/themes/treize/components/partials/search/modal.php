<div class="modal modal--search" id="search-modal">
    <div class="modal__content">
      <div id="modal-close" title="<?php _e('Fermer la modale de recherche', 'treize') ?>" class="modal__close">
            <?php _e('Fermer', 'treize'); ?>
            <i><?php include(locate_template('assets/svg/close-icon.svg')); ?></i>
        </div>
        <!--<?php get_search_form(true); ?>-->
		<script async src="https://cse.google.com/cse.js?cx=2cf0728105456ab6b"></script>
		<div class="gcse-searchbox-only"></div>
    </div>
</div>