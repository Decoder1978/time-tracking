<?php

//TO DO NOTES ABOUT THIS PAGE
// 1) I am not sterilizing my SQL insertions, and that is bad.
// 2) There should probably be some more graceful error handling.


error_reporting(E_ALL); 
ini_set( 'display_errors','1');

$link = mysql_connect('localhost', 'hci', '556');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('hci', $link);

if ( isset($_GET['action'])) {
	$username = $_GET['username'];
	if ($_GET['action'] == 'get') {
		$result = mysql_query("SELECT * FROM goals WHERE user='$username';");
		$rows = array();
		while($r = mysql_fetch_assoc($result)) {
			$rows[] = $r;
		}
		print json_encode($rows);
	} elseif ($_GET['action'] == 'update') {
		$json = $_POST['json'];
		$goal = json_decode($json);
		
		if ($goal->id == 0) {
			//SAVE A NEW GOAL
			$name = $goal->name;
			$type = $goal->type;
			$description = $goal->description;
			$value = $goal->value;
			$comp = $goal->comp;
			mysql_query("INSERT INTO goals (user, name, type, description, value, comp) "
						."VALUES ('$username', '$name', '$type', '$description', $value, '$comp');");
			$goal_id = mysql_insert_id();
			
			for ($i = 0; $i < count($goal->motivations); ++$i) {
				$text = $goal->motivations[$i]->text;
				mysql_query("INSERT INTO motivations (goal_id, text) VALUES ($goal_id, '$text');");
			}	
			echo "{success:true, id=$goal_id}";		
			
		} else {
			//UPDATE AN EXISTING GOAL
			$id = $goal->id;
			$name = $goal->name;
			$type = $goal->type;
			$description = $goal->description;
			$value = $goal->value;
			$comp = $goal->comp;
			mysql_query("INSERT INTO goals (user, name, type, description, value, comp) VALUES ('$username', '$name', '$type', '$description', $value, '$comp');");

			mysql_query("DELETE FROM motivations WHERE goal_id=$id;");
			for ($i = 0; $i < count($goal->motivations); ++$i) {
				$text = $goal->motivations[$i]->text;
				mysql_query("INSERT INTO motivations (goal_id, text) VALUES ($id, '$text');");
			}	
			
			echo "{success:true, id=$goal_id}";		
			
			
		}

	} elseif ($_GET['action'] == 'delete') {
		$id = $_GET['id'];
		$result = mysql_query("DELETE FROM goals WHERE id=$id;");
	} else {
		echo '[error: "Invalid action."]';
	}
	
} else {
	echo '[error: "No action provided."]';
}

mysql_close($link);

?>