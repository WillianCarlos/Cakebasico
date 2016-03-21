<?php
echo $this->Flash->render('auth');//exibir  mensagem  dizendo que não tem acesso sem estar logado
?>
<h2>Acesso ao sistema</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button('Logar');
echo $this->Form->end();
?>