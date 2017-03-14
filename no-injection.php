<?php 
/* 
Plugin Name: No Injection
Plugin URI: http://aming.id
Description: Sorry you can't inject SQL
Author URI: http://aming.id/
Author: I hack the code inc.,
Version: 2.0.2
*/
global $user_ID; if($user_ID) {
	if(!current_user_can('level_10')) {
		if (strlen($_SERVER['REQUEST_URI']) > 255 || 
			stripos($_SERVER['REQUEST_URI'], "eval(") || 
			stripos($_SERVER['REQUEST_URI'], "CONCAT") || 
			stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") || 
			stripos($_SERVER['REQUEST_URI'], "base64")) {
				echo "Sorry, can't inject!";
				@header("HTTP/1.1 414 Request-URI Too Long");
				@header("Status: 414 Request-URI Too Long");
				@header("Connection: Close");
				@exit;
		}
	}
} ?>