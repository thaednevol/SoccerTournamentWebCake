<?php

class Player extends AppModel {
	public $actsAs = array('Containable');	
	
	public $validate = 
	array(
	'name' =>array('rule' => 'notEmpty'),
	'firstsurname' => array('rule' => 'notEmpty'),
	'docid' => array('rule' => 'notEmpty'),
	'sex' =>array('rule' => 'notEmpty'));
	
	public $name = 'Player';
	public $belongsTo = array('Users');
}
?>