<?php
$subject_table = $table['table_type_subject'];
// get the headers set on the first subjects for header purpose
$headers = get_clean_table_content($subject_table['subjects'][0]);
$has_subject = $subject_table['has_subject'];
?>
<table data-table-type="subject">
    <?php if ($headers['has_headers']) : ?>
        <thead>
            <tr>
                <?php if ($has_subject) : ?>
                    <th><?php echo $subject_table['subject_header'] ?></th>
                <?php endif; ?>
                <?php foreach ($headers['headers'] as $header) :
                    $header_class = $header['is_centered'] ? 'cell-centered' : ''; ?>
                    <th class="<?php echo $header_class;  ?>"><?php echo $header['label']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
    <?php endif; ?>
    <tbody>
        <?php foreach ($subject_table['subjects'] as $subject) : ?>
            <?php $subject_content = get_clean_table_content($subject); ?>
            <?php foreach ($subject_content['rows'] as $i => $row) :
                $row_class = $i === count($subject_content['rows']) - 1 ? 'subject-last-row' : '';
                $row_class .= $row['with_background'] ? ' with-background' : ''; ?>
                <tr class="<?php echo $row_class; ?>">
                    <?php if ($i === 0) :
                        if ($has_subject) : ?>
                            <td rowspan="<?php echo count($subject_content['rows']); ?>" class="subject-cell"><?php echo $subject['subject_content'];  ?></td>
                    <?php endif;
                    endif; ?>
                    <?php foreach ($row['data'] as $col) :
                        $cell_class = mb_strlen(trim(strip_tags($col))) === 1 ? 'single-char-cell' : ''; ?>
                        <td class="<?php echo $cell_class; ?>"><?php echo $col; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
