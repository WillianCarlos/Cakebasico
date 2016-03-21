<h2>Formulário de Contato</h2>	
<?php

	echo $this->Form->create($contato);	
	 echo $this->Form->input('nome');
	 echo $this->Form->input('email');
	 echo $this->Form->input('msg');
	 echo $this->Form->button('Enviar');
	 echo $this->Form->end();
	 echo $this->Html->Link('Voltar a Home', ['controller' => 'produtos', 'action' => 'index']);
?>