<?php 

//print_r($players);

$count =count($players);

for ($i=0; $i<$count;$i++){
	
	$pos= substr($players[$i]['Player']['position'], 0, 2);  
	
	print_r($pos);

	print_r($players[$i]['Player']['number']);

}



echo "<br>";

echo $this->Html->link('Add Player',array('controller' => 'players', 'action' => 'add'));

echo "<ol id='players-list'>";
  

for($i=0;$i<5; $i++) {
	echo "<li class='ui-widget-content'>Item ".$i."</li>";
//echo "<div id=hola_".$i.">Hola</div>";	
	
} 

echo "</ol>";

echo "<br>";

print_r($players);

?>

<script>
$(function() {
	$( "#players-list" ).selectable({
  		selected: function( event, ui ) {
			//console.log(event);
			//console.log(ui);
			//$(this).find('option:selected').addClass('new');
			$("#player-list").children(".selected").addClass('new');
			console.log($("#player-list").children(".selected"));
			
  		}
		});
	});
</script>

<style>
  #feedback { font-size: 1.4em; }
  #players-list { background: #14181b; }
  #players-list li:nth-child(odd) {background: #1d2124;!important;}
  #players-list li:nth-child(even) {background: #14181b;!important;}
  #players-list li.new {background: #BBBBBB;}
  #players-list .ui-selecting { background: #FECA40; }
  #players-list .ui-selected { background: #d2d2d2; color: black; }
  #players-list .ui-widget-content:hover {background-color: orange;}
  #players-list { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #players-list li { margin: 0px; padding: 0.4em; height: 18px; }
  #players-list li :hover {background: #AAAAAA; }
  </style>