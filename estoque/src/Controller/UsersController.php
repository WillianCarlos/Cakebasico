<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class UsersController extends AppController{
	//metodo que ocorre antes da autenticação para poder liberar o redirecionamento para cadastrar usuarios no banco
	public function beforeFilter(Event $event){
		parent::beforeFilter($event);//contrutor da classe pai(AppController) pai que também tem esse metodo.
		$this->Auth->allow(['adicionar','salvar']);//ações que deve ser liberadas
	}
	
	public function adicionar(){
		$userTable = TableRegistry::get('Users');
		$user = $userTable->newEntity();
		$this->set('user',$user);
	}
	
	public function salvar(){
		$userTable = TableRegistry::get('Users');
		$user = $userTable->newEntity($this->request->data());
		if($userTable->save($user)){
			$this->Flash->set('Usuário cadastrado com sucesso');
		}else{
			$this->Flash->set('Não foi possivel cadastrar o usuário');
		}
		$this->redirect('/users/adicionar');
	}
	
	public function login(){
		if($this->request->is('post')){
			$user = $this->Auth->identify();//pegar usuario
			if($user){
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}else{
				$this->Flash->set('Usuário ou senha invalidos', ['element' => 'error']);
			}	
		}	
	}
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}
}


?>