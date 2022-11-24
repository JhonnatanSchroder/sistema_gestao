<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/profile', "HomeController@profile");

// ROTAS DE CLIENTES 
$router->get('/visualizar-clientes', "ClienteController@visualizarClientes");
$router->post('/visualizar-clientes', "ClienteController@visualizarClientesPost");

$router->get('/cadastrar-clientes', "ClienteController@cadastrarClientes");
$router->post('/cadastrar-clientes', "ClienteController@cadastrarClientesPost");

$router->get('/editar-cliente/{id}', "ClienteController@editarCliente");
$router->post('/editar-cliente', "ClienteController@editarClientePost");

$router->get('/deletar-clientes/{id}', "ClienteController@deletarCliente");

// ROTAS PAGAMENTOS
$router->get('/visualizar-pagamentos', "FinanceiroController@visualizarPagamentos");
$router->post('/adicionar-pagamento', "FinanceiroController@AdicionarPagamento");

$router->post('/ordenar-pagamentos', "FinanceiroController@ordenarPagamentos");

$router->get('/deletar-pagamento/{id}', "FinanceiroController@deletarPagamento");

$router->get('/marcar-pago/{id}', "FinanceiroController@marcarPago");

// ROTAS DE CONTROLE DE ESTOQUE
$router->get('/cadastrar-produto', "ProdutoController@cadastrarProduto");
$router->post('/cadastrar-produto', "ProdutoController@cadastrarProdutoPost");
