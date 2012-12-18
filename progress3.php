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
			<h1>Current Progress</h1>
			<a href="#" onclick="done()" data-role="button" data-icon="check" class="ui-btn-right">Done</a>
		</header>

		<section data-role="content" style="text-align: center;">
			<img src="./assets/img/plants/6.png" alt="weekly progress, version 3" style="width: 60%">
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
				<a href="progress2.php?username=<?php echo $username; ?>" data-role="button" rel="external" >This Week</a>
				<a href="progress.php?username=<?php echo $username; ?>"  data-role="button" rel="external"	>This Month</a-->
				<a href="#" data-theme="b"  data-role="button" rel="external"	>Rewards</a>
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
