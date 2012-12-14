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
			
			<a href="#" onclick="progress()" data-role="button" data-iconpos="right"  data-icon='arrow-r' data-theme="b">
				<span style='float:left'>This Week's Progress</span>
				<span style='float:right'></span>
			</a>
			
			<br><hr /><br>
			
			<div id='message-container' class='ui-bar-e' style='height: 110px; width: 250px; padding: 0px 20px 0px 20px;'>
				<h1 id='message' style="font-size: large"></h1>
			</div>
			<ul data-role="collapsible-set" data-iconpos="right"   data-collapsed-icon='arrow-r'  data-expanded-icon='arrow-d' id='goals'>

			</ul>


		</section>
		<footer data-role="footer" class="ui-bar" data-position="fixed">
			<a href="#" onclick="edit()" data-role="button" style="float: right; margin-right:20px;">Edit</a>
		</footer>
	</div>
</body>
<script id='goal-template' type='text/x-handlebars-template'>
	<li class='goal' data-role="collapsible" data-collapsed="true" data-mini="true">
		
		 {{#if daily}}
		 	<h3 >
		 	<div  data-role='controlgroup' data-type='horizontal' class='goal-row'>	
	 			<fieldset>
	 		 		<div id="check-container-{{id}}" style="height:42px;"></div>		 			
			 	</fieldset>
		 		<h4 style="padding: 0px 0px 0px 10px; margin-top: -20px; position: absolute; right: 0px; color: #888;" >
			 		{{label}}
			 	</h4>
			 	<h4 style="padding: 0px 0px 0px 10px; margin-top: -41px; position:absolute; right: 0px; font-weight: bold; font-size: 1.3em;">
			 		{{name}}
			 	</h4>
			 	<h4 style="position: absolute; left: 55px; top: 16px; color:#888;">
			 			completed
			 	</h4>
		 	</div>
		 	</h3>
		 {{else}}
		 	<h3>
		 		<div data-role='controlgroup' data-type='horizontal' class='goal-row'>
			 		<input class="collapsible-input record-value" type="number"  pattern="\d*" 
			 			step="any" min="0" style="width: 50px; float: left" value='0' 
			 			id='value-{{id}}' data-goal-id='{{id}}' 
			 			onchange='updateRecord($(this))' />
			 		<h4 style="padding: 27px 0px 0px 10px; position: absolute; right: 0px; color: #888;" >
			 			{{label}}
			 		</h4>
			 		<h4 style="padding: 5px 0px 0px 10px; position:absolute; right: 0px; font-weight: bold; font-size: 1.3em;">
			 			{{name}}
			 		</h4>
			 		<h4 style="position: absolute; left: 55px; top: 17px; color:#888;">
			 			hours
			 		</h4>
			 	</div>
		 	</h3>
		 {{/if}}
		{{#if daily}}
		 		<fieldset data-role="controlgroup" id="check-item-{{id}}"  >
			 		<label for="checkbox-{{id}}" style="width: 50px" class="collapsible-checkbox-label" data-goal-id="{{id}}" >
			 			<input type="checkbox" name="checkbox-{{id}}" 
			 				id="value-{{id}}" class="collapsible-input record-value" 
			 				 />
			 			&nbsp;
			 		</label>
			 	</fieldset>
		{{/if}}
		<div class="hidden">
			<h1 style='font-weight: bold; font-size: 1.2em;' >Description:</h1>
			<ul data-role='listview' data-inset='true'>
			<li>{{description}}</li>
			</ul>
		</div>
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
		echo "var todaysDate = '".date("Y-m-d")."';";
		if ( ! isset($_GET['date'])) {
			date_default_timezone_set('CST'); 
			echo "var date = '".date("Y-m-d")."';";
		} else {
			echo "var date = '".$_GET['date']."';";
		}
	?>
	
	var goals = [];
	var records = [];
	$("#message-container").hide();
	
	function format(s) {
		return s.replace(".00","");
	}
	
	//////////////////////////////////////////////////////////// AJAX CALLS TO SERVER
	
	function loadGoals() {
		jQuery.getJSON('./assets/php/goals.php?action=get&username='+username, function success(data) {
			if (data.length == 0) {
				$("#message").html("<p>You don't have any goals!</p><p>Click '<b>Edit</b>' below to add some.</p>");
				$("#message-container").show(200);
				return;
			}
			template = Handlebars.compile($("#goal-template").text());
			var items = '';
			for (var i = 0; i < data.length; ++i) {
				if ( data[i]['type'] == 'DAILY' ) {
					data[i]['daily'] = true;
					data[i]['label'] = ((data[i]['comp'] == '>') ? 'At least ' : 'At most ') + format(data[i]['value']) + " days/week";
				} else {
					data[i]['label'] = ((data[i]['comp'] == '>') ? 'At least ' : 'At most ') + format(data[i]['value']) + " hours/week";
				}
				data[i].value = parseInt(data[i].value);
				
				items += template(data[i]);
				goals = data;
			}
			$("#goals").append(items);
			$("#goals").trigger('create');
			$('.collapsible-input').on("click", function(e) { e.stopPropagation(); });
			$('.goal-row .ui-controlgroup-controls').css('width', '100%');
			//$('.record-value').on('click', function(e) { updateRecord($(this)); });
			$('.collapsible-checkbox-label').on('click', function(e) { 
				e.stopPropagation();
				
				var input = $("#value-"+$(this).data('goal-id'));
				if ( input.attr('checked') ) {
					input.attr("checked", false).checkboxradio("refresh");
					input.attr("value", 0);
				} else {
					input.attr("checked", true).checkboxradio("refresh");
					input.attr("value",1);
				}
				updateRecord($(this)); 
			});
			for (var i = 0; i < data.length; ++i) {
				$("#check-item-"+data[i]['id']).appendTo("#check-container-"+data[i]['id']);
			}
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
				var input = $("#value-"+goals[i].id);
				if ( (! recordMap[goals[i].id]) || recordMap[goals[i].id] == 0) {
					input.attr("value", 0);
					if (goals[i].type == "DAILY") {
						input.attr("checked", false).checkboxradio("refresh");
					}
				} else {
					input.attr("value", format(recordMap[goals[i].id]));
					if (goals[i].type == "DAILY") {
						input.attr("checked", true).checkboxradio("refresh");
					}
				}
				
			}
		});
	}
	
	function updateRecord(record) {
		console.log("UPDATE RECORD");
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
		//alert(date);
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
