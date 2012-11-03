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
			<a href="index.php" data-role="button" rel="external">Log Out</a>
			<h1>
				Goals
			</h1>
		</header>
		<div class="ui-bar ui-bar-d" style="text-align: center" >
				<div data-role="controlgroup" data-type="horizontal">
				<a href="#" data-role="button" data-mini="true" data-icon="arrow-l" data-iconpos="notext" style="float: left"></a>
					<a href="#" data-role="button" data-mini="true" data-icon="grid" data-iconpos="right" style="padding:3px 5px 3px 0 ;"><h1>Monday 10/08</h1></a>
				<a href="#" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="notext" style="float: right"></a>	
				</div>
		</div>
		
		<section data-role="content">
			
			<div id='message'>
			</div>
			<ul data-role="collapsible-set" data-iconpos="right"   data-collapsed-icon='arrow-r'  data-expanded-icon='arrow-d' id='goals'>

			</ul>
			<br><hr /><br>
			<a href="./progress.php" data-role="button" data-iconpos="right"  data-icon='arrow-r' data-theme="b">
				<span style='float: left'>Weekly Progress</span>
				<span style='float:right'>Oct 1-8</span>
			</a>
		</section>
		<footer data-role="footer" class="ui-bar">
			<a href="#" onclick="edit()" data-role="button" style="float: right">Edit</a>
		</footer>
	</div>
</body>
<script id='goal-template' type='text/x-handlebars-template'>
	<li class='goal' data-role="collapsible" data-collapsed="true" data-mini="true">
		
		 {{#if daily}}
		 	<h3>
		 	<div data-role='controlgroup' data-type='horizontal' class='goal-row'>
		 		<label class='collapsible-input'>
		 			<input type="checkbox" value="checked" style='margin-left: -15px' class='collapsible-input' />
		 			Done
		 		</label>
		 		<h4 style="padding: 10px 0px 0px 10px; float:right; font-weight: bold; font-size: 1.3em">{{name}}</h4>
		 	</div>
		 	</h3>
		 {{else}}
		 	<h3>
		 		<div data-role='controlgroup' data-type='horizontal' class='goal-row'>
			 		<input class="collapsible-input" type="number" pattern='[0-9]*' style="width: 50px; float: left" value='{{value}}' id='value-{{id}}'/>
			 		<h4 style="padding: 19px 0px 0px 10px; float:left;" > Goal: {{value}} hrs</h4>
			 		<h4 style="padding: 17px 0px 0px 10px; float:right; font-weight: bold; font-size: 1.3em">{{name}}</h4>
			 	</div>
		 	</h3>
		 {{/if}}
		<h1 style='font-weight: bold; font-size: 1.2em;' >Description:</h1>
		<ul data-role='listview' data-inset='true'>
		<li>{{description}}</li>
		</ul>
		<h1 style='font-weight: bold; font-size: 1.2em;' >Motivations:</h1>
		<ul data-role='listview' data-inset='true'>
			{{#each motivations}}
			<li>{{this.text}}</li>
			{{/each}}
		</ul>
	</li>
</script>
<script>
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
			data[i].value = parseInt(data[i].value);
			
			items += template(data[i]);
			goals = data;
		}
		$("#goals").append(items);
		$("#goals").trigger('create');
		$('.collapsible-input').on("click", function(e) { e.stopPropagation(); });
		$('.checkbox').on("click", function(e) { e.stopPropagation(); });
		$('.goal-row .ui-controlgroup-controls').css('width', '100%');
	});
	
	function edit() {
		window.location.replace('edit.php?username=' + username);
	}
</script>
</html>
