<?php
$db = DevblocksPlatform::getDatabaseService();
$logger = DevblocksPlatform::getConsoleLog();
$tables = $db->metaTables();

// ===========================================================================
// example_object 

if(!isset($tables['example_object'])) {
	$sql = sprintf("
		CREATE TABLE IF NOT EXISTS example_object (
			id INT UNSIGNED NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) DEFAULT '',
			created INT UNSIGNED NOT NULL DEFAULT 0,
			PRIMARY KEY (id),
			INDEX created (created)
		) ENGINE=%s;
	", APP_DB_ENGINE);
	$db->ExecuteMaster($sql);

	$tables['example_object'] = 'example_object';
}

return TRUE;
