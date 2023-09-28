<div class="row for-whom-section__row wysiwyg">
    <?php if ($module['question']) : ?>
        <div class="col-xxl-2 col-lg-12 for-whom-section__row-subtitle">
            <p class="subtitle for-whom-section__question"><?php echo $module['question']; ?></p>
        </div>
    <?php endif; ?>
    <?php if ($module['answer']) : ?>
        <div class="col-xxl-6 col-lg-12 col-xxl-offset-1 col-lg-offset-0 for-whom-section__row-answer">
            <div class="for-whom-section__answer wysiwyg"><?php echo $module['answer']; ?></div>
        </div>
    <?php endif; ?>
</div>
