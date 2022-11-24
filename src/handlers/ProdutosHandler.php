<?php
namespace src\handlers;
use \src\models\Produto;

class ProdutosHandler {
	public static function imagemValida($imagem){
        if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png'){
            $tamanho = intval($imagem['size']/1024);
            if($tamanho < 1080)
                return true;
            else
                return false;   
        } else {
            return false;
        }
    }

    public static function cadastrarProduto($name, $preco, $qtde, $imagem){
        Produto::insert([
            'name' => $name,
            'preco' => $preco,
            'quantidade' => $qtde,
            'imagem' => $imagem,
        ])->execute();

    }

    
}