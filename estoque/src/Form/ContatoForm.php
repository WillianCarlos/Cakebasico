<?php
namespace App\Form;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Network\Email\Email;

class ContatoForm extends Form{
	//metodo para definir campos do formulario
	public function _buildSchema(Schema $schema){
		$schema->addField('nome', 'string');
		$schema->addField('email', 'string');
		$schema->addField('msg', 'text');
		
		return $schema;
	}
	
	public function _buildValidator(Validator $validator){
		$validator->add('msg',[
			'minLength' => [
				'rule' => ['minLength',10],
				'message' => 'A mensagem precisa ter 10 letras'
			]
		]);
		//nao deixar os campos vazios
		$validator->notEmpty('nome');
		$validator->notEmpty('email');
		return $validator;
	}
	
	public function execute(array $data){
		//necessita configuras as informações de email no app.php em src
		$email = new Email('gmail');
		$email->to('willcarlos1988@gmail.com');
		$email->subject('Contato feito pelo site');  
		$msg = "Contato feito pelo site: 
				Nome: {$data['nome']}
				Email: {$data['email']}
				Mensagem: {$data['msg']}
		";
		return $email->send($msg);
	}
}
?>