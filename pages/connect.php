<?php
$db = new mysqli('localhost', 'dbUser', 'Goodpassword666', 'webshop_db');

if($db->connect_errno) {
	echo $db->connect_error;
}