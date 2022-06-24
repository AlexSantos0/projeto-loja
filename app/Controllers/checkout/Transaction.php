<?php 

namespace App\Controllers\checkout;
use App\Controllers\BaseController;
use PagarMe\Client;

class Transaction extends BaseController{

    private $pagarme;

    public function __construct()
    {
        $this->pagarme = new Client(getenv('API_KEY'));   
        $this->transactions = $this->pagarme->transactions();  
    }
    
    public function newTransaction(){

      try{
      
        $request = \Config\Services::request();
        $data = $request->getPost('data');     
        $valor = floatval($data['valor']);
        $itemsDoData = $data['items'];
        $itemsFormatted = [];

        foreach($itemsDoData as $key => $value){
          $itemsFormatted[] = 
          [
            'id' => '1',
            'title' => $value['title'],
            'unit_price' => $value['unit_price'],
            'quantity' => 1,
            'tangible' => true,
          ];      
        }

        $transacao = $this->transactions->create([
          'amount' => $valor,
          'payment_method' => 'credit_card',
          'card_holder_name' => $data['card_name'],
          'card_cvv' => $data['card_cvv'],
          'card_number' => $data['card_number'],
          'card_expiration_date' => $data['card_exp'],
          'customer' => [
              'external_id' => '1',
              'name' => $data['name'],
              'type' => 'individual',
              'country' => 'br',
              'documents' => [
                [
                  'type' => 'cpf',
                  'number' => $data['number_cpf']
                ]
              ],
              'phone_numbers' => [ '+551199999999' ],
              'email' => $data['email']
          ],
          'billing' => [
              'name' => $data['name'],
              'address' => [
                'country' => 'br',
                'street' => $data['street'],
                'street_number' => '1811',
                'state' => $data['state'],
                'city' => $data['city'],
                'neighborhood' => $data['neighborhood'],
                'zipcode' => $data['cep']
              ]
          ],
          'shipping' => [
              'name' => $data['name'],
              'fee' => 1020,
              'delivery_date' => '2018-09-22',
              'expedited' => false,
              'address' => [
                'country' => 'br',
                'street' => $data['street'],
                'street_number' => '1811',
                'state' => $data['state'],
                'city' => $data['city'],
                'neighborhood' => $data['neighborhood'],
                'zipcode' => $data['cep']
              ]
          ],
          'items' => $itemsFormatted
        ]);
                echo(http_response_code(200));   
      } catch(\Exception $e){
        echo $e->getMessage();
      }
    }
    
}

        