<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Achieving Goals to Change Behaviors - CSE556 HCI, Fall 2012</title>
	<?php require_once('./assets/php/includes.php'); ?>
	<style>
		table {
			margin-top: 15px;
			font-size: 1.4em;
			width: 100%;
			border-collapse: collapse;
			-moz-box-shadow: 0 1px 4px rgba(0,0,0,.3);
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, .3);
			box-shadow: 0 1px 4px rgba(0, 0, 0, .3);
		}
		table td {padding: 10px; text-align: center; border: 1px solid #CCC;}
		table tr td {white-space: nowrap;}
		table tr:first-child {font-weight: bold; background: inherit; }
		tr.bad {background: #fbdcdb;}
		tr {background: #dbe9b9;}
	</style>
</head>
<body>
	<div data-role="page">
		<header data-role="header" data-position="fixed">
			<h1>Weekly Progress</h1>
			<a href="#" onclick="done()" data-role="button" data-icon="check" class="ui-btn-right">Done</a>
		</header>

		<section data-role="content">
			<img src="./assets/img/plants/6.png" alt="weekly progress, version 3" style="width: 100%">
			<table>
				<tbody>
					<tr>
						<td>Rewards</td>
					</tr>
					<tr>
						<td>Won a butterfly</td>
					</tr>
					<tr class="bad">
						<td>Attacked by a beaver</td>
					</tr>
					<tr class="bad">
						<td>Attacked by bugs</td>
					</tr>
					<tr>
						<td>Won a waterbucket</td>
					</tr>
				</tbody>
			</table>
		</section>

		<footer data-role="footer" data-position="fixed" style="text-align: center;">
			<div data-role="controlgroup" data-type="horizontal">
				<a href="progress.php?username=<?php echo $username; ?>"  data-role="button" data-transition="flip" rel="external"	>Data</a>
				<a href="progress2.php?username=<?php echo $username; ?>" data-role="button" data-transition="flip"	rel="external"	>Graph</a>
				<a href="#" 											  data-role="button" data-transition="flip" data-theme="b"	>Tree1</a>
				<a href="progress4.php?username=<?php echo $username; ?>" data-role="button" data-transition="flip"					>Tree2</a>
			</div>
		</footer>
	</div>
</body>

<script>

	function done() {
		window.location.replace('home.php?username=' + username);
	}

</script>

</html>
