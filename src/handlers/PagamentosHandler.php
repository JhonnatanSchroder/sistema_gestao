<?php
namespace src\handlers;

use \src\Config;
use \src\models\Pagamento;

class PagamentosHandler {

	public static function adicionarPagamento($name, $clienteName, $id, $valor, $vencimento, $parcelas){
		$vencimentoOriginal = $vencimento;
		
		for ($i=0; $i < $parcelas ; $i++) { 
			$vencimento = strtotime($vencimentoOriginal) + (($i * 30) * (60*60*24));
			Pagamento::insert([
				'name' => $name,
				'client_id' => $id,
				'cliente_name' => $clienteName,
				'valor' => round((intval($valor) / $parcelas), 2),
				'vencimento' => date('Y-m-d', $vencimento),
				'status' => 0
			])->execute();
		}
	}

	public static function visualizarPagamentos(){
		$pagamentos = Pagamento::select()->orderBy('id', 'desc')->execute();
		return $pagamentos;
		
	}

	public static function pagamentosConcluidos(){
		$pagamentos = Pagamento::select()->where('status', 1)->limit(20)->execute();
		return $pagamentos;
	}

	public static function pagamentosPendentes(){
		$pagamentos = Pagamento::select()->where('status', 0)->limit(20)->execute();
		return $pagamentos;
	}

	public static function deletarPagamento($id){
		Pagamento::delete()->where('id', $id)->execute();
	}

	public static function marcarPago($id) {
		Pagamento::update()->set('status', 1)->where('id', $id)->execute();
	}
}