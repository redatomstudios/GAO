<?php

$post = $_POST;
if(!(filter_var($post['email'], FILTER_VALIDATE_EMAIL))) {
		    echo "Invalid email address.";
}

if($post['email'] != $post['confirmEmail']){
	echo "Email mismatch";
}

if($post['password'] != $post['confirmPassword']){
	echo "Password mismatch";
}