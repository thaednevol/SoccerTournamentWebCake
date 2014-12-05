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

echo "<br>";

print_r($players);

?>
