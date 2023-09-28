<div class="wrapper summary__content">
    <div class="row">
        <?php if ($module['summary_info_title']) : ?>
            <div class="col-xxl-3 col-xxl-offset-3 col-xlg-4 col-xlg-offset-2 col-lg-offset-0 col-lg-12">
                <h2><?php echo $module['summary_info_title']; ?></h2>
            </div>
        <?php endif; ?>
        <?php if ($module['summary_info_wysiwyg']) : ?>
            <div class="col-xxl-5 col-xxl-offset-1 col-xlg-5 col-lg-12 col-lg-offset-0">
                <div class="wysiwyg"><?php echo $module['summary_info_wysiwyg']; ?></div>
            </div>
        <?php endif; ?>
    </div>
</div>
