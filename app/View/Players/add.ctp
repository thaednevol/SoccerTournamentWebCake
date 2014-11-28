<h1>Add Post</h1>
<?php

	echo $this->Form->create('Player',array('enctype'=>'multipart/form-data'));
	echo $this->Form->input('name');
	echo $this->Form->input('firstsurname');
	echo $this->Form->input('lastsurname');
	echo $this->Form->input('docid');
	echo $this->Form->input('docidtype', array('options'=>$docidtype));
	echo $this->Form->input('birthdate',array(
        'type' => 'date',
        'label' => 'Date of Birth',
        'dateFormat' => 'MDY',
        'empty' => array(
            'month' => 'Month',
            'day'   => 'Day',
            'year'  => 'Year'
        ),
        'minYear' => date('Y')-90,
        'maxYear' => date('Y')-5,
        'options' => array('1','2')
    ));
	echo $this->Form->input('sex', array('options'=>$sex));
	echo $this->Form->input('back');
	echo $this->Form->input('number');
	echo $this->Form->input('position', array('options'=>$position));
	echo $this->Form->input('foot', array('options'=>$foot));
	echo $this->Form->input('nationality', array('options'=>$nationality));
	echo $this->Form->input('phone');
	echo $this->Form->input('mobile');
	echo $this->Form->input('email');
	echo $this->Form->file("archivo");
	echo $this->Form->end('Save Player');
?>
