<?php echo $this->Html->css('style'); ?>

<?php 

print_r($players);

echo $this->Html->link('Add Player',array('controller' => 'players', 'action' => 'add')); 

?>
