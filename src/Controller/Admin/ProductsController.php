<?php

namespace App\Controller\Admin;

use Cake\Event\Event;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Brand;
use App\Model\Entity\Product;
use Cake\Network\Exception\NotFoundException;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


class ProductsController extends AppController
{

  public $paginate = ['limit' => 10];
  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow('delete');
  }

  public function index(){
    $this->viewBuilder()->layout('/Admin/adminheader');
    if($this->request->is(['patch','post','put']))
    {
      if($this->request->data['brand']!=""){

        $where['brand_id'] = $this->request->data['brand'];
      } 
      if($this->request->data['type']!=""){
        $where['product_type'] = $this->request->data['type'];
      }
      if($this->request->data['color']!=""){
        $where['product_color'] = $this->request->data['color'];
      }
      if($this->request->data['cartridge']!=""){
        $where['product_catridge_type'] = $this->request->data['cartridge'];
      }
      if($this->request->data['product_est_yield']!=""){
        $where['product_est_yield'] = $this->request->data['product_est_yield'];
      }
      if($this->request->data['product_name']!=""){
        $where['product_name'] = $this->request->data['product_name'];
      }
      if(empty($where))
      {
       $query = $this->Products->find('all')->order(['id' => 'DESC']);

     }
     else{

       $query = $this->Products->find()->where($where)->order(['id' => 'DESC']);

     }

   }else{
    $query = $this->Products->find('all')->order(['id' => 'DESC']);

  }

  $products = $this->paginate($query);

  $this->loadModel('Settings');
  $setting_query =    $this->Settings->find(); 
  $setting_results = $setting_query->all();
  $products->setting = $setting_results->toArray();

  $this->set(compact('products'));
  $this->set('_serialize', ['products']);

} 

public function removesetting()
{
  $this->loadModel('Settings');
  if(isset($this->request->data['name']) && isset($this->request->data['name']) && $this->request->data['name'] !="" && $this->request->data['type'] !="")
      {
     $id = $this->Settings->find()->select(['id'])->where(['name'=>$this->request->data['name'] , 'type'=>$this->request->data['type']]);

$data = json_decode(json_encode($id),true);
//echo $data[0]['id'];
         // $query = $this->Settings->get()->where(['name'=>$this->request->data['name'] , 'type'=>$this->request->data['type']]);
$del = $this->Settings->get($data[0]['id']);
         $this->Settings->delete($del);
        // $this->Settings->delete()->where(['name'=>$this->request->data['name'] , 'type'=>$this->request->data['type']]);
 $response  =  $this->Settings->find('all')->where(['type'=>$this->request->data['type']]);
    echo  json_encode($response);
      }
      die;

}

public function addsetting()
{
  $this->loadModel('Settings');
if(isset($this->request->data['name']) && isset($this->request->data['name']) && $this->request->data['name'] !="" && $this->request->data['type'] !="")
{
   $set  =  $this->Settings->newEntity();
  $data = $this->Settings->patchEntity($set, $this->request->data);
  if($this->Settings->save($data))
  {
     $response  =  $this->Settings->find('all')->where(['type'=>$this->request->data['type']]);
    echo  json_encode($response);
  
  }
  //print_r($this->request->data);
}
  
  

  die;
}

public function getprinters()
{
  $this->loadModel('Printers');
  $printer['alldata']  =   $this->Printers->find('all')->toArray();


  $this->loadModel('Settings');
  $setting_query =    $this->Settings->find(); 
  $setting_results = $setting_query->all();
  $printer['setting']  = $setting_results->toArray(); 

  if(isset($this->request->data['pro_id']))
  {
    $this->loadModel('Productprinters');
    $proId = $this->request->data['pro_id'];
    $printer['sprinter'] = $this->Productprinters->find()->where(array('product_id'=>$proId));
  }
                
  echo json_encode($printer);
  die;

} 

public function printersearch()
{
  if($this->request->is(['patch','post','put']))
  {
   $search = $_POST['search'];

  $this->loadModel('Printers');
  $printer['alldata']  =   $this->Printers->find('all')->where(array('printer_name like'=>$search.'%'))->toArray();

  if(isset($this->request->data['pro_id']))
  {

    
    $this->loadModel('Productprinters');
    $proId = $this->request->data['pro_id'];
    $printer['sprinter'] = $this->Productprinters->find()->where(array('product_id'=>$proId));
  }

  $this->loadModel('Settings');
  $setting_query =    $this->Settings->find(); 
  $setting_results = $setting_query->all();
  $printer['setting']  = $setting_results->toArray(); 
    echo json_encode($printer);

  }
 

  die;
}

public function edit($id = null){
$this->viewBuilder()->layout('/Admin/adminheader');

  $this->loadModel('Productimages');
  $this->loadModel('Productprinters');
  $product = $this->Products->get($id,[
    'contain'=>['Productimages','Productprinters']
    ]);//->toArray();
  $product->toArray(); 
  
  $this->loadModel('Printers');

  $printer_query  =   $this->Printers->find();
  $printer_result =     $printer_query->all();
  $product['printer'] =  $printer_result->toArray();

   $this->loadModel('Settings');
 $setting_query =    $this->Settings->find(); 
 $setting_results = $setting_query->all();
 $data['setting'] = $setting_results->toArray();
 
  
  if($this->request->is(['patch','post','put'])){




if(isset($this->request->data['changeimg']))
{
  $chgimg  = array_unique($this->request->data['changeimg']);
  for($l=0; $l<count($chgimg); $l++)
  {
    $del =  $this->Productimages->get($chgimg[$l]);
    $file = new File(WWW_ROOT . 'img/product/'.$del->image, false, 0777);
    if($file->delete()) {
    // echo 'image deleted.....';
    }
  
     $this->Productimages->delete($del);

  }
}


  for($i=0; $i  < count($this->request->data['product_image']); $i++)
  {
    
     if( $this->request->data['product_image'][$i]['name']!="" )
     {
      $one2 = $this->request->data['product_image'][$i];
      $this->request->data['product_image'][$i] = date('Y-m-d-H-i-s') . '_' . uniqid().'.'.pathinfo($one2['name'], PATHINFO_EXTENSION);

      if ($one2['error'] == '0') {
        $pth2 =  WWW_ROOT.'img'.DS.'product' . DS . $this->request->data['product_image'][$i];
        move_uploaded_file($one2['tmp_name'], $pth2);
      }
      $productImages['Productimages']['product_id']  = $id;
      $productImages['Productimages']['image'] = $this->request->data['product_image'][$i];
      $productImages['Productimages']['status'] = 1;

      $PI = $this->Productimages->newEntity();
      $PI = $this->Productimages->patchEntity($PI, $productImages);
      if($this->Productimages->save($PI)){
     }
   }
 }

 $printer['product_id'] = $id;

    $prnt =  $this->Productprinters->find()->where(array('product_id'=>$id)); 
   $prnt_count =  $prnt->count();
   if($prnt_count==0)
   {
    for($j=0; $j < count($this->request->data['printer_id']); $j++)
      {

          $printer['printer_id'] =  $this->request->data['printer_id'][$j];
        
        $printer_query = $this->Productprinters->newEntity();
        $printer_query = $this->Productprinters->patchEntity($printer_query,$printer);
        if($this->Productprinters->save($printer_query))
        {
        
        }
      } 

   }
   else
   {
    if($this->Productprinters->deleteall($printer))
    {

      for($j=0; $j < count($this->request->data['printer_id']); $j++)
      {

          $printer['printer_id'] =  $this->request->data['printer_id'][$j];
       
        $printer_query = $this->Productprinters->newEntity();
        $printer_query = $this->Productprinters->patchEntity($printer_query,$printer);
        if($this->Productprinters->save($printer_query))
        {
         
        }
      } 
    }
    } 
 $this->request->data['product_keywords'] = rtrim($this->request->data['product_keywords'], ", ");  


    $product_update = $this->Products->patchEntity($product,$this->request->data);
    if ($this->Products->save($product_update)) {
      $lastId = $id;
$this->Flash->success(__('This product has been updated')); 

     echo $this->redirect(['controller'=>'Products','action' => 'index']);

    //  if($lastId>0){
     //    for($i=0; $i<count($this->request->data['product_image']); $i++){

     //      $one = $this->request->data['product_image'][$i];


     //      $this->request->data['product_image'] = time().$i .'.' . pathinfo($one['name'], PATHINFO_EXTENSION);

     //      if ($one['error'] == '0') {
     //        $pth2 =  WWW_ROOT.'img'.DS.'product' . DS . $this->request->data['product_image'];
     //        move_uploaded_file($one['tmp_name'], $pth2);
     //      }
     //      $productImages['Productimages']['product_id']  = $lastId;
     //      $productImages['Productimages']['image'] = $this->request->data['product_image'];
     //      $productImages['Productimages']['status'] = 1;
     //      pr($productImages);
     //      pr($product->productimages);
          

     //      $PI = $this->Productimages->patchEntity($product->productimages, $productImages);
     //      if($this->Productimages->save($PI)){
     //       $this->Flash->success(__('This product has been updated')); 
     //     }else{
     //       $this->Flash->error(__('This product has not been updated')); 
     //     }
     //   }
     // }

   }else{
    $this->Flash->error(__('This product has not been added')); 

  }
}
$this->loadModel('Settings');
$setting_query =    $this->Settings->find(); 
$setting_results = $setting_query->all();
$product['setting'] = $setting_results->toArray();



$this->set(compact('product'));
$this->set('_serialize',['product']);

}

public function delete($id = null)
{ 
  $this->viewBuilder()->layout('/Admin/adminheader');
  if (empty($id)) {
    throw new NotFoundException(__('Article not found'));
  }
  $product = $this->Products->get($id);
  if ($this->Products->delete($product)) {
    $this->Flash->success(__('The Product has been deleted.'));
  } else {
    $this->Flash->error(__('The Product could not be deleted. Please, try again.'));
  }

  return $this->redirect(['action' => 'index']);
}

function getValue($id){
  $this->loadModel('Settings');
  $setting = $this->Settings->find()->where(['id'=>$id])->toArray();
  return $setting;
}


public function view($id = null)
{
  $this->viewBuilder()->layout('/Admin/adminheader');
  $products = $this->Products->get($id ,[
    'contain'=>['Productimages','Productprinters']
    ]);

  $this->loadModel('Printers');

  $printer_query  =   $this->Printers->find();
  $printer_result =     $printer_query->all();
  $products['printer'] =  $printer_result->toArray();

 $this->loadModel('Settings');
 $setting_query =    $this->Settings->find(); 
 $setting_results = $setting_query->all();
 $products['setting'] = $setting_results->toArray();
 

  $record = $this->getValue($products->brand_id);
  $this->set('brand',$record[0]['name']);
 
 $type = $this->getValue($products->product_type); 
  $this->set('type',$type[0]['name']);
  
  $record = $this->getValue($products->brand_id);
  $this->set('brand',$record[0]['name']);
  
  $color = $this->getValue($products->product_color);
  $this->set('color',$color[0]['name']);
  
  $catridgetype = $this->getValue($products->product_catridge_type);
  $this->set('catridgetype',$catridgetype[0]['name']);
    
  $inventoryava = $this->getValue($products->product_inventory_availability);
  $this->set('inventoryava',$inventoryava[0]['name']);
   
  $pcompatability = $this->getValue($products->product_compatability);
  $this->set('pcompatability',$pcompatability[0]['name']);
  
 $pwarranty = $this->getValue($products->product_warranty);
  $this->set('pwarranty',@$pwarranty[0]['name']);
  
 $pusage = $this->getValue($products->product_usage);
 if(isset($pusage[0]['name']))
 {
  $this->set('pusage',$pusage[0]['name']);
  }
  $this->set(compact('products'));
  $this->set('_serialize', ['products']);

}



public function add()
{
  $this->loadModel('Productimages');
  $this->loadModel('Productprinters');
      

  if ($this->request->is('post','put')) {

    $product = $this->Products->newEntity();
$this->request->data['product_keywords'] = rtrim($this->request->data['product_keywords'], ", ");

    $productsrecord = $this->Products->patchEntity($product, $this->request->data);
    if($this->Products->save($productsrecord)){
            $this->Flash->success(__('This product has been added')); 

      $cdd = $productsrecord->id;
      $lastId = $product->id;
      if($lastId>0){
        for($j=0; $j<count($this->request->data['printer_id']); $j++)
        {
          $productPrinters['product_id']  = $lastId;
          $productPrinters['printer_id'] = $this->request->data['printer_id'][$j]; 
          $PR = $this->Productprinters->newEntity();
          $PR = $this->Productprinters->patchEntity($PR, $productPrinters);
          if($this->Productprinters->save($PR))
          {

          }
        }
        for($i=0; $i< count($this->request->data['product_image']); $i++)
        {
         if($this->request->data['product_image'][$i]['name']!="")
         {
            $one2 = $this->request->data['product_image'][$i];
            $this->request->data['product_image'][$i] = date('Y-m-d-H-i-s') . '_' . uniqid().'.'.pathinfo($one2['name'], PATHINFO_EXTENSION);

            if ($one2['error'] == '0') {
              $pth2 =  WWW_ROOT.'img'.DS.'product' . DS . $this->request->data['product_image'][$i];
              move_uploaded_file($one2['tmp_name'], $pth2);
            }
            $productImages['Productimages']['product_id']  = $lastId;
            $productImages['Productimages']['image'] = $this->request->data['product_image'][$i];
            $productImages['Productimages']['status'] = 1;

            $PI = $this->Productimages->newEntity();
            $PI = $this->Productimages->patchEntity($PI, $productImages);
            if($this->Productimages->save($PI)){
           }

          }
       }
 
     }
   }else{
             $this->Flash->error(__('This product has not been added')); 
           }
   echo $this->redirect(['controller' => 'products','action' => 'index']); 
 }

 $this->viewBuilder()->layout('/Admin/adminheader'); 

 $this->loadModel('Settings');
 $setting_query =    $this->Settings->find(); 
 $setting_results = $setting_query->all();
 $data['setting'] = $setting_results->toArray();

 $this->loadModel('Printers');

 $printer_query  =   $this->Printers->find();
 $printer_result =     $printer_query->all();
 $data['printer'] =  $printer_result->toArray();


 $this->set(compact('data'));
 $this->set('_serialize', ['data']);
}
public function printer()
{

  $this->loadModel('Printerimages'); 
  $this->loadModel('Printers'); 
  $this->viewBuilder()->layout('/Admin/adminheader');
  $this->loadModel('Settings');
  $setting_query =    $this->Settings->find(); 
  $setting_results = $setting_query->all();
  $data['setting'] = $setting_results->toArray(); 
  $this->set(compact('data'));
  $this->set('_serialize', ['data']);

  if ($this->request->is('post','put'))
  {

    $printer = $this->Printers->newEntity();
    $printer = $this->Printers->patchEntity($printer, $this->request->data);
    if ($this->Printers->save($printer)) {
     $lastId = $printer->id;
     if($lastId>0){
      for($i=0; $i<count($this->request->data['printer_image']); $i++){

        $one2 = $this->request->data['printer_image'][$i];
        $this->request->data['printer_image'] = time().$i .'.' . pathinfo($one2['name'], PATHINFO_EXTENSION);

        if ($one2['error'] == '0') {
          $pth2 =  WWW_ROOT.'img'.DS.'printer' . DS . $this->request->data['printer_image'];
          move_uploaded_file($one2['tmp_name'], $pth2);
        }
        $printerImages['Printerimages']['printer_id']  = $lastId;
        $printerImages['Printerimages']['image'] = $this->request->data['printer_image'];
        $printerImages['Printerimages']['status'] = 1;

        $PI = $this->Printerimages->newEntity();
        $PI = $this->Printerimages->patchEntity($PI, $printerImages);
        if($this->Printerimages->save($PI)){
         $this->Flash->success(__('This Printer has been added')); 
         echo $this->redirect('/admin/products/add');
       }else{
         $this->Flash->error(__('This Printer has not been added')); 
       }
     }
   }
 }
}
}

public function editprinter($id = null)
{
  $this->loadModel('Printers');
//echo $id; 
  $this->viewBuilder()->layout('/Admin/adminheader');
  $data = $this->Printers->get($id,[
    'contain'=>['Printerimages']
    ]);

  $this->loadModel('Settings');
  $setting_query =    $this->Settings->find(); 
  $setting_results = $setting_query->all();
  $data['setting'] = $setting_results->toArray(); 
  $this->set(compact('data'));
  $this->set('_serialize', ['data']);

  if($this->request->is(['patch','post','put'])){
    //print_r($_POST);
    $product_update = $this->Printers->patchEntity($data,$this->request->data);
    if ($this->Printers->save($product_update)) {
     echo $this->redirect(['controller'=>'Products','action' => 'add']);

   }

 }

}

public function deleteprinter($id = null)
{
 $this->loadModel('Printers');
 $this->viewBuilder()->layout('/Admin/adminheader');
 if (empty($id)) {
  throw new NotFoundException(__('Article not found'));
}
$printer = $this->Printers->get($id);
if ($this->Printers->delete($printer)) {
  $this->Flash->success(__('The printer has been deleted.'));
} else {
  $this->Flash->error(__('The printer could not be deleted. Please, try again.'));
}

echo $this->redirect(['action' => 'add']);

}





}