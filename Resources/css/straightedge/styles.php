<?php

// header('Content-Type:text/css; charset=utf-8');

$CSS_Dir = "resources/css/" . $templateName . '/';	// Directory where the CSS files are placed
$CSSToInclude = array("reset.css", "general.css", "header.css", "slider.css", "content.css", "footer.css", "nyroModal.css");

foreach($CSSToInclude as $CSSFile) {
	if(file_exists($CSS_Dir . $CSSFile)) {
		echo '/* Reading from source file at ' . $CSS_Dir . $CSSFile . ' */
';
		readfile($CSS_Dir . $CSSFile);
	} else {
		echo '/* Reading from source file at ' . $CSS_Dir . $CSSFile . ' failed. */
';
	}
}

?>