<?php

namespace App\Controller\Admin;

use Cake\Event\Event;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\View\HelperRegistry;



class OrdersController extends AppController
{

   public $paginate = ['limit' => 10,'order'=>['Orders.id'=>'desc']];
    public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    //$this->loadComponent('Paginator');
    //$this->addHelper('Common');
}

 public function beforeFilter(Event $event){
      parent::beforeFilter($event);
 // $this->viewBuilder()->helpers(['Common']);     
}
   
public function proprice()
{
  if($this->request->is(['post','put']))
    {
      //print_r($this->request->data);
      $this->loadModel('Products');
      $data = $this->Products->find('all')->select(['id','product_price_before_gst'])->where(['id'=>$this->request->data['proid']]);

      echo json_encode($data);

    }
    die;
}
  public function index($parm=null){ 
 $this->viewBuilder()->layout('/Admin/adminheader');
   $this->loadModel('Orders');
     $this->loadModel('Productcarts');
        $this->loadModel('Products');
         $this->loadModel('Users');
         
        $productlist = $this->Products->find();
        $list  = json_decode(json_encode($productlist), true);
        $this->set('productlist',$list);
        
        $userlist = $this->Users->find();
        $listing  = json_decode(json_encode($userlist), true);
         $this->set('userlist',$listing);
         
    if($this->request->is(['post','put']))
    {
         if($this->request->data['order_date_from']!=""){
        $where['order_date >='] = date('Y-m-d',strtotime($this->request->data['order_date_from']));
      } 
        if($this->request->data['order_date_to']!=""){
        $where['order_date <='] =date('Y-m-d',strtotime($this->request->data['order_date_to']));
      }
          if($this->request->data['order_num']!=""){
        $where['order_num'] = $this->request->data['order_num'];
      }
          if($this->request->data['order_user_id']!=""){
        $where['order_user_id'] = $this->request->data['order_user_id'];
      }
         if($this->request->data['order_product_name']!=""){            
        $where['product_id'] = $this->request->data['order_product_name'];
      }
           if($this->request->data['order_status']!=""){
        $where['order_status'] = $this->request->data['order_status'];
      }
      
        if(!empty($where)){
            /*echo "<pre>";
            print_r($where);
            echo "</pre>";*/
            if(@$where['product_id']!=""){
$queryCart = $this->Orders->find()->contain(['Productcarts'])->matching('Productcarts')->where([$where])->order(['Orders.id' => 'DESC']);          
            }else{
$queryCart = $this->Orders->find()->contain(['Productcarts'])->where([$where])->order(['Orders.id' => 'DESC']);
            }
     }
     else{
 $queryCart = $this->Orders->find()->contain(['Productcarts'])->order(['Orders.id' => 'DESC']);
     }     
 }else{

  if($parm!=null)
          {
            $this->set('sparam',$parm);
        $where['order_status'] = $parm;
        $queryCart = $this->Orders->find()->contain(['Productcarts'])->where([$where])->order(['Orders.id' => 'DESC']);
          }
          else{

            $queryCart = $this->Orders->find()->contain(['Productcarts'])->order(['Orders.id' => 'DESC']);  
            }    
    }   
      
        $orders = $this->paginate($queryCart);
             foreach($orders as $ovalue){
                if($ovalue->order_user_id>0){
                $userRecord = $this->Users->find()->where(['id'=>$ovalue->order_user_id]);
                $Usercarts  = json_decode(json_encode($userRecord), true);
                $ovalue->username  = $Usercarts[0]['username'];
                }else{
                $ovalue->username  = 'Admin';  
                }
                
              foreach($ovalue->productcarts as $pcartval){
              $produt= $this->Products->find()->where(['id'=>$pcartval->product_id]);
              $productcarts  = json_decode(json_encode($produt), true);
              $pcartval->pname = @$productcarts[0]['product_name'];
              }
             }

      $this->set(compact('orders'));
      $this->set('_serialize', ['orders']);
  }
  
//________________________________DELIVERY SETTING____________________//

  Public function deliverysetting()
  {
$this->viewBuilder()->layout('/Admin/adminheader');
$this->loadModel('Deliverysettings');
$deliverysetting = $this->Deliverysettings->get(1);

 if($this->request->is(['patch','post','put']))
   {
//pr($this->request->data); 
   $delivery =  $this->Deliverysettings->patchEntity($deliverysetting ,$this->request->data);
   if($this->Deliverysettings->save($delivery))
   {
   $this->Flash->success(__('The Delivery settings has been update.'));
   }
   else {
   $this->Flash->error(__('The Delivery settings  could not be update. Please, try again.'));
        }


   }


$this->set(compact('deliverysetting'));
$this->set('_serialize',['deliverysetting']);

   // $this->Deliverysettings()
  }
  
public function delete($id = null){
    //$this->loadModel('Products');
            $this->viewBuilder()->layout('/Admin/adminheader');
            if (empty($id)) {
                throw new NotFoundException(__('Order id not found'));
            }
            //  if($this->request->allowMethod(['post', 'delete'])){
            $order = $this->Orders->get($id);
            if ($this->Orders->delete($order)) {
                $this->Flash->success(__('The order has been deleted.'));
            } else {
                $this->Flash->error(__('The order could not be deleted. Please, try again.'));
            }
            echo $this->redirect(['controller'=>'orders','action' => 'index']);
         //}else{
             // throw new NotFoundException(__('Method not valid'));
         //}
    }

        public function view($id = null){       
            $this->loadModel('Productcarts');
            $this->loadModel('Products');
            $this->loadModel('Settings');
             $ordersetting =  $this->Settings->find();
             $this->set('setting',$ordersetting);
            $this->viewBuilder()->layout('/Admin/adminheader');
            $this->Orders->recursive = 2;
            $orders= $this->set('orders',$this->Orders->get($id,[
                    'contain'=>['Productcarts.Products']
                    ]));
            $this->set('_serialize', ['orders']);
            
            
        }


       

public function add()
{
    $this->viewBuilder()->layout('/Admin/adminheader');          
    $this->loadModel('Products');
    $data['products'] = $this->Products->find('all')->select(['id','product_name'])->toArray();
   if ($this->request->is('post','put'))
   {
     
    $order = $this->Orders->newEntity();
   $this->request->data['order_date'] = date('Y-m-d H:i:s',strtotime($this->request->data['order_date']));

   if(isset($this->request->data['order_same_billing_detail']))
   { 

$this->request->data['order_delivery_recipient']     = $this->request->data['order_recipient'];
$this->request->data['order_delivery_address_line1'] = $this->request->data['order_address_line1'];
$this->request->data['order_delivery_address_line2']=  $this->request->data['order_address_line2'];
$this->request->data['order_delivery_city'] =          $this->request->data['order_city'];
$this->request->data['order_delivery_postal_code']=     $this->request->data['order_postal_code'];
$this->request->data['order_delivery_phone_num'] =      $this->request->data['order_phone_num'];
      //$this->request->data['order_same_billing_detail'];  $this->request->data['


   }else{

    $this->request->data['order_same_billing_detail'] =0;

   }


   $orderRecord = $this->Orders->patchEntity($order, $this->request->data);
     if($this->Orders->save($orderRecord)){
    $prod['order_id'] = $order->id;


    $this->loadModel('Productcarts');
    if(count($this->request->data['product_id'])>0){  
    for($il=0;$il<count($this->request->data['product_id']);$il++){
       $prod['user_name'] = $this->request->data['order_username'];
       $prod['product_id'] = $this->request->data['product_id'][$il];
       $prod['quantity']   = $this->request->data['quantity'][$il];
       $prod['unit_price'] = $this->request->data['unit_price'][$il];  
       $prod['total_price'] = $this->request->data['unit_price'][$il] * $this->request->data['quantity'][$il]; 
       $productentry =  $this->Productcarts->newEntity();
       $productentry = $this->Productcarts->patchEntity($productentry,$prod);  
    $this->Productcarts->save($productentry);        
    }
 $this->Flash->success(__('The order has been created.'));
 echo $this->redirect(['controller'=>'orders','action' => 'index']);
    }else{
$this->Flash->error(__('The order could not be created. Please, try again.'));
        } 
     }
   }
    $this->loadModel('Settings');
    $setting_query =    $this->Settings->find(); 
    $setting_results = $setting_query->all();
    $data['setting'] = $setting_results->toArray();
           // pr($data); die;
   $this->set(compact('data'));
            $this->set('_serialize', ['data']);
}



public function edit($id = null){
$this->viewBuilder()->layout('/Admin/adminheader');
  $this->loadModel('Productimages');
  $this->loadModel('Productprinters');
  $this->loadModel('Products');
  $this->loadModel('Ordertracks');
    $order = $this->Orders->get($id,[
    'contain'=>['Productcarts']
    ]);
  $order->toArray();
  $order['products'] = $this->Products->find('all')->select(['id','product_name'])->toArray();
  
if($this->request->is(['patch','post','put'])){ 

if(isset($this->request->data['order_same_billing_detail']))
{
$this->request->data['order_delivery_recipient']     = $this->request->data['order_recipient'];
$this->request->data['order_delivery_address_line1'] = $this->request->data['order_address_line1'];
$this->request->data['order_delivery_address_line2']=  $this->request->data['order_address_line2'];
$this->request->data['order_delivery_city'] =          $this->request->data['order_city'];
$this->request->data['order_delivery_postal_code']=     $this->request->data['order_postal_code'];
$this->request->data['order_delivery_phone_num'] =      $this->request->data['order_phone_num'];
   }else{

    $this->request->data['order_same_billing_detail'] =0;

   }
    $order['id'] = $id;
    $this->request->data['order_date'] = date('Y-m-d H:i:s',strtotime($this->request->data['order_date']));
    $order_update = $this->Orders->patchEntity($order,$this->request->data);
 if ($this->Orders->save($order_update)) {
        $lastId = $id;
        
        $ordertracking = $this->Ordertracks->newEntity();
        $ordertrack['order_id'] = $lastId;
        $ordertrack['order_status'] = $this->request->data['order_status'];
        $ordertrack['order_date'] = date('Y-m-d H:i:s',strtotime($this->request->data['order_date']));
        $IsOrderTrackRecord = $this->Ordertracks->patchEntity($ordertracking,$ordertrack);
        $this->Ordertracks->save($IsOrderTrackRecord); 
     
 $produid = @count($this->request->data['product_id']);
     $this->loadModel('Productcarts'); 
        $this->Productcarts->deleteall(['order_id'=>$id]);
        if(isset($this->request->data['product_id']) && $this->request->data['product_id']>0){
    for($mn=0;$mn<count($this->request->data['product_id']);$mn++){
      $prod['order_id'] = $lastId;
       $prod['user_name'] = $this->request->data['order_username'];
       $prod['product_id'] = $this->request->data['product_id'][$mn];
       $prod['quantity']   = $this->request->data['quantity'][$mn];
       $prod['unit_price'] = $this->request->data['unit_price'][$mn];  
       $prod['total_price'] = $this->request->data['unit_price'][$mn] * $this->request->data['quantity'][$mn]; 
      $productentry =  $this->Productcarts->newEntity();
       $productentry = $this->Productcarts->patchEntity($productentry,$prod);  
    $this->Productcarts->save($productentry);        
     } 
      } 
$this->Flash->success(__('This order has been updated')); 
     echo $this->redirect(['controller'=>'orders','action' => 'index']);
   }else{
    $this->Flash->error(__('This order has not been added')); 
  }
}

$this->loadModel('Settings');
$setting_query =    $this->Settings->find(); 
$setting_results = $setting_query->all();
$order['setting'] = $setting_results->toArray();

$this->set(compact('order'));
$this->set('_serialize',['order']);

}

public function delproduct($id = null){
    $this->loadModel('Productcarts');
         if (empty($id)) {
                throw new NotFoundException(__('Order id not found'));
            }
            //  if($this->request->allowMethod(['post', 'delete'])){
             $productcart = $this->Productcarts->find()->where(['product_id'=>$id])->toArray();
            $order = $this->Productcarts->get($productcart[0]['id']);
            if ($this->Productcarts->delete($order)) {
                $this->Flash->success(__('The item has been deleted from cart.'));
            } else {
                $this->Flash->error(__('The item could not be deleted. Please, try again.'));
            }
            echo $this->redirect(['controller'=>'orders','action' => 'edit',$productcart[0]['order_id']]);
}



}
