<?php
$question = $module['faq_questions_questions'];
$answer = $module['faq_questions_answer'];
?>
<div id="<?php echo $theme; ?>" class="accordion">
    <div class="container">
        <?php if ($question) : ?>
            <div class="title trigger">
                <h4 class="question"><?php echo $question; ?></h4>
                <div class="control"></div>
            </div>
        <?php endif; ?>
        <?php if ($answer) : ?>
            <div class="content wysiwyg"><?php echo $answer; ?></div>
        <?php endif; ?>
    </div>
</div>