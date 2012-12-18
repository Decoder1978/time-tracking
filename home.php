<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Achiev.r</title>
	<?php require_once('./assets/php/includes.php'); ?>
	<style>
		.ui-header .ui-btn-icon-right .ui-icon, .ui-footer .ui-btn-icon-right .ui-icon, .ui-mini.ui-btn-icon-right .ui-icon, .ui-mini .ui-btn-icon-right .ui-icon {right: 10px;}
		
		table {
			border-collapse: collapse;
			-moz-box-shadow: 0 1px 4px rgba(0,0,0,.3);
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, .3);
			box-shadow: 0 1px 4px rgba(0, 0, 0, .3);
		}
		table td {padding: 10px; text-align: center; border: 1px solid #CCC;}
		table td.img {padding: 0;}
		table tr td {width: 40px; white-space: nowrap;}
		table tr td:last-child {width: 200px;}
		table tr:first-child {font-weight: bold;}
		
		tr.good-week td {
			background-color: #fad2fa;
		}
		tr.ok-week td {
			background-color: #d2fad2;
		}
	</style>
</head>
<body>
	<div data-role="page">
		<header data-role="header" data-position="fixed">
			<a href="index.php" data-role="button" rel="external">Log Out</a>
			<h1>HCI Time</h1>
		</header>
		
		<div class="ui-bar ui-bar-d" style="text-align: center" >
				<div data-role="controlgroup" data-type="horizontal" style="margin-left: 0; margin-right: 0;text-align: center; min-width: 274px">
					<a href="#" onclick="previousDate()" data-role="button" data-icon="arrow-l" data-iconpos="notext" style="padding:3px; 0;">a</a>
					<a data-corners="false" data-mini="true" >
						<input class="collapsible-input" type="date" value="" id="date" style="margin: 0; height: 32px; max-width: 120px" />
					</a>
					<a href="#" onclick="nextDate()" data-role="button" data-icon="arrow-r" data-iconpos="notext" style="padding:3px; 0;"></a>	
				</div>
		</div>
		
		<section data-role="content">
			
			<h1 id="day-title" style='font-weight: bold; font-size: 1.5em;' >Status for Today</h1>
			<br>
			
			<div id='message-container' class='ui-bar-e' style='display: none; height: 90px; width: 250px; padding: 0px 20px 0px 20px;'>
				<h1 id='message' style="font-size: large"></h1>
			</div>
			<ul data-role="collapsible-set" data-iconpos="right"   data-collapsed-icon='arrow-r'  data-expanded-icon='arrow-d' id='goals'>

			</ul>
			<div id='message-container-2' class='ui-bar-e' style='position: relative; height: 70px; width: 250px; padding: 0px 20px 0px 20px; display: none;'>
				<img src="assets/img/arrow-04.png" style="position: absolute; top: 12px; left: 28px; height: 40px;" alt="arrow" />
				<h1 id='message-2' style="font-size: large; position: absolute; left: 90px;  width: 250px;">
					<p>At the end of the day, record what you did for each goal.</p>
				</h1>
			</div>

		</section>
		<footer data-role="footer" class="ui-bar" data-position="fixed" style"text-align: center;">
				<a href="progress2.php?username=<?php echo $username; ?>"  data-role="button" data-transition="flip"	
					rel="external"  data-theme="b" style="width: 200px"	>My Current Progress</a>
				<a href="#" onclick="edit()" data-role="button" style="float: right; margin-right:20px;">Edit Goals</a>
		</footer>
	</div>
</body>
<script id='goal-template' type='text/x-handlebars-template'>
	<li class='goal' data-role="collapsible" data-collapsed="true" data-mini="true">
		
		 {{#if daily}}
		 	<h3>
				<div data-role='controlgroup' data-type='horizontal' class='goal-row'>	
					<div id="check-container-{{id}}" style="height:42px; float:left;"></div>
					<div style="float:left; margin: 14px 0 0 7px; position: relative; ">
						<em style="position:absolute; color:#888;" id="units-{{id}}">completed</em>
						<em style="position:absolute; color:#8b8; display: none; font-weight: bold;" id="saved-{{id}}">Saved!</em>
					</div>		 			
					<div style="float: right; text-align: right;">
						<h5 style="font-size: 1.3em; font-weight: bold; margin: 4px 0 5px;">{{name}}</h5>
						<em style="color:#888;">{{label}}</em>
					</div>
				</div>
		 	</h3>
		 {{else}}
		 	<h3>
		 		<div data-role='controlgroup' data-type='horizontal' class='goal-row'>
					<input class="collapsible-input record-value" type="number"  pattern="\d*" step="any" min="0" style="width: 50px; float: left" value='0' id='value-{{id}}' data-goal-id='{{id}}' onchange='updateRecord($(this))' style="float:left;" />
					<div style="float:left; margin: 14px 0 0 7px; position: relative">
						<em style="position: absolute; color:#888;" id="units-{{id}}">hours</em>
						<em style="position: absolute; color:#8b8; display: none; font-weight: bold;" id="saved-{{id}}">Saved!</em>
					</div>
					<div style="float: right; text-align: right;">
						<h5 style="font-size: 1.3em; font-weight: bold; margin: 4px 0 5px;">{{name}}</h5>
						<em style="color:#888;">{{label}}</em>
					</div>
			 	</div>
		 	</h3>
		 {{/if}}
		{{#if daily}}
		 		<fieldset data-role="controlgroup" id="check-item-{{id}}"  >
			 		<label for="checkbox-{{id}}" style="width: 50px" class="collapsible-checkbox-label" data-goal-id="{{id}}" >
			 			<input type="checkbox" name="checkbox-{{id}}" 
			 				id="value-{{id}}" class="collapsible-input record-value" data-goal-id="{{id}}"
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
		
		<h1 style='font-weight: bold; font-size: 1.2em;' >Goal: <span style=" font-weight: normal;">{{label}}.</span></h1>
		<br>
		
		<h1 style='font-weight: bold; font-size: 1.2em; margin-bottom: 5px; ' >This Week:</h1>
		{{#if daily}}
	
			<table data-role="table">

				<tr>
					<td>S</td>
					<td>M</td>
					<td>T</td>
					<td>W</td>
					<td>T</td>
					<td>F</td>
					<td>S</td>
					<td>Total</td>			
				</tr>
			
				<tr class="good-week">
					<td class="img"><img src="assets/img/checkmark.png" alt="checkmark"></td>
					<td></td>
					<td class="img"><img src="assets/img/checkmark.png" alt="checkmark"></td>
					<td></td>
					<td class="img"><img src="assets/img/checkmark.png" alt="checkmark"></td>
					<td></td>
					<td></td>
					<td>3 days</td>					
				</tr>

			</table> 
		{{else}}			
			<table data-role="table">

				<tr>
					<td>S</td>
					<td>M</td>
					<td>T</td>
					<td>W</td>
					<td>T</td>
					<td>F</td>
					<td>S</td>
					<td>Total</td>			
				</tr>

				<tr class="ok-week">
					<td>3</td>
					<td>1</td>
					<td>2</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>6 hrs</td>
				</tr>

			</table>	
		{{/if}}
		
		<br>
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
		//echo "var todaysDate = '".date("Y-m-d")."';";
		if ( ! isset($_GET['date'])) {
			date_default_timezone_set('America/Tegucigalpa'); 
			echo "var date = '".date("Y-m-d")."';";
			echo 'var todaysDate = date;';
		} else {
			echo "var date = '".$_GET['date']."';";
		}
	?>
	
	var goals = [];
	var records = [];
	
	function format(s) {
		return s.replace(".00","");
	}
	
	//////////////////////////////////////////////////////////// AJAX CALLS TO SERVER
	
	function loadGoals() {
		jQuery.getJSON('./assets/php/goals.php?action=get&username='+username, function success(data) {
			if (data.length == 0) {
				$("#message").html("<p>You don't have any goals!</p><p>Click '<b>Edit Goals</b>' below to add some.</p>");
				$("#message-container").css("width", $("#message-container").parent().width()-42);
				
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
			$('.ui-checkbox input').on('change', function(e) {
				if($(this).attr('checked'))
					$(this).attr("value", 1);
				else
					$(this).attr("value", 0);
				updateRecord($(this)); 
			});
			for (var i = 0; i < data.length; ++i) {
				$("#check-item-"+data[i]['id']).appendTo("#check-container-"+data[i]['id']);
			}
			if (goals.length == 1) {
				firstGoalHelp();
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
		var value = $('#value-'+record.data('goal-id')).val();
		var id = record.data('goal-id');
		$.ajax({
            type: "GET",
            url: "./assets/php/records.php?action=update&username="+username
            	 +"&id="+record.data('goal-id')+"&value="+value+"&date="+date,
            complete: function() {
	            console.log("Updated goal " + id + ".");
	            $("#units-"+id).fadeOut(100).delay(1500).fadeIn(200);
	            $("#saved-"+id).delay(100).fadeIn(200).delay(1100).fadeOut(200);
            }
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
		if(date == todaysDate)
			$("#day-title").html("Status for Today");
		else {
			var d = new Date(date + " CST");
			var year = d.getFullYear();
			var month = ("0" + (d.getMonth()+1)).slice(-2);
			var day = ("0" + d.getDate()).slice(-2);
			var d = month+"/"+day+"/"+year;
			$("#day-title").html("Status for " + d);
		}
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
	if(date == todaysDate)
		$("#day-title").html("Status for Today");
	
	$("#date").on("change", function () {
		setDate($(this).val());
	});
	
	function firstGoalHelp() {
		var width = $("#message-container").parent().width()-42;
	
		$("#message-container").css("width", width);
		$("#message-container").css("height", 52);
		$("#message").html("<p>Here is your new goal!</p>");
		$("#message").css("text-align","center")
		$("#message-container").show(200);
		
		$("#message-container-2").css("width", width);
		$("#message-container-2").show(200);
		
	}
	
</script>
</html>
