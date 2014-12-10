<?php 

//print_r($players);

$count =count($players);

echo "<div class='player-details-list'>";

for($i=0;$i<$count; $i++) {
	$pos = substr($players[$i]['Player']['position'], 0, 2); 
	$num = $players[$i]['Player']['number'];
	$firstname = $players[$i]['Users']['name'];
	$surname = $players[$i]['Users']['firstsurname'];
	if ($i==0){
		echo "<div class='player-details' id='pldtl_".$i."'><p>".$firstname."</p><img src='./img/messi.jpg' alt='API Changelog' width='44' height='44'></div>";
	}
	else {
		echo "<div class='player-details' id='pldtl_".$i."' style='display: none;'><p>".$firstname."</p><img src='http://lorempixel.com/200/100/' alt='API Changelog' width='44' height='44'></div>";
	}
	
}

echo "</div>";

echo "<br>";

//echo $this->Html->link('Add Player',array('controller' => 'players', 'action' => 'add'));

echo "<ol id='players-list'>";
  

for($i=0;$i<$count; $i++) {
	$pos = substr($players[$i]['Player']['position'], 0, 2); 
	$num = $players[$i]['Player']['number'];
	$surname = $players[$i]['Users']['firstsurname'];
	echo "<div class='seleccion' id='pl_".$i."'><li class='ui-widget-content'>".$pos."\t".$num."\t".$surname."</li></div>";
} 

echo "<div class='seleccion'><li class='ui-widget-content'>".$this->Html->link('Add Player',array('controller' => 'players', 'action' => 'add'))."</li></div>";

echo "</ol>";

echo "<br>";

print_r($players);

?>

<script>
$(function() {
	$( "#players-list" ).selectable({
  		selecting: function( event, ui ) {
  			var id=$('.ui-selecting').attr('id').split("_")[1];
  			console.log(id);
  		$( ".player-details").each(function() {
  			var res = this.id.split("_")[1];
  			
  			if (res===id){
  				$("#pldtl_"+res).css('display','');
  			}
  			else{
  				$("#pldtl_"+res).css('display','none');
  			}
		});
  			
  		}
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
  #players-list { list-style-type: none; margin: 0; padding: 0; width: 50%; }
  #players-list li { margin: 0px; padding: 0.4em; height: 18px; }
  
  .player-details-list{
  		background:#c4c9ca;
  		width:50%;
  		
  }

</style>