<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Achieving Goals to Change Behaviors - CSE556 HCI, Fall 2012</title>
	<?php require_once('./assets/php/includes.php'); ?>
</head>
<body>
	<div data-role="page">
		<header data-role="header">
			<a href="index.php" data-role="button" data-icon="gear" data-iconpos="notext" rel="external"p></a>
			<h1>
				Goals
			</h1>
		</header>
		<section data-role="content">
			<div id='message'>
			</div>
			<ul data-role="collapsible-set" data-iconpos="right"   data-collapsed-icon='arrow-r'  data-expanded-icon='arrow-d' id='goals'>

			</ul>
			<br><hr /><br>
			<a href="./progress.php" data-role="button" data-iconpos="right"  data-icon='arrow-r' data-theme="b"><span style='float: left'>Weekly Progress</span><span style='float:right'>Oct 1-8</span></a>
		</section>
		<footer data-role="footer" class="ui-bar">
			<span>home.php</span>
			<a href="edit.php" data-role="button" data-icon="plus" style='float: right'>Edit</a>
		</footer>
	</div>
</body>
<script id='goal-template' type='text/x-handlebars-template'>
	<li class='goal' data-role="collapsible" data-collapsed="true">
		
		 {{#if daily}}
		 	<h3>
		 		{{#if completed}}
		 			X<!-- clearly this needs to be an icon or something. -->
		 		{{/if}}
		 		<span style='float: right'>{{name}}</span>
		 	</h3>
		 	<label><input type="checkbox" value="{{completed}}" style='margin-left: -15px' />Done</label>
		 {{else}}
		 	<h3>
		 		<span>0.00/{{value}} hr</span>
		 		<span style='float: right'>{{name}}</span>
		 	</h3>
		 	<input type='number' pattern='[0-9]*' value='{{value}}'></input>
		 {{/if}}
		<p>{{description}}</p>
	</li>
</script>
<script>
	var username = '<?php echo $_GET['username']; ?>';
	var goals = null;
	jQuery.getJSON('./assets/php/goals.php?action=get&username=' + username, function success(data) {
		if (data.length == 0) {
			$("#message").html("<h3>You don't have any goals! Click 'EDIT' below to add some.</h3>");
			return;
		}
		template = Handlebars.compile($("#goal-template").text());
		var items = '';
		for (var i = 0; i < data.length; ++i) {
			if ( data[i]['type'] == 'DAILY' ) {
				data[i]['daily'] = true;
				data[i]['completed'] = data[i]['value'] > 0;
			}
			
			items += template(data[i]);
			goals = data;
		}
		$("#goals").append(items);
		$("#goals").trigger('create');
		$('.checkbox').on("click", function(e) { e.stopPropagation(); });
	});
</script>
</html>