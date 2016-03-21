<?php
	namespace App\Model\Table;
	
	use Cake\ORM\Table;
	use Cake\Validation\Validator;
	
	// não esquecer de configurar as informaçoes do banco no arquivo app.php na pasta config!
	class ProdutosTable extends Table{
		//metodo pra validação dos campos do formulario de cadastro de produto
		public function validationDefault(Validator $validator){
			$validator->requirePresence('nome',true)->notEmpty('nome');
			//$validator->requirePresence('preco',true)->notEmpty('preco');
			//$validator->requirePresence('descricao',true)->notEmpty('descricao');
			
			//passar comportamento ao campo descrição
			$validator->add('descricao',[
				'minLength' => [
					'rule' => ['minLength',10],//precisa de ao menos 10 caracteres para ser aceito.
					'message' => 'A descrição deve conter ao menos dez caracteres'
				] 
			]);
			// $validator->add('preco',[
				// 'decimal' => [
					// 'rule' => ['decimal',2],
					// 'message' => 'Digite um numero decimal separado por ponto(.)'
				// ]
			// ]);
			return $validator;
		}
	}
?>