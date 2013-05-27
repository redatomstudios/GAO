<?php

// header('Content-Type:application/x-javascript');

$JS_Dir = 'resources/js/straightedge/';		// Directory where the JS files are placed
$JSToInclude = array("slimbox2.js", "h2o.js");
echo '<script>';
foreach($JSToInclude as $JSFile) {
	if(file_exists($JS_Dir . $JSFile)) {
		echo '/* Reading from source file at ' . $JS_Dir . $JSFile . ' */
';
		readfile($JS_Dir . $JSFile);
	} else {
		echo '/* Reading from source file at ' . $JS_Dir . $JSFile . ' failed. */
';
	}
}
echo '</script>';
?>