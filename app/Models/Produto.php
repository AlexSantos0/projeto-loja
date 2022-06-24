<?php

namespace App\Models;

use CodeIgniter\Model;

class Produto extends Model
{
    
     public function index() {

        
         
    }
    public function getByID($id){

        $db = db_connect();
        $builder = $db->table('produto');
        $query = $builder->getWhere(['id'=>$id]);
        return $query->getResultArray();   
    }
    
}