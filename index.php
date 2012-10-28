<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Achieving Goals to Change Behaviors - CSE556 HCI, Fall 2012</title>
	<?php require_once('./assets/php/includes.php'); ?>
</head>
<body>
	<header data-role="header">
		<h1>
			Index
		</h1>
	</header>
	<section data-role="content">
			<input type="text" placeholder="Username" id="username"></input>
			<input type="button" id="login" value="Log In"></input>
	</section>
	<footer data-role="footer">
		<h1>
			2012		
		</h1>
	</footer>
</body>
<script>

	function submit() {
		window.location.replace('home.php?username='+$('#username').val());
	}
	$('#login').on('click', submit);
	$('#username').on('keypress', function(event) {
        if (event.keyCode == 13) { submit(); }
    });
    
</script>
</html>
