<table class="table">
	<thead>
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('Nome'); ?></th>
			<th><?= __('Preço'); ?></th>
			<th><?= __('Preço com desconto'); ?></th>
			<th><?= __('Descrição'); ?></th>
			<th><?= __('Ações'); ?></th>
		</tr>		
	</thead>
	<tbody>
		<?php foreach($produtos as $produto) {?>
		<tr>
			<td><?= $produto['id']?></td>
			<td><?= $produto['nome']?></td>
			<td><?= $this->Money->format($produto['preco']);?></td>
			<td><?= $this->Money->format($produto->calculaDesconto());?></td>
			<td><?= $produto['descricao']?></td>
			<td>
				<?php 
					echo $this->Html->Link('Editar', ['controller' => 'produtos', 'action' => 'editar',$produto['id']]); 
				?>
				<?php 
					echo $this->Form->postLink('Deletar', ['controller' => 'produtos', 'action' => 'deletar',$produto['id']],['confirm' => 
					__('Tem certeza que deseja deletar o produto '). $produto['nome'].' ?']); 
				?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
	<?php
		echo $this->Html->Link(__('Novo Produto'), ['controller' => 'produtos', 'action' => 'novo']);
		echo " "; 
		echo $this->Html->Link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']);
	?>
	<!--<a href="produtos/novo">Novo produto</a>-->
	<div class="paginator">
		<ul class= "pagination">
				<?php
					echo $this->Paginator->prev(__('Voltar'));
					echo $this->Paginator->numbers();
					echo $this->Paginator->next(__('Avançar'));
				?>
		</ul>	
	</div>
	