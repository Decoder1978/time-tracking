<?php

//TO DO NOTES ABOUT THIS PAGE
// 1) I am not sterilizing my SQL insertions, and that is bad.
// 2) There should probably be some more graceful error handling.
// 3) Need to prevent user from changing type or comp after creating. This could be front-end only.


error_reporting(E_ALL); 
ini_set( 'display_errors','1');

$link = mysql_connect('localhost', 'hci', '556');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('hci', $link);

if ( isset($_GET['action'])) {
	$date = $_GET['date'];
	$username = $_GET['username'];
	
	if ($_GET['action'] == 'get') {
		if ( isset($_GET['id'])) {	//REQUESTING A PARTICULAR RECORD
			//TODO





		} else {					//REQUESTING ALL GOALS FOR DATE
			//TODO






		}
	} elseif ($_GET['action'] == 'update') {
		if ($goal->id == 0) { 		//SAVE OR UPDATE A RECORD
			//TODO
				
				
				
						
		} else {					//UPDATE AN EXISTING RECORD
			//TODO
	
	
	
	
	
		}

	} elseif ($_GET['action'] == 'getrange') {
									//GIVE ALL RECORDS FOR A WEEK / MONTH / WHATEVER
			//TODO
	
	} else {
		echo '{error: "Invalid action."}';
	}
	
} else {
	echo '{error: "No action provided."}';
}

mysql_close($link);

?>