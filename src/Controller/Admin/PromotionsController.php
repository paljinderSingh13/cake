<?php

namespace App\Controller\Admin;

use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Event\Event;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Brand;
use App\Model\Entity\Product;
use Cake\Network\Exception\NotFoundException;


class PromotionsController extends AppController
{

    public $paginate = ['limit' => 10,
    'order'=>['Promotions.id'=>'desc']
    ];
 public function beforeFilter(Event $event)
 {
  parent::beforeFilter($event);
  $this->Auth->allow('delete');
 }

 public function index(){
  $this->viewBuilder()->layout('/Admin/adminheader');
  if($this->request->is(['post']))
  {
    $formData = $this->request->data;
    //pr($this->request->data);
    if($formData['from']!='')
    {
      $where['promo_from >='] = date('Y-m-d', strtotime($formData['from']));
    }
    if($formData['to']!='')
    {
      $where['promo_to <='] =  date('Y-m-d', strtotime($formData['to'])); 
    }
    if($formData['promotion']!='')
    {
      $where['promotion like'] = $formData['promotion'].'%';
    }
    if(empty($where))
    {
             $query = $this->Promotions->find('all')->contain(['Productpromotions.Products']);

    }
    else{
    
      $query = $this->Promotions->find()->contain(['Productpromotions.Products'])->where($where);

    }
   

// $this->promotions->find()->where())
  }
  else{
       $query = $this->Promotions->find('all')->contain(['Productpromotions.Products']);
      }
      $promotions =  $this->paginate($query);
    $this->set(compact('promotions'));
    $this->set('_serialize', ['promotions']); 
 }  

 public function edit($id = null){

  $this->loadModel('Productpromotions');

  $promotion = $this->Promotions->get($id,[
   'contain'=>['Productpromotions']
   ]); 

  $this->loadModel('Settings');
  $setting_query =    $this->Settings->find(); 
  $setting_results = $setting_query->all();
  $promotion['setting'] = $setting_results->toArray();  

  $this->loadModel('Products');
  $product = $this->Products->find('all');
  $promotion['product'] = $product->toArray(); 



  $this->viewBuilder()->layout('/Admin/adminheader');
  if($this->request->is(['patch','post','put'])){

// echo "<pre>";
//     pr($this->request->data);

    $this->request->data['promo_from'] = date('Y-m-d', strtotime($this->request->data['promo_from']));

    $this->request->data['promo_to'] = date('Y-m-d', strtotime($this->request->data['promo_to']));
   // [promo_to] => 7/31/16


   $prom =  $this->Productpromotions->find()->where(array('promotion_id'=>$id)); 
   $prom_count =  $prom->count();
   if($prom_count==0)
   {
    $pro_promo['promotion_id'] = $id;
    $pro_promo['status'] =1; 
     if(isset($this->request->data['product_id']) && $this->request->data['product_id']>0){
    for($j=0; $j<count($this->request->data['product_id']); $j++)
    {
       $pro_promo['product_id'] = $this->request->data['product_id'][$j]; 
       $pro_promo['status'] =1;

     $PR = $this->Productpromotions->newEntity();
     $PR = $this->Productpromotions->patchEntity($PR, $pro_promo);
     if($this->Productpromotions->save($PR))
     {
      //$this->Flash->success(__('This promotion has been added')); 
     }else{
      $this->Flash->error(__('This promotion has not been added'));

     }
    }
   }
   }else if ($this->Productpromotions->deleteAll(array('promotion_id'=>$id))){ 
     $pro_promo['status'] =1; 
    $pro_promo['promotion_id'] = $id; 
     if(isset($this->request->data['product_id']) && $this->request->data['product_id']>0){
    for($j=0; $j<count($this->request->data['product_id']); $j++)
    {
       $pro_promo['product_id'] = $this->request->data['product_id'][$j]; 


     $PR = $this->Productpromotions->newEntity();
     $PR = $this->Productpromotions->patchEntity($PR, $pro_promo);
     if($this->Productpromotions->save($PR))
     {
      //$this->Flash->success(__('This promotion has been added')); 
     }else{
      $this->Flash->error(__('This promotion has not been added'));

     }
    }  
   }
  }
  if(isset($this->request->data['promotion_image']) && $this->request->data['promotion_image'][0]['name'] !='' ){
     $one2 = $this->request->data['promotion_image'][0];
                $this->request->data['promo_banner'] = time().'.' . pathinfo($one2['name'], PATHINFO_EXTENSION);
                        
                        if ($one2['error'] == '0') {
                            $pth2 =  WWW_ROOT.'img'.DS.'promotion' . DS . $this->request->data['promo_banner'];
                            move_uploaded_file($one2['tmp_name'], $pth2);
                        }
}
   $promotion = $this->Promotions->patchEntity($promotion,$this->request->data);
   if($this->Promotions->save($promotion)){
    $this->Flash->success(__('This promotion has been updated'));
  //   $this->render();
    echo $this->redirect(['controller'=>'Promotions' ,'action'=>'index']);
   }else{
    $this->Flash->error(__('This promotion could not be updated. Please, try again.'));
   }
  }

  $this->set(compact('promotion'));
  $this->set('_serialize',['promotion']);

 }

 public function delete($id = null)
            { //$this->loadModel('Products');
            $this->viewBuilder()->layout('/Admin/adminheader');
            if (empty($id)) {
             throw new NotFoundException(__('Article not found'));
            }
                //$this->request->allowMethod(['post', 'delete']);


            $promotion = $this->Promotions->get($id);
            if ($this->Promotions->delete($promotion)) {
             $this->Flash->success(__('The user has been deleted.'));
            } else {
             $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
           }

           public function view($id = null){
            $this->loadModel('Productpromotions');
            $this->viewBuilder()->layout('/Admin/adminheader');

            $promotion = $this->Promotions->get($id,['contain'=>'Productpromotions']);
              $this->loadModel('Products');
             $product = $this->Products->find('all');
             $promotion['product'] = $product->toArray(); 

             $this->loadModel('Settings');
             $setting_query =    $this->Settings->find(); 
             $setting_results = $setting_query->all();
             $promotion['setting'] = $setting_results->toArray(); 


            $promotion = $this->set(compact('promotion'));
            $this->set('_serialize', ['promotion']);  
           }
           
       public function searchproductbydate() {
        if (isset($this->data->request['from'])) {
            echo $this->data->request['from'];
        }
        die();
    }

    public function getproducts() {
        if (isset($this->request->data['promotion_id'])) {
            $this->loadModel('Productpromotions');
            $Pro = $this->Promotions->get($this->request->data['promotion_id'], [
                'contain' => ['Productpromotions']
            ]);
        }
        $this->loadModel('Products');
        $this->loadModel('Productpromotions');
        $Pro['product'] = $this->Products->find('all')->toArray();
        $date = date('Y-m-d H:i:s');
        //$Pro['product'] = $this->Products->find('all');->contain(['Productpromotions'])->notMatching('Productpromotions')->toArray();
        $this->loadModel('Settings');
        $setting_query = $this->Settings->find();
        $setting_results = $setting_query->all();
        $Pro['setting'] = $setting_results->toArray();
        echo json_encode($Pro);
        die;
    }

            public function productsearch()
            {
           // array('conditions'=>array('Tape.name LIKE'=>'blondie%')));
              $this->loadModel('Products');

               if(isset($_POST['edit']))
               {
                  $this->loadModel('Productpromotions');
                $Pro = $this->Promotions->get($this->request->data['promotion_id'],[
                 'contain'=>['Productpromotions']
                 ]); 



               }


              $Pro['product'] = $this->Products->find()->where(array("product_name LIKE"=>$_POST['pro_name'].'%'))->toArray();

             $this->loadModel('Settings');
             $setting_query =    $this->Settings->find(); 
             $setting_results = $setting_query->all();
             $Pro['setting']  = $setting_results->toArray(); 
               //echo "<pre>";
              // print_r($_POST);
              echo json_encode($Pro);
             die;
            }



           public function promotions()
           {
            $this->loadModel('Promotions');
            $this->viewBuilder()->layout('/Admin/adminheader'); 
            if ($this->request->is('post','put')) {
             print_r($_POST);

             $promotion = $this->Promotions->newEntity();

             $promotion = $this->Promotions->patchEntity($promotion, $_POST);
             $this->Promotions->save($promotion);
             die();
            }

           }
//____________________________To add promotion_______________________//

           public function add()
           {
            Configure::write('debug', 2);
            $this->loadModel('Productpromotions');
            $this->loadModel('Products');
            $product = $this->Products->find('all');
            $data['product'] = $product->toArray();
            if ($this->request->is('post','put'))
            {
$this->request->data['promo_from']   = date('Y-m-d',strtotime($this->request->data['promo_from']));

$this->request->data['promo_to']   = date('Y-m-d',strtotime($this->request->data['promo_to']));
if($this->request->data['promotion_image'][0]['name']!='')
{
             $one2 = $this->request->data['promotion_image'][0];
                $this->request->data['promo_banner'] = time().'.' . pathinfo($one2['name'], PATHINFO_EXTENSION);
                        
                        if ($one2['error'] == '0') {
                            $pth2 =  WWW_ROOT.'img'.DS.'promotion' . DS . $this->request->data['promo_banner'];
                            move_uploaded_file($one2['tmp_name'], $pth2);
                        }

}
else{ unset($this->request->data['promo_banner']); }
                        
              $promotion = $this->Promotions->newEntity();
             $promotion = $this->Promotions->patchEntity($promotion, $this->request->data);
             if($this->Promotions->save($promotion)){
              $pro_promo['promotion_id'] =  $promotion->id; 
              $pro_promo['status'] =1; 
              for($j=0; $j<count($this->request->data['product_id']); $j++)
              {
               $pro_promo['product_id'] = $this->request->data['product_id'][$j]; 
             //  $pro_promo['is_sale_clearance'] = 1; 
               $PR = $this->Productpromotions->newEntity();
               $PR = $this->Productpromotions->patchEntity($PR, $pro_promo);
               if($this->Productpromotions->save($PR))
               {
//               $productdetail = $this->Products->get($this->request->data['product_id'][$j]);
//               $Prod = $this->Products->patchEntity($Prod,$productdetail);
//               $Prod['is_sale_clearance'] = '1';
//               $this->Products->save($Prod);
               }else{

               }
              }
            }
             $this->Flash->success(__('This promotion has been added')); 

             return $this->redirect(['action' => 'index']);
            }
           
            $this->viewBuilder()->layout('/Admin/adminheader'); 

            $this->loadModel('Settings');
            $setting_query =    $this->Settings->find(); 
            $setting_results = $setting_query->all();
            $data['setting'] = $setting_results->toArray();          
            $this->set(compact('data'));
            $this->set('_serialize', ['data']);
           }
          }
