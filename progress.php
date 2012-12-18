<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Achieving Goals to Change Behaviors - CSE556 HCI, Fall 2012</title>
	<?php require_once('./assets/php/includes.php'); ?>
	<style>
		.ui-header .ui-btn-icon-right .ui-icon, .ui-footer .ui-btn-icon-right .ui-icon, .ui-mini.ui-btn-icon-right .ui-icon, .ui-mini .ui-btn-icon-right .ui-icon {right: 10px;}
		.ui-collapsible-content {padding: 10px 0 15px;}
		
		table {
			border-collapse: collapse;
			-moz-box-shadow: 0 1px 4px rgba(0,0,0,.3);
			-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, .3);
			box-shadow: 0 1px 4px rgba(0, 0, 0, .3);
			width: 100%;
		}
		table tr:first-child {background: #444; color: #f0f0f0; text-shadow: none;}
		table tr:first-child + tr {font-weight: bold;}
		table tr + tr td:last-child {text-align: left;}
		table tr.inprogress td {background: #fff9b7; text-shadow: none;}
		table tr.oops td {background: #ffd9d2; text-shadow: none;}
		table tr.ontrack td {background: #c8ef9f; text-shadow: none;}
		table td {padding: 6px; text-align: center; border: 1px solid #CCC;}
		table td.img {padding: 0;}
		table tr td {width: 40px; white-space: nowrap;}
		table tr td:last-child {}
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
			<h1>Current Progress</h1>
			<a href="#" onclick="done()" data-role="button" data-icon="check" class="ui-btn-right">Done</a>
		</header>
		
		<section data-role="content">
			<div id='message'>
			</div>
			<ul data-role="collapsible-set" data-iconpos="right" data-collapsed-icon='arrow-r'  data-expanded-icon='arrow-d' id='goals'>
			</ul>
		</section>

		<footer data-role="footer" data-position="fixed" style="text-align: center;">
			<div data-role="controlgroup" data-type="horizontal">
				<a href="progress2.php?username=<?php echo $username; ?>"  data-role="button" rel="external"	>This Week</a>
				<a href="#"  				data-theme="b"				  data-role="button" rel="external"	>This Month</a-->
				<a href="progress3.php?username=<?php echo $username; ?>" data-role="button" rel="external"	>Rewards</a>
			</div>
		</footer>
	</div>
</body>

<script id='goal-template' type='text/x-handlebars-template'>
	<li id="goal_progress_list" class='goal' data-role="collapsible" data-collapsed="true" data-mini="true">
		 {{#if daily}}
		 	<h3>
		 		<div data-role='controlgroup' data-type='horizontal' class='goal-row'>		 			
					<h5 style="font-size: 1.3em; font-weight: bold; margin: 4px 0 5px;">{{name}}</h5>
					<em style="color:#888;">{{label}}</em>
				</div>
		 	</h3>
			
			<section data-role="content" >
				<table>
				
					<tr>
						<td colspan="8">December 2012</td>
					</tr>
					<tr>
						<td>S</td>
						<td>M</td>
						<td>T</td>
						<td>W</td>
						<td>T</td>
						<td>F</td>
						<td>S</td>
						<td>Status</td>
					</tr>
					<tr class="inprogress">
						<td>28</td>
						<td>29</td>
						<td>30</td>
						<td>31</td>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>Needed 2 days</td>
					</tr>
					<tr class="oops">
						<td>4</td>
						<td>5</td>
						<td class="img"><img src="assets/img/checkmark.png" alt="Good Job"></td>
						<td>7</td>
						<td>8</td>
						<td>9</td>
						<td>10</td>
						<td>Needed 1 day</td>
					</tr>
					<tr class="ontrack">
						<td class="img"><img src="assets/img/checkmark.png" alt="Good Job"></td>
						<td>12</td>
						<td class="img"><img src="assets/img/checkmark.png" alt="Good Job"></td>
						<td>14</td>
						<td class="img"><img src="assets/img/checkmark.png" alt="Good Job"></td>
						<td>16</td>
						<td>17</td>
						<td>Great! 3 days</td>
					</tr>
					<tr>
						<td>18</td>
						<td>19</td>
						<td>20</td>
						<td>21</td>
						<td>22</td>
						<td>23</td>
						<td>24</td>
						<td></td>
					</tr>
					<tr>
						<td>25</td>
						<td>26</td>
						<td>27</td>
						<td>28</td>
						<td>29</td>
						<td>30</td>
						<td>1</td>						
						<td></td>						
					</tr>

				</table> 
			</section>		
		 {{else}}
		 	<h3>
		 		<div data-role='controlgroup' data-type='horizontal' class='goal-row'>
					<h5 style="font-size: 1.3em; font-weight: bold; margin: 4px 0 5px;">{{name}}</h5>
					<em style="color:#888;">{{label}}</em>
				</div>
		 	</h3>
			
			<section data-role="content">
				<table>
					<tr>
						<td colspan="8">December 2012</td>
					</tr>
					<tr>
						<td>S</td>
						<td>M</td>
						<td>T</td>
						<td>W</td>
						<td>T</td>
						<td>F</td>
						<td>S</td>
						<td>Status</td>
					</tr>

					<tr class="inprogress">
						<td>28</td>
						<td>29</td>
						<td>30</td>
						<td>31</td>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>Good! 4 hrs</td>
					</tr>

					<tr class="ontrack">
						<td>4</td>
						<td>5</td>
						<td>6</td>
						<td>7</td>
						<td>8</td>
						<td>9</td>
						<td>10</td>
						<td>Great! 3 hrs</td>
					</tr>

					<tr class="oops">
						<td>11</td>
						<td>12</td>
						<td>13</td>
						<td>14</td>
						<td>15</td>
						<td>16</td>
						<td>17</td>
						<td>Over by... 2 hrs</td>
					</tr>

					<tr>
						<td>18</td>
						<td>19</td>
						<td>20</td>
						<td>21</td>
						<td>22</td>
						<td>23</td>
						<td>24</td>
						<td></td>
					</tr>

					<tr>
						<td>25</td>
						<td>26</td>
						<td>27</td>
						<td>28</td>
						<td>29</td>
						<td>30</td>
						<td>1</td>						
						<td></td>						
					</tr>

				</table> 
			</section>	
		 {{/if}}
		 
	</li>
</script>
<script>
	var goals = null;

	function format(s) {
		return s.replace(".00","");
	}	

	jQuery.getJSON('./assets/php/goals.php?action=get&username=' + username, function success(data) {
		if (data.length == 0) {
			$("#message").html("<h3>You don't have any goals! Click 'Done' to return to home.</h3>");
			return;
		}
		template = Handlebars.compile($("#goal-template").text());
		var items = '';
		for (var i = 0; i < data.length; ++i) {
			if ( data[i]['type'] == 'DAILY' ) {
				data[i]['daily'] = true;
				data[i]['label'] = ((data[i]['comp'] == '>') ? 'At least ' : 'At most ') + format(data[i]['value']) + " days/week";
			} else {
				data[i]['daily'] = false;			
				data[i]['label'] = ((data[i]['comp'] == '>') ? 'At least ' : 'At most ') + format(data[i]['value']) + " hours/week";
			}	
			data[i].value = parseInt(data[i].value);
			
			items += template(data[i]);
			goals = data;
		}
		$("#goals").append(items);
		$("#goals").trigger('create');
		$('.collapsible-input').on("click", function(e) { e.stopPropagation(); });
		//$('.checkbox').on("click", function(e) { e.stopPropagation(); });
		$('.goal-row .ui-controlgroup-controls').css('width', '100%');
		$("li").first().trigger("expand");
	});

	function done() {
		window.location.replace('home.php?username=' + username);
	}

</script>

</html>
