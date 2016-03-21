<?php
namespace App\Controller;
use App\Form\ContatoForm;

 class ContatoController extends AppController {
	public function index(){
			$contato = new ContatoForm();
			if($this->request->is('post')){
				if($contato->execute($this->request->data())){
					$this->Flash->set(__('Email enviado com sucesso.'), ['element' => 'success']);//dois underline funcao que abilita tradução do texto
				}else{
					$this->Flash->set(__('Falha ao enviar email.'), ['element' => 'error']);
				}
			}
			$this->set('contato',$contato);
	}
}
?>