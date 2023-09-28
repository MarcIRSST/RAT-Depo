<?php
if (function_exists('get_field')) {
	$flexible = get_field('modules', $object);

	if ($flexible) {
		foreach ($flexible as $row_index => $row) {
			//Setup Options
			$layout = $row['acf_fc_layout'];
			$option = '';
			include(locate_template('components/modules/' . $layout . '.php', false, false));
		}
	}
}
