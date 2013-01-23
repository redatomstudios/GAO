
<html>
<body>
<?php
echo form_open_multipart();
echo "</br>Template Name" . form_input('templateName');
echo "</br>Template View" . form_upload(array('name' => 'templateView', 'id' => 'templateView'));
echo "</br>CMS View" . form_upload(array('name' => 'cmsView', 'id' => 'cmsView'));
echo "</br>Field Name 1" . form_input('fieldName[1]');
echo "</br>Field Type 1" . form_input('fieldType[1]');
echo "</br>Field Name 2" . form_input('fieldName[2]');
echo "</br>Field Type 2" . form_input('fieldType[2]');

echo "</br>" . form_submit('submit', 'Submit');
echo form_close();

?>

</body>
</html>