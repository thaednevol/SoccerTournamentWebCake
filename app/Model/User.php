<?php

class User extends AppModel {
	public $actsAs = array('Containable');	
	
	public $validate = 
	array(
	'name' =>array('rule' => 'notEmpty'),
	'firstsurname' => array('rule' => 'notEmpty'),
	'docid' => array('rule' => 'notEmpty'),
	'sex' =>array('rule' => 'notEmpty'),
	'birthdate' =>array('rule' => 'notEmpty'));
	
	public $name = 'Users';
	public $has = array('Players','Countries' => array(
            'conditions' => array(
                 'Users.nationality = Countries.id'
             )));
	
}
?>