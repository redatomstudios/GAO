<html>
<body>
<div>
<?php
echo form_open('/page/contactus');

echo $cap;
echo form_input(array('name' => 'captcha', 'id' => 'captcha', 'placeholder' => 'Enter CAPTCHA', 'style' => 'width: 45%; float: left;'));
echo form_submit('submission','Submit');
form_close();
 ?>
</div>
</body>
</html>