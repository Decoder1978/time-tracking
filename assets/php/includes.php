<! VIEWPORT SETUP >
<!meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta content="width=device-width, minimum-scale=1, maximum-scale=1" name="viewport">

<! CSS STYLING >
<link rel='stylesheet' href='./assets/css/reset.css' />
<link rel='stylesheet' href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
<link rel='stylesheet' href='./assets/css/style.css' />

<! JAVASCRIPT >
<script src='http://code.jquery.com/jquery-1.8.2.min.js'></script>
<script src='http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js'></script>
<script src='./assets/js/handlebars-1.0.rc.1.js'></script>
<script src='./assets/js/global_scripts.js'></script>
<script>
	<?php 
		$username = "";
		if (isset($_GET['username'])) {
			echo 'var username = "'.$_GET['username'].'";'; 
			$username = $_GET['username'];
		} else {
			echo 'var username = "";';
		}
	?>
</script>