<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\PagamentosHandler;

class FinanceiroController extends Controller {

   public function visualizarPagamentos(){
      $flash = '';
      if(isset($_SESSION['flash'])){
          $flash = $_SESSION['flash'];
          $_SESSION['flash'] = '';
      }
      
      $pagamentosConcluidos = PagamentosHandler::PagamentosConcluidos();
      $pagamentosPendentes = PagamentosHandler::PagamentosPendentes();

      $this->render('visualizar-pagamentos', [
         'pagamentosC' => $pagamentosConcluidos,
          'pagamentosP' => $pagamentosPendentes
      ]);
   }

   public function adicionarPagamento(){
      $name = $_POST['name'];
      $clienteName = $_POST['cliente_name'];
      $id = $_POST['cliente_id'];
      $valor = $_POST['valor'];
      $vencimento = $_POST['vencimento'];
      $parcelas = $_POST['parcelas'];

      if($name && $clienteName && $valor && $vencimento){
         PagamentosHandler::adicionarPagamento($name, $clienteName, $id, $valor, $vencimento, $parcelas);
         $_SESSION['flash'] = 'Pagamento Adicionado';
         $this->redirect('/visualizar-clientes');
      } else {
         $_SESSION['flash'] = 'Preencha os campos necessarios para adicionar Pagamento';
         $this->rendirect('/visualizar-pagamentos');
      }
   }

   public function deletarPagamento($atts) {
      echo 'ofjd';
      $id = $atts['id'];
      PagamentosHandler::deletarPagamento($id);

      $this->redirect('/visualizar-pagamentos');
   }

   public function marcarPago($atts){
      $id = $atts['id'];

      PagamentosHandler::marcarPago($id);
      $this->redirect('/visualizar-pagamentos');
   }

}