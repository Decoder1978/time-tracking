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
				<div data-role="controlgroup" data-type="horizontal" style="text-align: center">
					<a href="#" onclick="previousDate()" data-role="button" data-mini="true" data-icon="arrow-l" data-iconpos="notext" style=" height:50px; width:15%;"></a>
					<a  data-role="button" data-mini="true" style="height:50px; width:65%;" >
						<input class="collapsible-input" data-mini="true" type="date" value="" id="date" style="margin-top: 2px;" />
					</a>
				<a href="#" onclick="nextDate()" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="notext" style=" height:50px; width:15%;"></a>	
				</div>
		</div>
		
		<section data-role="content">
			
			<div id='message'>
			</div>
			<ul data-role="collapsible-set" data-iconpos="right"   data-collapsed-icon='arrow-r'  data-expanded-icon='arrow-d' id='goals'>

			</ul>
			<br><hr /><br>
			<a href="#" onclick="progress()" data-role="button" data-iconpos="right"  data-icon='arrow-r' data-theme="b">
				<span style='float:left'>Show Progress</span>
				<span style='float:right'>2012-10-21 to 2012-10-27</span>
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
	 			<fieldset>
	 		 		<!--label for="checkbox-{{id}}" class="collapsible-input" style="float: left; width: 299px;">
			 			<input 	type="checkbox" name="checkbox-{{id}}" data-goal-id="{{id}}" style="width: 100px"
			 					id="value-{{id}}" class="collapsible-input record-value" />
			 			Done
	 		 		</label-->	
	 		 		<div id="check-container-{{id}}"></div>		 			
			 	</fieldset>
		 		<h4 style="padding: 10px 0px 0px 10px; float:right; font-weight: bold; font-size: 1.3em">{{name}}</h4>
		 	</div>
		 	</h3>
		 {{else}}
		 	<h3>
		 		<div data-role='controlgroup' data-type='horizontal' class='goal-row'>
			 		<input class="collapsible-input record-value" type="number" pattern='[0-9]*' 
			 			style="width: 50px; float: left" value='0' 
			 			id='value-{{id}}' data-goal-id='{{id}}' />
			 		<h4 style="padding: 19px 0px 0px 10px; float:left;" > Goal: {{value}} hrs</h4>
			 		<h4 style="padding: 17px 0px 0px 10px; float:right; font-weight: bold; font-size: 1.3em">{{name}}</h4>
			 	</div>
		 	</h3>
		 {{/if}}
		{{#if daily}}
		 		<fieldset data-role="controlgroup" id="check-item-{{id}}"  >
			 		<label for="checkbox-{{id}}" style="width: 50px">
			 			<input type="checkbox" name="checkbox-{{id}}" id="value-{{id}}" class="collapsible-input record-value" />
			 			&nbsp;
			 		</label>
			 	</fieldset>
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
	//////////////////////////////////////////////////////////// JS VARIABLES
	<?php
		if ( ! isset($_GET['date'])) {
			date_default_timezone_set('CST'); 
			echo "var date = '".date("Y-m-d")."';";
		} else {
			echo "var date = '".$_GET['date']."';";
		}
	?>
	
	var goals = null;
	var records = null;
	
	//////////////////////////////////////////////////////////// AJAX CALLS TO SERVER
	
	function loadGoals() {
		jQuery.getJSON('./assets/php/goals.php?action=get&username='+username, function success(data) {
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
			$('.record-value').on('click', function(e) { updateRecord($(this)); });
		});
	}
	
	function loadRecords() {
		jQuery.getJSON('./assets/php/records.php?action=get&username='+username+'&date='+date, function success(data) {
			records = data;
			recordMap = {};
			for (var i = 0; i < records.length; ++i) {
				recordMap[records[i].goal_id] = records[i].value;
			}
			for (var i = 0; i < goals.length; ++i) {
				if (recordMap[goals[i].id] || recordMap[goals[i].id] == 0) {
					$("#value-"+goals[i].id).attr("value", recordMap[goals[i].id]);
				} else {
					$("#value-"+goals[i].id).attr("value", 0);
				}
			}
		});
	}
	
	function updateRecord(record) {
		var value = $('#value-'+record.data('goal-id')).val();
		$.ajax({
            type: "GET",
            url: "./assets/php/records.php?action=update&username="+username
            	 +"&id="+record.data('goal-id')+"&value="+value+"&date="+date
        });
	}
	
	//////////////////////////////////////////////////////////// PAGE NAVIGATION
	
	function edit() {
		window.location.replace('edit.php?username=' + username);
	}
	function progress() {
		window.location.replace('progress.php?username=' + username);
	}
	
	//////////////////////////////////////////////////////////// DATE NAVIGATION
	
	function setDate(newDate) {
		date = newDate;
		$('#date').attr('value', date);
		$("#goals").hide(200);
		loadRecords();
		$("#goals").show(200);
	}
	
	function nextDate() {
		var d = new Date(date + " CST");
		d.setDate( d.getDate() + 1);
		var year = d.getFullYear();
		var month = ("0" + (d.getMonth()+1)).slice(-2);
		var day = ("0" + d.getDate()).slice(-2);
		var newDate = year+"-"+month+"-"+day;
		setDate(newDate);
	}
	
	function previousDate() {
		var d = new Date(date + " CST");
		d.setDate( d.getDate() - 1);
		var year = d.getFullYear();
		var month = ("0" + (d.getMonth()+1)).slice(-2);
		var day = ("0" + d.getDate()).slice(-2);
		var newDate = year+"-"+month+"-"+day;
		setDate(newDate);
	}
	
	//////////////////////////////////////////////////////////// INITIALIZATION
	loadGoals();
	setDate(date);
	
	$("#date").on("change", function () {
		setDate($(this).val());
	});
	
</script>
</html>
