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
		<!--div class="ui-bar ui-bar-d" style="text-align: center" >
				<div data-role="controlgroup" data-type="horizontal" style="text-align: center">
					<a href="#" data-role="button" data-mini="true" data-icon="arrow-l" data-iconpos="notext" style=" height:50px; width:15%;"></a>
					<a  data-role="button" data-mini="true" style="height:50px; width:65%;" >
						<input class="collapsible-input" data-mini="true" type="date" value="2012-10-21 to 2012-10-27 to " style="margin-top: 2px;" />
					</a>
				<a href="#" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="notext" style=" height:50px; width:15%;"></a>	
				</div>
		</div-->

		<section data-role="content">
			
			<div id='message'>
			</div>

			<ul data-role="collapsible-set" data-iconpos="right" data-collapsed-icon='arrow-r'  data-expanded-icon='arrow-d' id='goals'>
			</ul>
			<br>
			<p>Click a goal to see monthly progress.</p>
			<p>When you're done viewing progress, click 'Done' above.</p>
		</section>
		



		<footer data-role="footer" data-position="fixed" style="text-align: center;">
			<div data-role="controlgroup" data-type="horizontal">
				<a href="#" 											  data-role="button" data-transition="flip" data-theme="b"  >A</a>
				<a href="progress2.php?username=<?php echo $username; ?>" data-role="button" data-transition="flip" rel="external"	>B</a>
				<a href="progress3.php?username=<?php echo $username; ?>" data-role="button" data-transition="flip"				 	>C</a>
				<a href="progress4.php?username=<?php echo $username; ?>" data-role="button" data-transition="flip"					>D</a>
			</div>
		</footer>
	</div>
</body>

<script id='goal-template' type='text/x-handlebars-template'>
	<li id="goal_progress_list" class='goal' data-role="collapsible" data-collapsed="true" data-mini="true">
		 {{#if daily}}
		 	<h3 >
		 		<div  data-role='controlgroup' data-type='horizontal' class='goal-row'>	
		 		<h4 style="margin-top: 3px; position: absolute; left: 0px; color: #888;" >
			 		<span>Actual: 3 days</span>
			 		<br>
			 		<span>Goal: {{comp}}= {{value}} days</span>
			 	</h4>
			 	<h4 style="margin-top: 6px; position:absolute; right: 0px; font-weight: bold; font-size: 1.3em;">
			 		{{name}}
			 	</h4>
			 	<div  data-role='controlgroup' data-type='horizontal' class='goal-row'>	
		 	</h3>
			<style><!--
			td.border{
				border: 1px solid #002222;
			}
			--></style>
			
			<section data-role="content" style="overflow-x: scroll;">
				<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=3 ALIGN=center>
				<TR>
				<TD class=border COLSPAN="7" ALIGN=center><B>November 2012</B></TD>
				</TR>

				<TR>
				<TD class=border width="25" height="25" ALIGN=center>S</TD>
				<TD class=border width="25" height="20" ALIGN=center>M</TD>
				<TD class=border width="25" height="20" ALIGN=center>T</TD>
				<TD class=border width="25" height="20" ALIGN=center>W</TD>
				<TD class=border width="25" height="20" ALIGN=center>T</TD>
				<TD class=border width="25" height="20" ALIGN=center>F</TD>
				<TD class=border width="25" height="20" ALIGN=center>S</TD>
				</TR>

				<TR>
				<TD class=border width="20" height="25" ALIGN=center bgcolor="#fad2fa">28</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">29</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">30</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">31</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">1</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">2</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">3</TD>
				<TD width="70" height="20" ALIGN=left>Needed 2days</TD>
				</TR>
				
				<TR>
				<TD class=border width="20" height="25" ALIGN=center bgcolor="#fafad2">4</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">5</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">
					<img src="http://i154.photobucket.com/albums/s275/dkhieu/checkmark1.png" alt="GOOD JOB"></TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">7</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">8</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">9</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">10</TD>
				<TD width="70" height="20" ALIGN=left>Needed 1day</TD>
				</TR>
				
				<TR>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">
					<img src="http://i154.photobucket.com/albums/s275/dkhieu/checkmark1.png" alt="GOOD JOB"></TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">12</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">
					<img src="http://i154.photobucket.com/albums/s275/dkhieu/checkmark1.png" alt="GOOD JOB"></TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">14</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">
					<img src="http://i154.photobucket.com/albums/s275/dkhieu/checkmark1.png" alt="GOOD JOB"></TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">16</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">17</TD>
				<TD width="70" height="20" ALIGN=left>GREAT!!! 3days</TD>
				</TR>

				<TR>
				<TD class=border width="20" height="25" ALIGN=center >18</TD>
				<TD class=border width="20" height="20" ALIGN=center >19</TD>
				<TD class=border width="20" height="20" ALIGN=center >20</TD>
				<TD class=border width="20" height="20" ALIGN=center >21</TD>
				<TD class=border width="20" height="20" ALIGN=center >22</TD>
				<TD class=border width="20" height="20" ALIGN=center >23</TD>
				<TD class=border width="20" height="20" ALIGN=center >24</TD>
				</TR>

				<TR>
				<TD class=border width="20" height="25" ALIGN=center >25</TD>
				<TD class=border width="20" height="20" ALIGN=center >26</TD>
				<TD class=border width="20" height="20" ALIGN=center >27</TD>
				<TD class=border width="20" height="20" ALIGN=center >28</TD>
				<TD class=border width="20" height="20" ALIGN=center >29</TD>
				<TD class=border width="20" height="20" ALIGN=center >30</TD>
				<TD class=border width="20" height="20" ALIGN=center >1</TD>						
				</TR>

				</TABLE> 
			</section>		
		 {{else}}
		 	<h3 >
		 		<div  data-role='controlgroup' data-type='horizontal' class='goal-row'>	
		 		<h4 style="margin-top: 3px; position: absolute; left: 0px; color: #888;" >
			 		<span>Actual: 6 hours</span>
			 		<br>
			 		<span>Goal: {{comp}}= {{value}} hours</span>
			 	</h4>
			 	<h4 style="margin-top: 6px; position:absolute; right: 0px; font-weight: bold; font-size: 1.3em;">
			 		{{name}}
			 	</h4>
			 	<div  data-role='controlgroup' data-type='horizontal' class='goal-row'>	
		 	</h3>
			<style><!--
			td.border{
				border: 1px solid #002222;
			}
			--></style>
			
			<section data-role="content" style="overflow-x: scroll;">
				<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=3 ALIGN=center>
				<TR>
				<TD class=border COLSPAN="7" ALIGN=center><B>November 2012</B></TD>
				</TR>

				<TR>
				<TD class=border width="25" height="25" ALIGN=center>S</TD>
				<TD class=border width="25" height="20" ALIGN=center>M</TD>
				<TD class=border width="25" height="20" ALIGN=center>T</TD>
				<TD class=border width="25" height="20" ALIGN=center>W</TD>
				<TD class=border width="25" height="20" ALIGN=center>T</TD>
				<TD class=border width="25" height="20" ALIGN=center>F</TD>
				<TD class=border width="25" height="20" ALIGN=center>S</TD>
				</TR>

				<TR>
				<TD class=border width="20" height="25" ALIGN=center bgcolor="#fafad2">28</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">29</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">30</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">31</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">1</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">2</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fafad2">3</TD>
				<TD width="70" height="20" ALIGN=left>Good... 4hrs</TD>
				</TR>

				<TR>
				<TD class=border width="20" height="25" ALIGN=center bgcolor="#d2fad2">4</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">5</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">6</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">7</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">8</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">9</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#d2fad2">10</TD>
				<TD width="70" height="20" ALIGN=left>GREAT!!! 3hrs</TD>
				</TR>

				<TR>
				<TD class=border width="20" height="25" ALIGN=center bgcolor="#fad2fa">11</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">12</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">13</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">14</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">15</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">16</TD>
				<TD class=border width="20" height="20" ALIGN=center bgcolor="#fad2fa">17</TD>
				<TD width="70" height="20" ALIGN=left>Over by... 2hrs</TD>
				</TR>

				<TR>
				<TD class=border width="20" height="25" ALIGN=center >18</TD>
				<TD class=border width="20" height="20" ALIGN=center >19</TD>
				<TD class=border width="20" height="20" ALIGN=center >20</TD>
				<TD class=border width="20" height="20" ALIGN=center >21</TD>
				<TD class=border width="20" height="20" ALIGN=center >22</TD>
				<TD class=border width="20" height="20" ALIGN=center >23</TD>
				<TD class=border width="20" height="20" ALIGN=center >24</TD>
				</TR>

				<TR>
				<TD class=border width="20" height="25" ALIGN=center >25</TD>
				<TD class=border width="20" height="20" ALIGN=center >26</TD>
				<TD class=border width="20" height="20" ALIGN=center >27</TD>
				<TD class=border width="20" height="20" ALIGN=center >28</TD>
				<TD class=border width="20" height="20" ALIGN=center >29</TD>
				<TD class=border width="20" height="20" ALIGN=center >30</TD>
				<TD class=border width="20" height="20" ALIGN=center >1</TD>						
				</TR>

				</TABLE> 
			</section>	
		 {{/if}}
		 
		<!--
		<header data-role="header">
			<h1>
				Monthly Progress (Selected Goal)
			</h1>
		</header>
		-->
		 
	</li>
</script>
<script>
	var goals = null;
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
				data[i]['completed'] = data[i]['value'] > 0;
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
	});

	function done() {
		window.location.replace('home.php?username=' + username);
	}
	

</script>

</html>
