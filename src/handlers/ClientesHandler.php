<?php
namespace src\handlers;
use \src\models\Cliente;

class ClientesHandler {
	public static function cadastrarCliente($name, $email, $number) {
		Cliente::insert([
			'name' => $name,
			'email' => $email,
			'number' => $number
		])->execute();
	}

	public static function visualizarClientes(){
		$clientes = Cliente::select()->execute();
		return $clientes;
	}

	public static function deletarCliente($id){
		Cliente::delete()->where('id', $id)->execute();

		$clientes = Cliente::select()->execute();
	}

	public static function editarCliente($id) {
		$cliente = Cliente::select()->where('id', $id)->one();
		return $cliente;
	}

	public static function atualizarCliente($name, $email, $number, $id){
		Cliente::update()
			->set('name', $name)
			->set('email', $email)
			->set('number', $number)
			->where('id', $id)
		->execute();

		echo "<div class='alert alert-success'>Cliente Atualizado!</div>";
	}
}