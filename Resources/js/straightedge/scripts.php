<?php

// header('Content-Type:application/x-javascript');

$JS_Dir = 'resources/js/straightedge/';		// Directory where the JS files are placed
$JSToInclude = array("jquery.ui.widget.js", "tmpl.min.js", "load-image.min.js", "canvas-to-blob.min.js", "bootstrap.min.js", "bootstrap-image-gallery.min.js", "jquery.iframe-transport.js", "jquery.fileupload.js", "jquery.fileupload-process.js", "jquery.fileupload-resize.js", "jquery.fileupload-validate.js", "jquery.fileupload-ui.js", "main.js", "jquery.xdr-transport.js", "slimbox2.js", "jquery.nyroModal.custom.min.js", "h2o.js");
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