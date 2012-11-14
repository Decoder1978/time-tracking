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
				Add/Edit Goal
			</h1>
			<a href="#" onclick='cancel()' data-role="button" data-icon="delete" style="float:left">Cancel</a>
			<a href="#" onclick='done()' data-role="button" data-icon="check" style="float: right;">Done</a>
			
		</header>
		<section data-role="content">
			
			<form>
			
			<input type="text" id="name" placeholder="Goal Name" />
			
			<div data-role="controlgroup" data-type="horizontal" width="100%">
				<select id="comp" data-icon="">
					<option value="<" >At most</option>
					<option value=">" >At least</option>
				</select>
				<select id="value" data-icon="">
					<option value=0 >0</option>
					<option value=1 >1</option>
					<option value=2 >2</option>
					<option value=3 >3</option>
					<option value=4 >4</option>
					<option value=5 >5</option>
					<option value=6 >6</option>
					<option value=7 >7</option>
				</select>
				<select id="type" data-icon="">
					<option value="DAILY">days/week</option>
					<option value="HOURLY">hours/week</option>
				</select>
			</div>
			
			<textarea id="description" placeholder="Goal Description"></textarea>
			
			<a id='addMotivation' data-role='button' data-mini='true' data-theme='b' href='#' data-icon='add' data-iconpos="right">Motivations</a>
			<ul data-role="listview"  data-inset="true" id="motivations" data-theme="a" style="box-shadow:none;">
			</ul>
			
			<a data-role='button' data-icon='delete' data-mini='true' onclick='remove()' href='#' id='delete' data-theme='e' >Delete</a>
			
			</form>
		</section>
		<footer data-role="footer" data-position="fixed" >
			<h3>&nbsp;</h3>
		</footer>
	</div>
</body>
<script>
	var motivations = [];
	var availableIds = [10,9,8,7,6,5,4,3,2,1];
	
	function loadGoal() {
		jQuery.getJSON('./assets/php/goals.php?action=get&username=' + username+"&id="+id, function success(data) {
			console.log("Running loadGoal()");
			goal = data[0];
			$('#name').attr('value',goal.name);
			$('#description').attr('value',goal.description);
			$('#value').val(parseInt(goal.value));
			$('#type').val(goal.type);
			$('#comp').val(goal.comp);
			$('#value').selectmenu('refresh', true);
			$('#type').selectmenu('refresh', true);
			$('#comp').selectmenu('refresh', true);
			
			for (var i = 0; i < goal['motivations'].length; ++i) {
				goal['motivations'][i]['id'] = availableIds.pop();
			}
			motivations = goal['motivations'];
			listMotivations();
		});

	}
	
	<?php 
		if (isset($_GET['id'])) {
			echo 'var id = "'.$_GET['id'].'";'; 
			echo 'loadGoal()';
		} else {
			echo 'var id = "0";';
			echo "$('#delete').remove();";
		}
	?>
	
	function getMotivation(id) {
		for (var i = 0; i < motivations.length; ++i) {
			if (motivations[i].id == id) {
				return motivations[i];
			}
		}
		return null;
	}
	
	function listMotivations() {
		var list = "";
		for (var i = 0; i < motivations.length; ++i) {
			list += "<li><textarea class='text' data-motivation-id=" + motivations[i].id 
					+ " placeholder='Why do you have this goal?'>"
					+ motivations[i].text
					+ "</textarea><a href='#' class='delete' data-motivation-id="+motivations[i].id 
					+" data-icon='delete' data-role='button' data-iconpos='notext' style='float: right; margin-top: -25px; margin-right: -12px;'></a></li>";
		}
		$("#motivations").html(list);
		$("#motivations").trigger("create");
		
			
		$(".text").on('blur', function() {
			var id = $(this).data('motivation-id');
			for (var i = 0; i < motivations.length; ++i) {
				if ( motivations[i].id == id ) {
					motivations[i].text = $(this).val();
					return;
				}
			}
		});
		
		$(".delete").on('click', function() {
			var id = $(this).data('motivation-id');
			var m = getMotivation(id);
			if (m.text == "" || confirm("Are you sure you want to delete the motivation, '" + m.text + "'?") ) {
				for (var i = 0; i < motivations.length; ++i) {
					if (motivations[i].id == id) {
						motivations.splice(i, 1);
						availableIds.push(id);
						listMotivations();
						return;
					}
				}
				alert("Could not find item " + id + " to delete it.");
			}
		});
	}
	
	
	
	$("#addMotivation").on("click", function() {
		if (motivations.length >= 8) {
			alert("Maximum of 8 motivations allowed.");
			return;
		}
		motivations.push({id:availableIds.pop(), text:""});
		listMotivations();
	});

	function done() {
		save(cancel);
	}

	function cancel() {
		window.location.replace('edit.php?username=' + username);
	}
	
	function save(onComplete) {
		if (! onComplete) {
			onComplete = function() {
				console.log("Save submitted.");
			}
		}
	
		var goal = {};
		goal['id'] = id;
		goal['name'] = $('#name').val();
		goal['description'] = $('#description').val();
		goal['comp'] = $('#comp').val();
		goal['value'] = $('#value').val();
		goal['type'] = $('#type').val();
		goal['motivations'] = motivations.reverse();
		
		$.ajax({
            type: "POST",
            url: "./assets/php/goals.php?action=update&username="+username,
            dataType: 'json',
            data: { json: JSON.stringify(goal) },
            complete: function(jqXHR, textStatus){ 
	            onComplete();
	        }
        });
        return goal;
	}
	
	function remove() {
		if (confirm("Are you sure you want to delete this goal?")) {
			$.ajax({
            	type: "GET",
           	 	url: "./assets/php/goals.php?action=delete&username="+username+"&id="+id
            });
        	window.location.replace('edit.php?username=' + username);
        }
	}

</script>
</html>
