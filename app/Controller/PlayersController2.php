<?php

class PlayersController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');
	//public $uses = array('Users', 'Players');
	
	public function index() {
		
		//$this->Player->recursive = 2;		
		
		$this->loadModel('Country');
		$this->loadModel('User');
		$this->Player->Behaviors->attach('Containable');
		$this->User->Behaviors->attach('Containable');
		$this->set('players', $this->Player->find('all',  array(
    				'contain'=>array('User'=>array('Countries'))
    				)));
		//$this->set('users', $this->User->find('all'));
		//,array('fields' => array('Users.nationality', 'countries.id'))
		/*$pl = $this->Player->find('all');
		
		$this->Player->find('all',  array('conditions'=>array('User.id'=>5)));
		
		print_r();		
		
		
array(
                'recursive' => 2,
                'conditions' => array('users.nationality' => 'countries.id'))		
		
		*/
		
		//$this->set('countries', $this->Country->find('all'));
	}
	
	public function addEnums($name, $modelo){
		$this->loadModel($modelo);
		
		$type = $this->$modelo->getColumnType($name);		
		preg_match_all("/'(.*?)'/", $type, $enums);
		foreach ($enums[1] as $n){
			$data[$n]=$n;		
		}
		
		$this->set($name, $data);
	}	
	
	public function add() {
		$this->addEnums('sex','User');
		$this->addEnums('docidtype','User');
		$this->addEnums('nationality', 'User');
		$this->addEnums('position', 'Player');		
		$this->addEnums('foot', 'Player');
		
		if ($this->request->is('post')) {
			$this->loadModel('User');
			
			$this->User->create();
			
			$datosUsuario=$this->request->data['Player'];
			
			$usuario['name']=$datosUsuario['name'];
			$usuario['firstsurname']=$datosUsuario['firstsurname'];
			$usuario['lastsurname']=$datosUsuario['lastsurname'];
			$usuario['docid']=$datosUsuario['docid'];
			$usuario['docidtype']=$datosUsuario['docidtype'];
			$usuario['birthdate']=$datosUsuario['birthdate'];
			$usuario['sex']=$datosUsuario['sex'];
			$usuario['nationality']=$datosUsuario['nationality'];
			$usuario['mobile']=$datosUsuario['mobile'];
			$usuario['phone']=$datosUsuario['phone'];
			$usuario['email']=$datosUsuario['email'];
			$usuario['image']="";
			
			$file=$datosUsuario['archivo'];
			
			if($file['error']==0){
					 if($file['size']<100000){
					 		$dir='../webroot/files/archivos/';
     						$name=explode('.',$file['name']);
     						$h=count($name);
     						move_uploaded_file($file['tmp_name'],$dir.$usuario['name'].".".$name[$h-1]);
     						$usuario['image']=$usuario['name'].".".$name[$h-1];
					 }
				}
				
				$this->User->save($usuario);
				$id=$this->User->getLastInsertID();
				
				$jugador['users_id']=$id;
				$jugador['foot']=$datosUsuario['foot'];
				$jugador['position']=$datosUsuario['position'];
				$jugador['back']=$datosUsuario['back'];
				$jugador['number']=$datosUsuario['number'];
			
			
			
			if ($this->Player->save($jugador)) {
				$this->Session->setFlash(__('Your player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your post.'));
		}

	}
	
	

}

?>