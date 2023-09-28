<table data-table-type="<?php echo $type; ?>">
    <?php if ($table_content['has_headers']) : ?>
        <thead>
            <tr>
                <?php foreach ($table_content['headers'] as $header) :
                    $th_class = $header['is_centered'] ? 'cell-centered' : ''; ?>
                    <th class="<?php echo $th_class;  ?>"><?php echo $header['label']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
    <?php endif; ?>
    <tbody class="wysiwyg">
        <?php foreach ($table_content['rows'] as $row) :
            $row_class = $row['with_background'] ? 'with-background' : ''; ?>
            <tr class="<?php echo $row_class; ?>">
                <?php foreach ($row['data'] as $col) :
                    $cell_class = mb_strlen(trim(strip_tags($col))) === 1 ? 'single-char-cell' : ''; ?>
                    <td class="<?php echo $cell_class; ?>"><?php echo $col; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
