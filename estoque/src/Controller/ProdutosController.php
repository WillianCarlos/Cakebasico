<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;//SEMPRE que USAR banco de dados DEVE se fazer a referencia ao ORM

//startar o cake server na pasta bin do projeto sempre que iniciar
class ProdutosController extends AppController{
	public $paginate = [
		'limit' => 2
	];
	public function initialize(){
		parent::initialize();
		$this->loadComponent('Paginator');
		$this->loadComponent('Csrf');
	}
	public function index(){
		$produtosTable = TableRegistry::get('Produtos');
		$produtos = $produtosTable->find('all'); 
		/*$produtos[] = ["id" => 1, 
					"nome" => "Hd de 20 gigas", 
					"preco" => 29.99, 
					"descricao" => "Hd muito bom da marca Mega-HD"];	
		$produtos[] = ["id" => 2, "nome" => "Playstation", "preco" => 999.99,"descricao" => "Video game muito bom para passar o tempo"]; não vem do banco*/				
		//Para o conteudo de uma variavel para uma view precisamos usar o metodo set('label',variavel).
		$this->set('produtos',$this->paginate($produtos));
	}
	public function novo(){
		$produtosTable = TableRegistry::get('Produtos');//Referenciando formato do registro
		$produto = $produtosTable->newEntity(); //Passar um registro vazio para o formulario
		$this->set('produto',$produto);
	}
	public function editar($id){
		$produtosTable = TableRegistry::get('Produtos');			
		$produto = $produtosTable->get($id);
		$this->set('produto',$produto);
		$this->render('novo');
	}
	public function deletar($id){
		$produtosTable = TableRegistry::get('Produtos');
		$produto = $produtosTable->get($id);
		if($produtosTable->delete($produto)){
			$msg = __("Produto removido com sucesso");
			$this->Flash->set($msg, ['element' => 'error']);
		}else{
			$msg = __("Erro ao deletar o Produto");
			$this->Flash->set($msg);
		} 
		$this->redirect('/produtos/index');
	}
	public function salva(){
		$produtosTable = TableRegistry::get('Produtos');
		$produto = $produtosTable->newEntity($this->request->data());
		
		//faz a verficação de erros do formulario e se foi salvo o produto(para verificar erros a programação tem que ser implementado na classe ProdutosTable)
		if(!$produto->errors() && $produtosTable->save($produto)){
			$msg = __("Produto salvo com sucesso");
			$this->Flash->set($msg,['element' => 'success']);
		}else{
			$msg = __("Erro ao salvar o Produto");
			$this->Flash->set($msg,['element' => 'error']);
		}
		//$this->set('msg',$msg)não muda mais de pagina pois o flash scope ja mostra a msg!
		//$this->redirect('/produtos/index');
	
		$this->set('produto',$produto); //necessario retornar um produto pois eh chamado no formulario caso tenha que recarregar as informações ao campo quando houver erro
		$this->render('novo');
		//$this->redirect('/produtos/novo');
	}
}
?>