<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$export = new GJClasses\Export();

$export_file = $export->openFile('export_example', 'file_ending');

$row_contents = array('Column Heading 1', 'Column Heading 2');
$export->writeRow($export_file, $row_contents);

$row_contents = array('Row 1 - Data 1', 'Row 1 - Data 2');
$export->writeRow($export_file, $row_contents);

$row_contents = array('Row 2 - Data 1', 'Row 2 - Data 2');
$export->writeRow($export_file, $row_contents);

$export->closeFile($export_file);
