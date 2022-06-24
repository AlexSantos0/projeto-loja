<?php


namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProdutosModel;


class Home extends BaseController{

    private $produtoModel;


    public function __construct()
    {
        
        $this->produtoModel = new ProdutosModel();
    }

    public function index(){
        
        echo view('template/header');
        echo view('home',[
            'produto'=> $this->produtoModel->findAll()
            

        ]);
        echo view('template/footer');
    }

    
}