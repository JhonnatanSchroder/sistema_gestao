<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\ProdutosHandler;

class ProdutoController extends Controller {

    public function cadastrarProduto() {
        $this->render('cadastrar-produto');
    }

    public function cadastrarProdutoPost() {
        $name = $_POST['name'];
        $preco = $_POST['preco'];
        $qtde = $_POST['qtde'];
        $imagem = $_FILES['imagem'];

        if($name && $preco && $qtde) {
            if(isset($imagem)){
                $imagemName  = $this->cutImage($imagem, 200, 200, 'assets/img');
                ProdutosHandler::cadastrarProduto($name, $preco, $qtde, $imagemName);
                $this->redirect('/cadastrar-produto');
            } 
        }
        $this->rendirect('/cadastrar-produto');
    }

    private function cutImage($file, $w, $h, $folder) {

        list($widthOrig, $heigthOrig) = getimagesize($file['tmp_name']);
        $ratio = $widthOrig / $heigthOrig;

        $newWidth = $w;
        $newHeigth = $newWidth / $ratio;

        if($newHeigth < $h) {
            $newHeigth = $h;
            $newWidth = $newHeigth * $ratio;
        }

        $x = $w - $newWidth;
        $y = $h - $newHeigth;
        $x = $x < 0 ? $x / 2 : $x;
        $y = $y < 0 ? $y / 2 : $y;

        $finalImage = imagecreatetruecolor($w, $h);
        switch($file['type']) {
            case 'image/jpeg';
            case 'image/jpg';
                $image  = imagecreatefromjpeg($file['tmp_name']);
            break;
            case 'image/png';
                $image  = imagecreatefrompng($file['tmp_name']);
            break;

        }

        imagecopyresampled(
            $finalImage, $image,
            $x, $y, 0, 0,
            $newWidth, $newHeigth, $widthOrig, $heigthOrig
        );

        $fileName = md5(time().rand(0,9999)).'jpg';

        imagejpeg($finalImage, $folder.'/'.$fileName);

        return $fileName;

    }



}