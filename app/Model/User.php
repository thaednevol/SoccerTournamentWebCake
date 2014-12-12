<?php

class User extends AppModel {
	public $validate = 
	array(
	'name' =>array('rule' => 'notEmpty'),
	'firstsurname' => array('rule' => 'notEmpty'),
	'docid' => array('rule' => 'notEmpty'),
	'sex' =>array('rule' => 'notEmpty'),
	'birthdate' =>array('rule' => 'notEmpty'));
	
	public $name = 'User';
	public $has = array('Players');
	public $has = array('Countries' => array(
            'conditions' => array(
                 'Users.nationality = Countries.id'
             ),
        ));
}
?>