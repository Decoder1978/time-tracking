<?php



$link = mysql_connect('localhost', 'hci', '556');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('hci', $link);

if ( isset($_GET['action'])) {
	if ($_GET['action'] == 'get') {
		$username = $_GET['username'];
		$result = mysql_query("SELECT * FROM goals WHERE user='$username';");
		$rows = array();
		while($r = mysql_fetch_assoc($result)) {
			$rows['goal'][] = $r;
		}
		print json_encode($rows);
	} elseif ($_GET['action'] == 'update') {
		
		
	} elseif ($_GET['action'] == 'delete') {
		
		
	} else {
		echo '[error: "Invalid action."]';
	}
	
} else {
	echo '[error: "No action provided."]';
}

mysql_close($link);

?>