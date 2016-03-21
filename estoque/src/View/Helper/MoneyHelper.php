<?php
namespace App\View\Helper;
use Cake\View\Helper;

class MoneyHelper extends Helper{
	public function format($number){
		return "R$". number_format($number,2, ",",".");// NÃO ESQUECER de alterar a function initialize no arquivo AppView na pasta View.!!!
	}
}
?>