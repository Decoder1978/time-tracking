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
		<div class="ui-bar ui-bar-d" style="text-align: center" >
				<div data-role="controlgroup" data-type="horizontal" style="text-align: center">
					<a href="#" data-role="button" data-mini="true" data-icon="arrow-l" data-iconpos="notext" style=" height:50px; width:15%;"></a>
					<a  data-role="button" data-mini="true" style="height:50px; width:65%;" >
						<input class="collapsible-input" data-mini="true" type="date" value="2012-10-21 to 2012-10-27 to " style="margin-top: 2px;" />
					</a>
				<a href="#" data-role="button" data-mini="true" data-icon="arrow-r" data-iconpos="notext" style=" height:50px; width:15%;"></a>	
				</div>
		</div>

		<section data-role="content">
			
			<div id='message'>
			</div>

			<ul data-role="collapsible-set" data-iconpos="right" data-collapsed-icon='arrow-r'  data-expanded-icon='arrow-d' id='goals'>
			</ul>
			<br>
			<p>Click a goal to see monthly progress.</p>
			<p>When you're done viewing progress, click 'Done' above.</p>
		</section>
		



		<footer data-role="footer" data-position="fixed" >
			<p>&nbsp;</p>
		</footer>
	</div>
</body>

<script id='goal-template' type='text/x-handlebars-template'>
	<li id="goal_progress_list" class='goal' data-role="collapsible" data-collapsed="true" data-mini="true">
		 {{#if daily}}
		 	<h3>
				<div data-role='controlgroup' data-type='horizontal' class='goal-row'>
					<h4 style="padding: 19px 0px 0px 10px; float:left;"> Actual: {{value}} days....Goal: > {{value}} days / week</h4>
					<h4 style="padding: 10px 0px 0px 10px; float:right; font-weight: bold; font-size: 1.3em">{{name}}</h4>
				</div>
		 	</h3>
		 {{else}}
		 	<h3>
		 		<div data-role='controlgroup' data-type='horizontal' class='goal-row'>
			 		<h4 style="padding: 19px 0px 0px 10px; float:left;" > Actual: {{value}} hrs.....Goal: < {{value}} hrs / week</h4>
			 		<h4 style="padding: 17px 0px 0px 10px; float:right; font-weight: bold; font-size: 1.3em">{{name}}</h4>
			 	</div>
		 	</h3>
		 {{/if}}
		 
		<!--
		<header data-role="header">
			<h1>
				Monthly Progress (Selected Goal)
			</h1>
		</header>
		-->

		<section data-role="content" style="overflow-x: scroll;">
			<TABLE BORDER=10 CELLSPACING=3 CELLPADDING=3 ALIGN=center>
			<TR>
			<TD COLSPAN="7" ALIGN=center><B>October 2012</B></TD>
			</TR>

			<TR>
			<TD width="30" height="20" ALIGN=center>Sun</TD>
			<TD width="30" height="20" ALIGN=center>Mon</TD>
			<TD width="30" height="20" ALIGN=center>Tue</TD>
			<TD width="30" height="20" ALIGN=center>Wed</TD>
			<TD width="30" height="20" ALIGN=center>Thu</TD>
			<TD width="30" height="20" ALIGN=center>Fri</TD>
			<TD width="30" height="20" ALIGN=center>Sat</TD>
			</TR>

			<TR>
			<TD width="30" height="20" ALIGN=center></TD>
			<TD width="30" height="20" ALIGN=center>1</TD>
			<TD width="30" height="20" ALIGN=center>2</TD>
			<TD width="30" height="20" ALIGN=center>3</TD>
			<TD width="30" height="20" ALIGN=center>4</TD>
			<TD width="30" height="20" ALIGN=center>5</TD>
			<TD width="30" height="20" ALIGN=center>6</TD>
			</TR>

			<TR>
			<TD width="30" height="20" ALIGN=center bgcolor="#fafad2">7</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#fafad2">8</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#fafad2">9</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#fafad2">10</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#fafad2">11</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#fafad2">12</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#fafad2">13</TD>
			<TD width="170" height="20" ALIGN=left><=Some progress.</TD>
			</TR>

			<TR>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">14</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">15</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">16</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">17</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">18</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">19</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">20</TD>
			<TD width="170" height="20" ALIGN=left><=Completed weekly goal!!!</TD>
			</TR>

			<TR>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">21</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">22</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">23</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">24</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">25</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">26</TD>
			<TD width="30" height="20" ALIGN=center bgcolor="#d2fad2">27</TD>
			<TD border="0" width="170" height="20" ALIGN=left><=Completed weekly goal!!!</TD>
			</TR>

			<TR>
			<TD width="30" height="20" ALIGN=center>28</TD>
			<TD width="30" height="20" ALIGN=center>29</TD>
			<TD width="30" height="20" ALIGN=center>30</TD>
			<TD width="30" height="20" ALIGN=center><img src="http://i1158.photobucket.com/albums/p614/RG_Minor/e1.gif" width="30" height="30" style="opacity:0.4;filter:alpha(opacity=40);" alt="GOOD JOB">31</TD>			
			<TD width="30" height="20" ALIGN=center style="background:url(http://i1158.photobucket.com/albums/p614/RG_Minor/e1.gif)" width="30" height="30" alt="GOOD JOB">01</TD>			
			<!--
			<TD width="30" height="30" ALIGN=center style="background:url(http://i1158.photobucket.com/albums/p614/RG_Minor/e1.gif)">01</TD>
			<TD width="30" height="20" ALIGN=center><img src="http://i1158.photobucket.com/albums/p614/RG_Minor/e1.gif" width="30" height="30" alt="GOOD JOB"></TD>
			-->
			<TD width="30" height="20" ALIGN=center><img src="http://i1158.photobucket.com/albums/p614/RG_Minor/5263079.gif" width="30" height="30" alt="GOOD JOB"></TD>
			<TD width="30" height="20" ALIGN=center><img src="http://i1069.photobucket.com/albums/u477/mproska132/Facebook/Kew%20Gardens%203/202510_3590734417752_1516301430_o.jpg" width="30" height="30" alt="GOOD JOB"></TD>
			</TR>

			</TABLE> 
		</section>		 
		 
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
