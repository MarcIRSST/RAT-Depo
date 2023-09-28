<?php
$sections = $table['table_type_horizontal']['sections'];
foreach ($sections as $section) : ?>
    <div class="table__row wyiwsyg">
        <?php if ($section['section_title']) : ?>
            <div class="table__header">
                <?php echo $section['section_title']; ?>
            </div>
        <?php endif; ?>
        <?php foreach ($section['section_rows'] as $row) :
            $cell_class = $row['with_background'] ? 'with-background' : ''; ?>
            <div class="table__cell <?php echo $cell_class ?>">
                <?php echo $row['section_rows_content']; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
