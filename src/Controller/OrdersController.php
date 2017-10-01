<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use Cake\ORM\Query;
use App\Model\Entity\Order;
use Cake\View\ViewBuilder;
use Cake\Datasource\EntityInterface;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class OrdersController extends AppController
{
    public $helpers = ['Form'];
    public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
}

 public function beforeFilter(Event $event){
      parent::beforeFilter($event);
       $this->Auth->allow(['appPurchasingOrderDetail','appCreateOrder','appTrackingOrder','appPurchasingOrder','mypurchase']);
}

//my purchase 
public function mypurchase()
{
     $this->loadModel('Orders');
     $this->loadModel('Users');
     $order =$this->Orders->find('all')->contain('Productcarts.Users')->where(['order_user_id'=>12]);

 $this->set([ 'message' => $order,
            '_serialize' => ['message']
                    ]);
}

//App create order
Public function appCreateOrder(){
    Configure::write('debug',2);
    $this->loadModel('Products');
    $data['products'] = $this->Products->find('all')->select(['id','product_name'])->toArray();
    $this->loadModel('Productcarts');
    $this->loadModel('Deliveryaddress');
 if($this->request->is('post') && ($this->request->data)){
if(isset($this->request->data['user_id']) && !empty($this->request->data['user_id'])){
    if(isset($this->request->data['delivery_id']) && !empty($this->request->data['delivery_id'])){
       if(isset($this->request->data['transaction_id']) && !empty($this->request->data['transaction_id'])){
         if(isset($this->request->data['total_amount']) && !empty($this->request->data['total_amount'])){
            if(isset($this->request->data['delivery_by']) && !empty($this->request->data['delivery_by'])){
   $AddressRecord = $this->Deliveryaddress->find()->select(['fullname','address','country','postalcode','phone'])->where(['id'=>$this->request->data['delivery_id']])->toArray();        
  
 $order = $this->Orders->newEntity();
   $this->request->data['order_user_id'] = $this->request->data['user_id'];
   $this->request->data['order_transaction_id'] = $this->request->data['transaction_id'];
   $this->request->data['order_username'] = $AddressRecord[0]['fullname'];
   /* if($this->request->data['order_promocode'] == ""){
          $this->request->data['order_promocode'] = "";
          }
*/
   $this->request->data['order_date'] = date('Y-m-d H:i:s');
   $this->request->data['order_recipient'] = $AddressRecord[0]['fullname'];
   $this->request->data['order_address_line1'] = $AddressRecord[0]['address'];
   $this->request->data['order_country'] = $AddressRecord[0]['country'];
   $this->request->data['order_postal_code'] = $AddressRecord[0]['postalcode'];
   $this->request->data['order_phone_num'] = $AddressRecord[0]['phone'];
   $this->request->data['order_total'] = $this->request->data['total_amount'];
   $this->request->data['order_from'] = "1";
   $this->request->data['order_deliveryby'] = $this->request->data['delivery_by'];
   @$this->request->data['order_deliverybytime'] = $this->request->data['delivery_by_time'];
   $orderRecord = $this->Orders->patchEntity($order, $this->request->data);
     if($this->Orders->save($orderRecord)){
        $prod['order_id'] = $order->id;
        $orderid =array();
        if($prod['order_id']>0){
            $orderid['order_id'] = $prod['order_id'];
        }else{
            $orderid['order_id'] = 0 ;
        }
        if($prod['order_id']>0){     
        $userid = $this->request->data['user_id'];
         $query = $this->Productcarts->query();
                    $query->update()
                    ->set(['order_id' => $prod['order_id']])
                    ->where(['user_id' => $this->request->data['user_id'],'order_id'=>'0'])
                    ->execute();
   $arrdetail['error'] = '0';
   $arrdetail['order_id'] = $orderid;  
   $arrdetail['response'] = 'Order completed successfully';  
        }
     }else{
    $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Order not completed, Please try again'; 
     }
   }
    else{
              $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Delivery option not choose';  
    }
    
    }else{
       $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Total amount id is missing';   
    }
       }else{
    $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Transaction id is missing';    
       }
     }else{
    $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Delivery id is missing';   
       }
     }else{
     $arrdetail['error'] = '1';
   $arrdetail['response'] = 'User id is missing';    
     }
    }else{
  $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Parameters are missing'; 
    }
       $this->set([ 'message' => $arrdetail,
            '_serialize' => ['message']
                    ]);
 }
 
 
 // Purchasing Order
   public function appPurchasingOrder(){
    $this->loadModel('Orders');
    $this->loadModel('Productcarts');
        
     if($this->request->is('post') && ($this->request->data)){
     $limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
      $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;

       $this->paginate = [
       'limit' => $limit,
       'page'=>$page
       ];
        if(isset($this->request->data['user_id']) && $this->request->data['user_id']!=''){
           $OrderRecord = $this->Orders 
                        ->find('all')
                        ->select(['Orders.id','Orders.order_transaction_id','Orders.order_address_line1','Orders.order_address_line2','Orders.order_date','Orders.order_total','Orders.order_status'])
                        ->where([
                            'Orders.order_user_id ='=>$this->request->data['user_id'],
                        ]);
            $response = $this->paginate($OrderRecord);
            if(count($response)>0){
        $arrdetail['error'] = '0';
        $arrdetail['response'] = $response; 
        $arrdetail['TotalRecord'] = $this->request->params['paging']['Orders']['count'];
		$arrdetail['TotalPageCount'] = $this->request->params['paging']['Orders']['pageCount'];
		$arrdetail['CurrentPage'] = $this->request->params['paging']['Orders']['page'];    
            }else{
            $arrdetail['error'] = '1';
            $arrdetail['response'] = 'This user have no made any order'; 
            }  
        }else{
        $arrdetail['error'] = '1';
        $arrdetail['response'] = 'User id is missing'; 
             }
          }else{
        $arrdetail['error'] = '1';
        $arrdetail['response'] = 'Parameters are missing';   
     }
     
         $this->set([ 'message' => $arrdetail,
            '_serialize' => ['message']
                    ]);  
    
   }
   
   //App purchasing detail as per order id
 
   public function appPurchasingOrderDetail(){
     $this->loadModel('Orders');
     $this->loadModel('Productcarts');
     $this->loadModel('Products');
     $this->loadModel('Settings');
     if($this->request->is('post') && ($this->request->data)){
     $limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
      $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;

       $this->paginate = [
       'limit' => $limit,
       'page'=>$page
       ];
        if(isset($this->request->data['order_id']) && $this->request->data['order_id']!=''){
           $OrderRecord = $this->Orders 
                        ->find('all')
                        //->select(['Orders.order_transaction_id','Orders.order_address_line1','Orders.order_address_line2','Orders.order_date','Orders.order_total','Orders.order_status'])       
                        ->contain(['Productcarts'])
                        ->where([
                            'Orders.id ='=>$this->request->data['order_id'],
                        ])
                        ->toArray();
            if(count($OrderRecord)>0){
                $arrPurchase = array();
                $arrPurchase['order_transaction_id'] = $OrderRecord[0]['order_transaction_id'];
                $arrPurchase['order_address_line1'] = $OrderRecord[0]['order_address_line1'];
                $arrPurchase['order_address_line2'] = $OrderRecord[0]['order_address_line2'];
                $arrPurchase['order_date'] = $OrderRecord[0]['order_date'];
             
                 if(isset($OrderRecord[0]['order_shipping_cost'])!=''){
                $arrPurchase['order_shipping_cost'] = $OrderRecord[0]['order_shipping_cost'];
                 }else{
                 $arrPurchase['order_shipping_cost'] = "";
                 }
                if(isset($OrderRecord[0]['order_estimated_tax'])!=''){
                $arrPurchase['order_estimated_tax'] = $OrderRecord[0]['order_estimated_tax'];   
                }else{
                  $arrPurchase['order_estimated_tax'] = '';
                }
                $arrPurchase['order_total'] = $OrderRecord[0]['order_total'];
                
                $productcarts =  $OrderRecord[0]['productcarts'];
                $productc = array();
                foreach($productcarts as $pkey=>$pvalue){
                $pc['product_id']  = $pvalue->product_id;
                $productdetail = $this->Products->find()->where(['id'=>$pc['product_id']])->toArray();
                if(isset($productdetail[0]['product_name']))
                {
                $pc['name'] = $productdetail[0]['product_name'];
                }
                $sett = $this->Settings->find()->where(['id'=>$productdetail[0]['product_color']])->toArray();
                 $pc['color'] = $sett[0]['name'];
                $pc['quantity']  = $pvalue->quantity;
                $pc['unit_price'] = $pvalue->unit_price;
                $pc['total_price'] = $pvalue->total_price;
                $productc[] = $pc;
                }
                $arrPurchase['items'] = $productc;  
                 $arrdetail['error'] = '0';
                 $arrdetail['response'] = $arrPurchase;    
            }else{
            $arrdetail['error'] = '1';
            $arrdetail['response'] = 'This user have no made any order'; 
            }  
        }else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Order id is missing'; 
        }
     }else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Parameters are missing';   
     }
     
         $this->set([ 'message' => $arrdetail,
            '_serialize' => ['message']
                    ]);  
   }
   
  //Tracking order
  Public function appTrackingOrder(){

if($this->request->is('post') && !empty($this->request->data['order_id'])){
    $this->loadModel('Orders');
  $query =  $this->Orders->find()->select(['Orders.id', 'Orders.order_total', 'Orders.order_date' ,'Orders.order_address_line1', 'Orders.order_address_line2', 'Orders.order_city', 'Orders.order_country', 'Orders.order_postal_code'])->contain(['Ordertracks'])->where(array('id'=>$this->request->data['order_id']));

  $arrdetail['error'] = '0';
  $arrdetail['response'] = $query; 

  foreach ($query as  $value) {
    $value->order_date  = date('jS F Y', strtotime($value->order_date));

    foreach ($value->ordertracks as  $val) {
      # code...
          $val->order_date  = date('jS F Y', strtotime($val->order_date));

    }
  }

}else{

  $arrdetail['error'] = '1';
 $arrdetail['response'] = "Parameters are missing "; 
}

    // $track  = $this->OrderTracks->newEntity();
    // $track  = $this->OrderTracks->patchEntity($track);

    // if($this->OrderTracks->save($track, $this->request->data))
    // {
    //   $arrdetail['error'] = '0';
    //   $arrdetail['response'] = 'Parameters are missing';
    // }
    
    $this->set([ 'message' => $arrdetail,
            '_serialize' => ['message']
                    ]);
  }
  
}
