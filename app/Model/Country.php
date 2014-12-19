<?php

class Country extends AppModel {
	public $actsAs = array('Containable');	
	
	public $name = 'Country';
	
	public $belongsTo = array('Users' => array(
             'conditions' => array(
                 'User.nationality = Country.id'
             ),
        ));
	
	
}
?>