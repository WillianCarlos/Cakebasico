<?php
	 echo $this->Form->create($produto,['url' => ['action' => 'salva']]);
	 echo $this->Form->input('id');	
	 echo $this->Form->input('nome');
	 echo $this->Form->input('preco');
	 echo $this->Form->input('descricao');
	 echo $this->Form->button('Salvar');
	 echo $this->Form->end();
	 echo $this->Html->Link('Voltar a Home', ['controller' => 'produtos', 'action' => 'index']);
?>