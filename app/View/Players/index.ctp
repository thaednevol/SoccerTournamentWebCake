<?php 

//print_r($players);

$count =count($players);

echo "<br>";

echo $this->Html->link('Add Player',array('controller' => 'players', 'action' => 'add'));

echo "<ol id='players-list'>";
  

for($i=0;$i<$count; $i++) {
	$pos = substr($players[$i]['Player']['position'], 0, 2); 
	$num = $players[$i]['Player']['number'];
	$surname = $players[$i]['Users']['firstsurname'];
	echo "<div class='seleccion'><li class='ui-widget-content'>".$pos."\t".$num."\t".$surname."</li></div>";
} 

echo "</ol>";

echo "<br>";

print_r($players);

?>

<script>
$(function() {
	$( "#players-list" ).selectable({
  		selected: function( event, ui ) {console.log(this);}
		});
	});

</script>

<style>
  #feedback { font-size: 1.4em; }
  #players-list { background: #14181b; }
  .seleccion:nth-child(odd){ background: #1d2124; color: #ecedef;}
  .seleccion:nth-child(even){background: #14181b;color: #ecedef;}
  
  #players-list .ui-selecting { background: #FECA40; color: #ecedef;}
  #players-list .ui-selected { background: #d2d2d2; color: black; }
  #players-list .ui-widget-content:hover {background: #f5c810;}
  #players-list { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #players-list li { margin: 0px; padding: 0.4em; height: 18px; }

</style>