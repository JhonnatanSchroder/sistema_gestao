<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\ClientesHandler;

class ClienteController extends Controller {

    public function cadastrarClientes() {
        $flash = '';
        if(isset($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('cadastrar-clientes', ['flash' => $flash]);
    }

    public function cadastrarClientesPost() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];

        if($name && $email && $number){
            ClientesHandler::cadastrarCliente($name, $email, $number);
            $_SESSION['flash'] = "Cliente Cadastrado";
            $this->redirect('/cadastrar-clientes');
        } else {
            $_SESSION['flash'] = "Preencha todos os campos para cadastrar cliente";
        }

    }

    public function visualizarClientes() {
        $data = ClientesHandler::visualizarClientes();

        $this->render('visualizar-clientes', ['clientes' => $data]);
    }

    public function deletarCliente($atts) {
        $id = $atts['id'];

        ClientesHandler::deletarCliente($id);
        $this->redirect('/visualizar-clientes');
    }

    public function editarCliente($atts) {
        $cliente = ClientesHandler::editarCliente($atts['id']);

        $this->render('editar-cliente', ['cliente' => $cliente]);
    }

    public function editarClientePost(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $id = $_POST['id'];

        if($name){
            ClientesHandler::atualizarCliente($name, $email, $number, $id);
        }
    }

}