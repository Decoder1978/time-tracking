<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Achieving Goals to Change Behaviors - CSE556 HCI, Fall 2012</title>
	<?php require_once('./assets/php/includes.php'); ?>
</head>
<body>
	<div data-role="page">
		<header data-role="header" data-position="fixed">
			<h1>
				Weekly Progress
			</h1>
			<a href="#" onclick="done()" data-role="button" data-icon="check" class="ui-btn-right">Done</a>

		</header>
		<div class="ui-bar ui-bar-d" style="text-align: center" >
				<div data-role="controlgroup" data-type="horizontal" style="text-align: center">
					<a href="#" data-role="button" data-mini="true" data-icon="arrow-l" data-iconpos="notext" style=" height:50px; width:15%;"></a>
					<a  data-role="button" data-mini="true" style="height:50px; width:65%;" >
						<input class="collapsible-input" data-mini="true" type="date" value="2012-10-21 to 2012-10-27 to " style="margin-top: 2px;" />
					</a>
				<a href="#" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="notext" style=" height:50px; width:15%;"></a>	
				</div>
		</div>

		<section data-role="content">
			
			<aside id='message' data-theme='e'>
				When you're done viewing progress, click 'Done' above.
			</aside>

			<article id='progress' style="overflow-x: scroll;">
				<img src="./assets/img/progress3.png" alt="weekly progress, version 3" style="width: 800px">
			</article>
			
			</article>
			<p></p>
		</section>
		



		<footer data-role="footer" data-position="fixed">
			<p>&nbsp;</p>
		</footer>
	</div>
</body>

<script>

	function done() {
		window.location.replace('home.php?username=' + username);
	}

</script>

</html>
