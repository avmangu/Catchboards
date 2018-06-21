<?php

include 'connect.php';

$action = $_GET['action'];

$user = $_GET['user'];

$my_id = $_SESSION['user_id'];

if($action == 'send'){
	
	mysql_query("INSERT INTO frnd_req VALUES('', '$my_id', '$user')");
	
}

if($action == 'cancel'){

	mysql_query("DELETE FROM `frnd_req` WHERE `from`='$my_id' AND `to`='$user'");

}

if($action == 'accept'){

	mysql_query("DELETE FROM `frnd_req` WHERE `from`='$user' AND `to`='$my_id'");
	
	mysql_query("INSERT INTO frnds VALUES('', '$user', '$my_id')");

}

if($action == 'unfrnd'){

	mysql_query("DELETE FROM frnds WHERE (user_one='$my_id' AND user_two='$user') OR (user_one='$user' AND user_two='$my_id')");

}

header('location: profile?user='.$user);

?>