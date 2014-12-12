<?php

class Country extends AppModel {
	public $name = 'Country';
	
	public $belongsTo = array('Users' => array(
            'foreignKey' => false,
             'conditions' => array(
                 'Users.nationality = Country.id'
             ),
        ));
	
	
}
?>