<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Achieving Goals to Change Behaviors - CSE556 HCI, Fall 2012</title>
	<?php require_once('./assets/php/includes.php'); ?>
	<style>
		li {
			position: relative;
			/*padding-left: 45px;*/
			height: 40px;
			min-height: 50px;
		}
		li.header {
			text-align: center;
			background: #444;
			color: #f0f0f0;
			text-shadow: none;
		}
		li.good {
			background: #dbe9b9;
		}
		li.bad {
			background: #fbdcdb;
		}
		li p.details {
			color: #666;
			font-size: normal;
		}
		li img.icon {
			height: 38px;
		}
		.image-holder {
			height: 38px;
			float: left;
			width: 55px;
			text-align: center;
			margin-right: 15px;
			padding-top: 6px;
		}
		
	</style>
</head>
<body>
	<div data-role="page">
		<header data-role="header" data-position="fixed">
			<h1>Current Progress</h1>
			<a href="#" onclick="done()" data-role="button" data-icon="check" class="ui-btn-right">Done</a>
		</header>

		<section data-role="content" style="text-align: center;">
			<img src="./assets/img/plants/10.png" alt="weekly progress, version 3" style="width: 60%">
			<ul data-role="listview" data-inset="true">
				<li class="header">
					<h2>Rewards</h2>
				</li>
				<li class="good">
					<div class="image-holder">
						<img class="icon" src="assets/img/rewards/butterfly1.png" />
					</div>
					<h1>Won a butterfly! (+2)</h1>
					<p class="details">Met 'Watch less TV' three (3) weeks in a row.</p>

				</li>
				<li class="bad">
					<div class="image-holder">
						<img class="icon" src="assets/img/rewards/beaver.png" />
					</div>
					<h1>Attacked by beaver. (-2)</h1>
					<p class="details">Skipped "Exercise" entirely for a week.</p>
				</li>
				<li class="good">
					<div class="image-holder">
						<img class="icon" src="assets/img/rewards/butterfly2.png" />
					</div>
					<h1>Won a butterfly! (+2)</h1>
					<p class="details">Met 'Exercise' three (3) weeks in a row.</p>

				</li>
				<li class="bad">
					<div class="image-holder">
						<img class="icon" src="assets/img/rewards/ant.png" />
					</div>
					<h1>Attacked by bugs. (-1)</h1>
					<p class="details">Didn't Read Books last week.</p>
				</li>
				<li class="good">
					<div class="image-holder">
						<img class="icon" src="assets/img/rewards/bucket.png" />
					</div>
					<h1>Won a waterbucket! (+2)</h1>
					<p class="details">Met all goals for one (1) week.</p>
				</li>
			</ul>
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
	
	$("li").css("min-height",50)

</script>

</html>
