<?php

header('Content-Type:application/x-javascript');

$JS_Dir = './js/';		// Directory where the JS files are placed
$JSToInclude = array('jquery.1.9.0.min.js');


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


?>