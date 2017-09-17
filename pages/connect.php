<?php
$db = new mysqli('localhost', 'root', '', 'webshop_db');

if($db->connect_errno) {
	echo $db->connect_error;
}