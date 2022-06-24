<?php 

namespace App\Controllers\checkout;
use App\Controllers\BaseController;
use App\Models\Produto;



class Payment extends BaseController{
    private $produto;

    public function __construct()
    {
        $this->produto = new Produto();
        
    }
    
    public function index(){
        echo view('template/header');        
        echo view('pagamentos',[
            'items'=> $this->resumoPedido()
        ]);  
        echo view('template/footer');
    }

    public function resumoPedido(){
        $request = \Config\Services::request();  
        $ids = $request->getGet('produtoid');  
            
        $items = [];        
        foreach($ids as $id){
            $item = $this->produto->getById($id);
            array_push($items ,$item);
        }
        return $items;
   
    }


}
