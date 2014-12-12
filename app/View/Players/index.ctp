<?php 

//print_r($players);

print_r($countries[1]);

$count =count($players);


//echo $this->Html->link('Add Player',array('controller' => 'players', 'action' => 'add'));

echo "<div class='players-list'>";

echo "<ol id='players-list'>";
  
for($i=0;$i<$count; $i++) {
	$pos = substr($players[$i]['Player']['position'], 0, 2); 
	$num = $players[$i]['Player']['number'];
	$surname = $players[$i]['Users']['firstsurname'];
	echo "<div class='seleccion' id='pl_".$i."'><li class='ui-widget-content'>".$pos."\t".$num."\t".$surname."</li></div>";
} 

echo "<div class='seleccion'><li class='ui-widget-content'>".$this->Html->link('Add Player',array('controller' => 'players', 'action' => 'add'))."</li></div>";

echo "</ol>";

echo "</div>";

echo "<div class='player-details-list'>";

for($i=0;$i<$count; $i++) {
	$pos = substr($players[$i]['Player']['position'], 0, 2); 
	$num = $players[$i]['Player']['number'];
	$name = $players[$i]['Users']['name'];
	$surname = $players[$i]['Users']['firstsurname'];
	if ($i==0){
		echo "<div class='player-details' id='pldtl_".$i."'>";
		
			echo "<div class='player-image'>";

				echo "<div class='player-image-name'>";
				echo $surname;
				echo "</div>";
		
				echo "<div class='player-photo'>";
				echo "<img src='./img/messi.jpg' alt='API Changelog' >";
				echo "</div>";
		
				echo "<div class='player-image-armory'>";
				echo "<img src='./img/500px-Escudo_FCB.png' alt='API Changelog' >";
				echo "</div>";
		
				echo "<div class='player-image-flag'>";
				echo "<img src='./img/ar-icon-finder.png' alt='API Changelog' >";
				echo "</div>";
			echo "</div>";
			
			echo "<div class='player-detail'>";
				echo "<p><b>Nombre:</b> ".$name." ".$surname."</p>";
				echo "<p><b>Nacimiento:</b> ".$players[$i]['Users']['birthdate']."</p>";
				echo "<p><b>Pie:</b> ".$players[$i]['Player']['foot']."</p>";
				echo "<p><b>Altura:</b> ".$players[$i]['Users']['height']."</p>";
			echo "</div>";
			
			echo "<div class='player-position'>";
				echo "<img src='./img/campo-messi.png' alt='API Changelog' >";
			echo "</div>";
		
		echo "</div>";
		
		
	}
	else {
		echo "<div class='player-details' id='pldtl_".$i."' style='display: none;'><p>".$name."</p><img src='http://lorempixel.com/200/100/' alt='API Changelog' width='44' height='44'></div>";
	}
	
}

echo "</div>";


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
  
  .seleccion:nth-child(odd){ background: #2e3e4d; color: #ecedef; }
  .seleccion:nth-child(even){background: #14181b;color: #ecedef;}
  #players-list { background: #14181b;list-style-type: none; margin: 0; padding: 0; width: 90%;  }
  #players-list .ui-selecting { background: #FECA40; color: #ecedef;}
  #players-list .ui-selected { background: #d2d2d2; color: black; }
  #players-list .ui-widget-content:hover {background: #f5c810;}

  #players-list li { margin: 0px; padding: 0.4em; height: 18px; }
  
  .players-list{
		  float:left;
		  width:50%;
		 
  }
  
  .player-details-list{
  		background:#2e3e4d;
  		width:48%;
  		float:right;
  		border: 1px solid;
    	border-radius: 5px;
  }
  
  .player-image{
  		padding: 2%;
  		background: url(./img/brushed-gold-gradient.jpg);
  		width: 10%;
		overflow: hidden;
		float: left;
		border-bottom-left-radius: 3px;
		border-top-left-radius: 3px;
  }
  
	.player-detail{
		padding-left: 2%;
		padding-top: 2%;
		float:left;
		width: 48%;
		color: whitesmoke;
	} 
	
	.player-position{
		padding-left: 2%;
		padding-top: 2%;
		float:left;
	} 
	
	.player-position img{
		width: 90%;
	}  
  
  .player-image-name{
		font-size: 100%;
		text-align: center;
  }
  
  .player-photo img{
		  width: 100%;
		  height: 100%;
  }

.player-image-armory img{
		  width: 50%;
		  height: 10%;
		  float:left;
  }
  
  .player-image-flag img{
		  width: 50%;
		  height: 10%;
  }
</style>