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
use Cake\Utility\Inflector;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Product;
use Cake\Mailer\Email;
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
class ProductsController extends AppController
{
   public $helpers = ['Form'];
   public function initialize()
   {
       parent::initialize();
       $this->loadComponent('RequestHandler');
       $this->loadComponent('Flash');
       $this->loadComponent('Paginator');
   //$this->loadComponent('Common');
   }

   public function beforeFilter(Event $event){
     parent::beforeFilter($event);
     $this->Auth->allow(['appBrandListing','appUpdateCartDetail','appShowProduct','appHomepage','appShowSalesProduct','appProductdetail','appShowPrinterWithProduct','appShowPrinterWithBrandid','appShowProductWithPrinter','appAddtocart','showCartrecords','appRemoveCartitem','appPromocode','appShowPrinterWithBrandid','productSearch']);
 }

 public function index(){

    $users = $this->Users->find('all');
    $this->set(compact('products'));
     //   $this->set('users',$this->Users->find('all'));
      // pr($this->Users->find('all'));
}

   //_________START product list__________________________//

public function productSearch()
{

if($this->request->is('post'))
   {
      $limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
       $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;

       $this->paginate = [
       'limit' => $limit,
       'page'=>$page
       ];
 $this->loadModel('Products');
       $query = $this->Products
       ->find()->select(['id','product_name','product_type','product_part_num','product_color','product_catridge_type','product_est_yield','product_stock_qty'])
       ->contain(['Productimages'])     
       ->matching('Productimages')
       ->where([
           'Products.product_name like' => '%'.$this->request->data['keyword'].'%'
           ]);
       $response =  $this->paginate($query);

       $arrdetail['error'] = '0';
       $arrdetail['response'] = $response; 
   }
   else{

       $arrdetail['error'] = '1';
       $arrdetail['response'] = "Parameter Missing"; 
   }

   $this->set([
       'message' => $arrdetail,
       '_serialize' => 'message'
       ]); 

}

//_________END product list__________________________//
/*******************************************************App Functions*********************************************/

//Type lising
   //exmaple : type:brand
Public function  appBrandListing(){   
   $this->loadModel('Settings');
   if($this->request->is('post')){
       $BrandTable = $this->Settings->find('all')->where(['type'=>'brand']);
       if(count($BrandTable)>0){
          $arrdetail['error'] = '0';
          $arrdetail['response'] = "Brand List";
          $arrdetail['brandList'] = $BrandTable;
      }else{
          $arrdetail['error'] = '1';
          $arrdetail['response'] = 'Record not found,try later'; 
      }
  }else{
      $arrdetail['error'] = '1';
      $arrdetail['response'] = 'Parameters are missing'; 
  }

  $this->set([
   'message' => $arrdetail,
   '_serialize' => 'message'
   ]);       

}

   //Show Product per Brand
Public function appShowProduct(){
 $this->loadModel('Products');
 $this->loadModel('Productimages');
 $productRecord = array();
 if($this->request->is('post') && (!empty($this->request->data))){

   $limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
   $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;
   if(isset($this->request->data['brandid']) && (!empty($this->request->data['brandid']))){
      $brandid = $this->request->data['brandid'];
      $this->paginate = [
      'conditions'=> ['Products.brand_id ='=>$brandid], 
      'limit' => $limit,
      'order' => [
      'Products.name' => 'asc'
      ],
      'page'=>$page
      ];
      $productRecord = $this->paginate($this->Products);
      $productArr = array();
      $CountImage = array();
      if(!empty($productRecord)){
       foreach($productRecord as $pkey=>$pvalue){
           $product['id'] = $pvalue->id;
           $product['product_name'] = $pvalue->product_name;
           $product['brand_id'] = $pvalue->brand_id;
           $product['price'] = $pvalue->product_price_before_gst; 
           $productArr[] = $product;
       } 
   }else{
       $arrdetail['error'] = '1';
       $arrdetail['response'] = 'No Product of this brand';

   }
   $arrdetail['error'] = '0';
   $arrdetail['response'] = 'Product Listing';
   $arrdetail['listing'] = $productArr;
   $arrdetail['TotalRecord'] = $this->request->params['paging']['Products']['count'];
   $arrdetail['TotalPageCount'] = $this->request->params['paging']['Products']['pageCount'];
   $arrdetail['CurrentPage'] = $this->request->params['paging']['Products']['page'];      
}else{
  $arrdetail['error'] = '1';
  $arrdetail['response'] = 'Brand id is missing'; 
}

}else{
  $arrdetail['error'] = '1';
  $arrdetail['response'] = 'Parameters are missing'; 
}
$this->set([
   'message' => $arrdetail,
   '_serialize' => 'message'
   ]); 
}


public function appHomepage(){
   $this->loadModel('Pages');
   $this->loadModel('Products');
   $productRecord = array();
   if($this->request->is('post')){
       $bannerArr =$this->Pages->find('all',[
           'conditions'=>['OR'=>[
           ['Pages.page_banner1 !=' => ''],
           ['Pages.page_banner2 !=' => ''],
           ['Pages.page_banner3 !=' => '']
           ],
           'AND'=>[
           ['Pages.page_status ='=>'1']
           ]      
           ],
           'fields'=>['page_banner1','page_banner2','page_banner3']
           ]);
       $bannerArrS=array();
       foreach($bannerArr as $bkey=>$bvalue){
           if(!empty($bvalue->page_banner1)){    
               $banner[] = $this->request->scheme().'://'. $this->request->host().$this->request->base.DS.'img'.DS.'banner' . DS . $bvalue->page_banner1;
           }

           if(!empty($bvalue->page_banner2)){    
               $banner[] = $this->request->scheme().'://'.$this->request->host().$this->request->base.DS.'img'.DS.'banner' . DS . $bvalue->page_banner2;
           }
           
           if(!empty($bvalue->page_banner3)){    
               $banner[] = $this->request->scheme().'://'.$this->request->host().$this->request->base.DS.'img'.DS.'banner' . DS . $bvalue->page_banner3;
           }

       }

       if($this->request->is('post')){  
           $productRecord = $this->Products->find('all',['conditions'=>[],
            'order' => [
            'Products.id' => 'desc'
            ],
            'limit'=>8
            ]);
           $productArr = array();
           if(!empty($productRecord)){
              $this->loadModel('Productimages');
              foreach($productRecord as $pkey=>$pvalue){     
               $product['id'] = $pvalue->id;
               $product['product_name'] = $pvalue->product_name;
               $product['price'] = $pvalue->product_price_before_gst;
               $productImages = $this->Productimages->find('all',['conditions'=>[
                   ['Productimages.product_id = '=>$pvalue->id]
                   ],
                   'fields'=>['Productimages.id','Productimages.product_id','Productimages.image'],
                   'limit'=>1
                   ]);

               $product['image'] = "";   
               foreach($productImages as $pikey=>$pivalue){
                   if(!empty($pivalue->image)){
               //localhost/DBR/img/product/14662622120.png
                       $product['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'product' . DS . $pivalue->image;
                   }else{
                       $product['image'] = "";   
                   }

               }
               $productArr[] = $product;
           }

       }else{
           $arrdetail['error'] = '1';
           $productArr = 'No Product Found';

       }
       $arrdetail['error'] = '0';
       $arrdetail['banner'] = $banner;
       $arrdetail['showSalesClearanceProduct'] = $productArr;
       $arrdetail['showLatestProduct'] = $productArr;     
   }

}else{
   $arrdetail['error'] = '1';
   $arrdetail['banner'] = 'Please try again'; 
}

$this->set([ 'message' => $arrdetail,
   '_serialize' => 'message'
   ]);   
}

public function appProductdetail(){

 if($this->request->is('post') && !empty($this->request->data['productid'])){
   $this->loadModel('Promotions');
   $this->loadModel('Printers');
   $this->loadModel('Printerimages');
   $this->loadModel('Productpromotions');      
   $productRecord = $this->Products->find('all',['conditions'=>['Products.id'=>$this->request->data['productid']]]);
   $productArr = array();
   if(!empty($productRecord)){
	//print_r($productRecord);
      $this->loadModel('Productimages');
      foreach($productRecord as $pkey=>$pvalue){

        /*-------Get all attached printer list------*/
        $this->loadModel('productprinters');
        $printerList = $this->productprinters->find('all',array('fields'=>array('printer_id','printer_id'),'conditions'=>array('product_id'=>$pvalue->id)));
        if(!empty($printerList)){
           foreach($printerList as $printArr){
              $pArr[] = $printArr->printer_id;
          }				
      }
      /*---------------------------------------*/

      $product['id'] = $pvalue->id;
      if($pvalue->brand_id>0){
       $product['brand_id'] = $pvalue->brand_id;
   }else{
      $product['brand_id'] = "";   
  }
  if($pvalue->product_name!=''){ 
   $product['product_name'] = $pvalue->product_name;
}else{
  $product['product_name'] = "";    
}

if($pvalue->product_type !=''){ 
   $product['product_type'] = $pvalue->product_type;
}else{
   $product['product_type'] = "";    
}
if($pvalue->product_part_num !=''){ 
   $product['product_part_num'] = $pvalue->product_part_num;
}else{
   $product['product_part_num'] = "";   
}
if($pvalue->product_color !=''){ 
   $product['product_color'] = $pvalue->product_color;
}else{
   $product['product_color'] = "";     
}

if($pvalue->product_catridge_type !=''){ 
   $product['product_catridge_type'] = $pvalue->product_catridge_type;
}else{
   $product['product_catridge_type'] = "";        
}

if($pvalue->product_price_before_gst !=''){      
   $product['product_price_before_gst'] = $pvalue->product_price_before_gst;
}else{
  $product['product_price_before_gst'] = "";   
}

if($pvalue->product_price_including_gst !=''){  
   $product['product_price_including_gst'] = $pvalue->product_price_including_gst;
}else{
  $product['product_price_including_gst'] = "";    
}


if($pvalue->product_est_yield !=''){  
   $product['product_est_yield'] = $pvalue->product_est_yield;
}else{
  $product['product_est_yield'] = "";    
}

if($pvalue->product_est_yield1 !=''){  
   $product['product_est_yield1'] = $pvalue->product_est_yield1;
}else{
  $product['product_est_yield1'] = "";    
}


if($pvalue->product_stock_qty !=''){  
   $product['product_stock_qty'] = $pvalue->product_stock_qty;
}else{
  $product['product_stock_qty'] = "";    
}    

if($pvalue->product_stock_qty >0){
  $product['product_stock_status'] = 'In Stock';
}else{
  $product['product_stock_status'] = 'Out Of Stock';
}  

if($pvalue->product_inventory_availability !=''){  
   $product['product_inventory_availability'] = $pvalue->product_inventory_availability;
}else{
  $product['product_inventory_availability'] = "";    
}      

if($pvalue->product_compatability !=''){  
   $product['product_compatability'] = $pvalue->product_compatability;
}else{
  $product['product_compatability'] = "";    
}   
if($pvalue->product_dimension_length !=''){  
   $product['product_dimension_length'] = $pvalue->product_dimension_length;
}else{
  $product['product_dimension_length'] = "";    
}
if($pvalue->product_dimension_width !=''){  
   $product['product_dimension_width'] = $pvalue->product_dimension_width;
}else{
  $product['product_dimension_width'] = "";    
}
if($pvalue->product_dimension_height !=''){  
   $product['product_dimension_height'] = $pvalue->product_dimension_height;
}else{
  $product['product_dimension_height'] = "";    
}
if($pvalue->product_shipping_weight !=''){  
   $product['product_shipping_weight'] = $pvalue->product_shipping_weight;
}else{
  $product['product_shipping_weight'] = "";    
}
if($pvalue->product_shipping_weight_unit !=''){  
   $product['product_shipping_weight_unit'] = $pvalue->product_shipping_weight_unit;
}else{
  $product['product_shipping_weight_unit'] = "";    
}
if($pvalue->product_warranty !=''){  
   $product['product_warranty'] = $pvalue->product_warranty;
}else{
  $product['product_warranty'] = "";    
} 
if($pvalue->product_keywords !=''){  
   $product['product_keywords'] = $pvalue->product_keywords;
}else{
  $product['product_keywords'] = "";    
}
if($pvalue->product_waiver_charges !=''){  
   $product['product_waiver_charges'] = $pvalue->product_waiver_charges;
}else{
  $product['product_waiver_charges'] = "";    
}
if($pvalue->product_description !=''){  
   $product['product_description'] = $pvalue->product_description;
}else{
  $product['product_description'] = "";    
}
if($pvalue->product_usage !=''){  
   $product['product_usage'] = $pvalue->product_usage;
}else{
  $product['product_usage'] = "";    
}

$product['is_sale'] = 0;;         
$product['discounted_price'] = $pvalue->product_price_before_gst;



$productImages = $this->Productimages->find('all',['conditions'=>[
   ['Productimages.product_id = '=>$pvalue->id]
   ],
   'fields'=>['Productimages.id','Productimages.product_id','Productimages.image']
   ]);

$imaArr = array(); 
if(!empty($productImages)){
  foreach($productImages as $pikey=>$pivalue){
   if(!empty($pivalue->image)){
               //localhost/DBR/img/product/14662622120.png
       $imaArr[] = $this->request->scheme().'://'.$this->request->host().$this->request->base.'/img'.DS.'product' . DS . $pivalue->image;
   }
}
}else{
   $imaArr = array();   
}
$product['image']=$imaArr;

}
$printerArr =array();

if(!empty($pArr)){
$printerRecord = $this->Printers->find('all',[
   'conditions'=>['Printers.id IN'=>$pArr],
   ]);

$printerArr= array();
foreach($printerRecord as $prkey=>$prvalue){
   $productMainArr['product'] = array();
   $printer['id'] = $prvalue->id;
   if($prvalue->printer_name !=''){
       $printer['printer_name'] = $prvalue->printer_name;
   }else{
    $printer['printer_name'] = "";     
}


$printerImage =  $this->Printerimages->find()
->where(['Printerimages.printer_id' => $prvalue->id])
->first();



if($printerImage->image!=''){
   $printer['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'printer' . DS . $printerImage->image;
}else{
  $printer['image'] = "";   
}
$printerArr[] = $printer;
}
}

/*
   $productRelatedRecord = $this->Products->find('all',['conditions'=>['Products.id !='=>$this->request->data['productid'],'Products.brand_id ='=>$pvalue->brand_id]]);   
    if(!empty($productRelatedRecord)){
       foreach($productRelatedRecord as $prrkey=>$prrvalue){
           $relatedProduct['id'] = $prrvalue->id;
           $relatedProduct['product_name'] = $prrvalue->product_name;
           $relatedProduct['price'] = $prrvalue->product_price_before_gst;
           $relatedProductImages = $this->Productimages->find('all',['conditions'=>[
               ['Productimages.product_id = '=>$prrvalue->id]
            ],
            'fields'=>['Productimages.id','Productimages.product_id','Productimages.image'],
            'limit'=>1
         ]);
        
        $relatedProduct['image'] = "";   
foreach($relatedProductImages as $pirkey=>$pirvalue){
           if(!empty($pirvalue->image)){
               //localhost/DBR/img/product/14662622120.png
           $relatedProduct['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'product' . DS . $pirvalue->image;
           }else{
           $relatedProduct['image'] = "";   
           }
           
            }
           $productRelatedArr[] = $relatedProduct;  
       }
       }
       */
       $arrdetail['error'] = '0';
       $arrdetail['ProductInfo'] = $product;
       $arrdetail['RelatedProductInfo'] = $printerArr;
   }else{
       $arrdetail['error'] = '1';
       $arrdetail['response'] = 'Sorry, no detail found';    
   }
   
}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Product id is missing'; 
}

$this->set([ 'message' => $arrdetail,
   '_serialize' => ['message']
   ]);      
}    

Public function appShowPrinterWithProduct(){
   if($this->request->is('post') && ($this->request->data)){
    $this->loadModel('Printers');
    $this->loadModel('Productprinters');
    $this->loadModel('Products');
    
    if(isset($this->request->data['brandid']) && !empty($this->request->data['brandid'])){
      $printerRecord = $this->Printers->find()->where(['Printers.brand_id'=>$this->request->data['brandid']]);
      $printerArr = array();
      $printerArray = array();
      if(count($printerRecord)>0){
          foreach($printerRecord as $prkey=>$prvalue){
           $productMainArr['product'] = array();
           $printer['id'] = $prvalue->id;
           if($prvalue->printer_name !=''){
               $printer['printer_name'] = $prvalue->printer_name;
           }else{
            $printer['printer_name'] = "";     
        }
        if($prvalue->image !=''){
           $printer['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'printer' . DS . $prvalue->image;
       }else{
          $printer['image'] = "";   
      }
      $printerArr[] = $printer;
      $printerProductArr = $this->Productprinters->find()->where(['Productprinters.printer_id'=>$prvalue->id]);
      foreach($printerProductArr as $ppakey=>$ppavalue){
       $prinProductArr = $this->Products->find()->where(['Products.id'=>$ppavalue->product_id]);

       foreach($prinProductArr as $pppkey=>$pppvalue){
           $productArr['id'] = $pppvalue->id;
           if($pppvalue->image !=''){
               $productArr['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'product' . DS . $pppvalue->image;
           }else{
               $productArr['image'] = "";     
           }
           if($pppvalue->price !=""){
               $productArr['price'] = $pppvalue->price;
           }else{
               $productArr['price'] = ""; 
           }
           $productMainArr['product'][] = $productArr;
       }
   }
        // $printerArray[] = array_combine($printerArr,$productMainArr);
   $printerArr[] = $productMainArr;
}
$arrdetail['error'] = '0';
$arrdetail['printerResponse'] = $printerArr; 
}else{
$arrdetail['error'] = '1';
$arrdetail['printerResponse'] = 'No Record Found'; 
}

}else{
$arrdetail['error'] = '1';
$arrdetail['response'] = 'Brand id is missing'; 
}

}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Parameters are missing'; 
}
$this->set([ 'message' => $arrdetail,
   '_serialize' => ['message']
   ]);     

}


//appShowPrinterWithBrandid

public function appShowPrinterWithBrandid(){
   $this->loadModel('Printers');
   $this->loadModel('Printerimages');
   if($this->request->is('post') && ($this->request->data)){
     if(isset($this->request->data['brandid']) && !empty($this->request->data['brandid'])){
      $limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
      $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;
      $brandid = $this->request->data['brandid'];
      $this->paginate = [
      'conditions'=> ['Printers.brand_id ='=>$brandid], 
      'limit' => $limit,
      'order' => [
      'Printers.name' => 'asc'
      ],
      'page'=>$page
      ];
      $printerRecord = $this->paginate($this->Printers);
      $printerArr= array();
      if(count($printerRecord)>0){
         foreach($printerRecord as $prkey=>$prvalue){
           $productMainArr['product'] = array();
           $printer['id'] = $prvalue->id;
           if($prvalue->printer_name !=''){
               $printer['printer_name'] = $prvalue->printer_name;
           }else{
            $printer['printer_name'] = "";     
        }

        $printerImage =  $this->Printerimages->find()
        ->where(['Printerimages.printer_id' => $prvalue->id])
        ->first();

        if($printerImage->image !=''){
           $printer['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'printer' . DS . $printerImage->image;
       }else{
          $printer['image'] = "";   
      }
      $printerArr[] = $printer;
  }
  $arrdetail['error'] = '0';
  $arrdetail['printerInfo'] = $printerArr;
}else{
  $arrdetail['error'] = '1';
  $arrdetail['printerInfo'] = 'No Record Found';
}
$arrdetail['TotalRecord'] = $this->request->params['paging']['Printers']['count'];
$arrdetail['TotalPageCount'] = $this->request->params['paging']['Printers']['pageCount'];
$arrdetail['CurrentPage'] = $this->request->params['paging']['Printers']['page']; 
}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Brand id is missing';
}

}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Parameters are missing';
}

$this->set([ 'message' => $arrdetail,
   '_serialize' => ['message']
   ]);       
}

//App get cartridges on the behalf of printer id

public function appShowProductWithPrinterold(){
   $this->loadModel('Printers');
   $this->loadModel('Productprinters');
   if($this->request->is('post') && ($this->request->data)){
      if(isset($this->request->data['printerid']) && !empty($this->request->data['printerid'])){
          $limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
          $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;
          $printerid = $this->request->data['printerid'];
          $this->paginate = [
          'conditions'=> ['Productprinters.printer_id ='=>$printerid], 
          'limit' => $limit,
          'order' => [
          'Productprinters.id' => 'desc'
          ],
          'page'=>$page
          ];
          $prinProductArr = $this->paginate($this->Productprinters);
          $productMainArr= array();
          if(count($prinProductArr)>0){
            foreach($prinProductArr as $pppkey=>$pppvalue){
               $productArr['id'] = $pppvalue->id;

               if($pppvalue->product_name !=''){
                  $productArr['product_name'] = $pppvalue->product_name;	
              }else{
                  $productArr['product_name'] = '';	
              }
              if($pppvalue->image !=''){
               $productArr['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'product' . DS . $pppvalue->image;
           }else{
               $productArr['image'] = "";     
           }
           if($pppvalue->price !=""){
               $productArr['price'] = $pppvalue->price;
           }else{
               $productArr['price'] = ""; 
           }

           $productMainArr[] = $productArr;
       }
       $arrdetail['error'] = '0';
       $arrdetail['printerInfo'] = $productMainArr;
       $arrdetail['TotalRecord'] = $this->request->params['paging']['Productprinters']['count'];
       $arrdetail['TotalPageCount'] = $this->request->params['paging']['Productprinters']['pageCount'];
       $arrdetail['CurrentPage'] = $this->request->params['paging']['Productprinters']['page'];
   }else{
       $arrdetail['error'] = '1';
       $arrdetail['printerInfo'] = "No Printer Found";
       $arrdetail['TotalRecord'] = $this->request->params['paging']['Productprinters']['count'];
       $arrdetail['TotalPageCount'] = $this->request->params['paging']['Productprinters']['pageCount'];
       $arrdetail['CurrentPage'] = $this->request->params['paging']['Productprinters']['page']; 
   }
}else{
  $arrdetail['error'] = '0';
  $arrdetail['response'] = 'Printer id is missing';
}      
}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Parameters are missing';
}

$this->set([ 'message' => $arrdetail,
   '_serialize' => ['message']
   ]);       
}

public function appShowProductWithPrinter(){
   $this->loadModel('Printers');
   $this->loadModel('Products');
   $this->loadModel('Productprinters');
   $this->loadModel('Productimages');
   $this->loadModel('Printerimages');
   if($this->request->is('post') && ($this->request->data)){
      if(isset($this->request->data['printerid']) && !empty($this->request->data['printerid'])){
          $limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
          $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;
          $printerid = $this->request->data['printerid'];
          $query = $this->Products
          ->find('all')
          ->contain(['Productprinters'])     
          ->matching('Productprinters')
          ->where([
           'Productprinters.printer_id ='=>$printerid,
           ]);
          $this->paginate= ['limit' => $limit, 'page' =>$page];
          $prinProductArr = $this->paginate($query);
          $productMainArr= array();        
          if(count($prinProductArr)>0){
           $this->loadModel('Products');
           foreach($prinProductArr as $pppkey=>$pppvalue){
            if($pppvalue->id >0){
               $productArr['id'] = $pppvalue->id;
           }else{
               $productArr['id'] = "";
           }

           if($pppvalue->product_name !=''){
              $productArr['product_name'] = $pppvalue->product_name;	
          }else{
              $productArr['product_name'] = '';	
          }
          $productImageSheet = $this->Productimages->find()->where(['product_id'=>$pppvalue->id])->first();
          if($productImageSheet->image !=''){
           $productArr['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'product' . DS . $productImageSheet->image;
       }else{
           $productArr['image'] = "";     
       }

       if($pppvalue->product_price_before_gst !=""){
           $productArr['price'] = $pppvalue->product_price_before_gst;
       }else{
           $productArr['price'] = ""; 
       }
       $productMainArr[] = $productArr;
   }
   $arrdetail['error'] = '0';
   $arrdetail['printerInfo'] = $productMainArr;
   $arrdetail['TotalRecord'] = $this->request->params['paging']['Products']['count'];
   $arrdetail['TotalPageCount'] = $this->request->params['paging']['Products']['pageCount'];
   $arrdetail['CurrentPage'] = $this->request->params['paging']['Products']['page'];
}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = "No Record Found";
   $arrdetail['TotalRecord'] = $this->request->params['paging']['Products']['count'];
   $arrdetail['TotalPageCount'] = $this->request->params['paging']['Products']['pageCount'];
   $arrdetail['CurrentPage'] = $this->request->params['paging']['Products']['page']; 
}
}else{
  $arrdetail['error'] = '0';
  $arrdetail['response'] = 'Printer id is missing';
}      
}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Parameters are missing';
}

$this->set([ 'message' => $arrdetail,
   '_serialize' => ['message']
   ]);       
}

Public function appShowSalesProduct(){
 $this->loadModel('Products');
 $this->loadModel('Productimages');
 $this->loadModel('Productpromotions');
 $productRecord = array();
 if($this->request->is('post') && (!empty($this->request->data))){
   $limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
   $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;
   if(isset($this->request->data['brandid']) && (!empty($this->request->data['brandid']))){
      $brandid = $this->request->data['brandid'];
      $query = $this->Products
      ->find('all')
      ->contain(['Productpromotions'])     
      ->matching('Productpromotions')
      ->where([
       'Productpromotions.product_id IS NOT' => NULL,
       'Products.brand_id ='=>$brandid
       ]);
      $this->paginate= ['limit' => $limit, 'page' =>$page];
      $productRecord = $this->paginate($query);

      $productArr = array();
      $CountImage = array();
      if(!empty($productRecord)){
       foreach($productRecord as $pkey=>$pvalue){
        if(count($pvalue->productpromotions>0)){ 
        //  $product['productpromotions'] = $pvalue->productpromotions;
           $product['id'] = $pvalue->id;
           $product['product_name'] = $pvalue->product_name;
           $product['brand_id'] = $pvalue->brand_id;
           $product['price'] = $pvalue->product_price_before_gst;
       }
       $productArr[] = $product;
   } 
}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'No Product of this brand'; 
}
$arrdetail['error'] = '0';
$arrdetail['response'] = 'Product Listing';
$arrdetail['listing'] = $productArr;
$arrdetail['TotalRecord'] = $this->request->params['paging']['Products']['count'];
$arrdetail['TotalPageCount'] = $this->request->params['paging']['Products']['pageCount'];
$arrdetail['CurrentPage'] = $this->request->params['paging']['Products']['page'];      
}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Brand id is missing'; 
}

}else{
  $arrdetail['error'] = '1';
  $arrdetail['response'] = 'Parameters are missing'; 
}
$this->set([
   'message' => $arrdetail,
   '_serialize' => ['message']
   ]); 
}


//Add to cart 
public function appAddtocartold(){
   $this->loadModel('Productimages');
   if($this->request->is('post') && ($this->request->data)){
       if(isset($this->request->data['userid']) && !empty($this->request->data['userid'])){
           if(isset($this->request->data['productid']) && !empty($this->request->data['productid'])){
               $product= array();
               $productdetail = $this->Products->find()
               ->select(['id', 'brand_id', 'product_name','product_type','product_part_num','product_color','product_catridge_type','product_price_before_gst','product_price_including_gst','product_est_yield','product_est_yield1','product_stock_qty'])
               ->where(['Products.id'=>$this->request->data['productid']])->toArray();
               $product['id'] = $productdetail[0]['id'];
               $product['brand_id'] = $productdetail[0]['brand_id'];
               $product['product_name'] = $productdetail[0]['product_name'];
               $product['product_type'] = $productdetail[0]['product_type'];
               $product['product_part_num'] = $productdetail[0]['product_part_num'];
               $product['product_color'] = $productdetail[0]['product_color'];
               $product['product_catridge_type'] = $productdetail[0]['product_catridge_type'];
               $product['product_price_before_gst'] = $productdetail[0]['product_price_before_gst'];
               $product['product_price_including_gst'] = $productdetail[0]['product_price_including_gst'];
               $product['product_est_yield'] = $productdetail[0]['product_est_yield'];
               $product['product_est_yield1'] = $productdetail[0]['product_est_yield1'];
               $product['product_stock_qty'] = $productdetail[0]['product_stock_qty'];
               if($productdetail[0]['product_stock_qty']>0){
                  $product['product_status'] = "In Stock";  
              }else{
               $product['product_status'] = "Out Of Stock"; 
           }
           $productImages = $this->Productimages->find('all',['conditions'=>[
               ['Productimages.product_id = '=>$this->request->data['productid']]
               ],
               'fields'=>['Productimages.id','Productimages.product_id','Productimages.image'],
               'limit'=>1
               ]);                  
           $product['image'] = "";   
           foreach($productImages as $pikey=>$pivalue){
            if(!empty($pivalue->image)){
                $product['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'product' . DS . $pivalue->image;
            }else{
                $product['image'] = "";   
            }
        }

        $arrdetail['error'] = '0';
        $arrdetail['response'] = $product;  
    }else{
     $arrdetail['error'] = '1';
     $arrdetail['response'] = 'Product id is missing';    
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

function showCartdetail($userid=0){ 
  $this->loadModel('Products');
  $this->loadModel('Productcarts');
  $this->loadModel('Productimages');
  $this->loadModel('Users');
  if($userid !=''){   
   $cartArr = array();
   $cartdetail = $this->Productcarts->find()->where(['Productcarts.user_id'=>$userid])->toArray();
   if(!empty($cartdetail)){          
      foreach($cartdetail as $cdkey=>$cdvalue){          
        $cart['id'] = $cdvalue['id'];
        $cart['user_id'] = $cdvalue['user_id'];
        $cart['product_id'] = $cdvalue['product_id'];
        $cart['quantity'] = $cdvalue['quantity'];
        $cart['unit_price'] = $cdvalue['unit_price'];
        $cart['total_price'] = $cdvalue['total_price'];

        $productdetail = $this->Products->find()->select(['product_name','product_part_num','product_price_before_gst','product_stock_qty'])
        ->where(['Products.id'=>$cdvalue['product_id']])->toArray();
        $cart['product_name'] = $productdetail[0]['product_name'];
        $cart['product_part_num'] = $productdetail[0]['product_part_num'];

        if($productdetail[0]['product_description']!=''){
            $cart['product_description'] = $productdetail[0]['product_description'];
        }else{
          $cart['product_description']= "";
      }

      if($productdetail[0]['product_stock_qty']>0){
        $cart['stock_quantity'] = $productdetail[0]['product_stock_qty'];
    }else{
      $cart['stock_quantity'] = "";
  }	

  $productImages = $this->Productimages->find('all',['conditions'=>[
   ['Productimages.product_id = '=>$cdvalue['product_id']]
   ],
   'fields'=>['Productimages.id','Productimages.product_id','Productimages.image'],
   'limit'=>1
   ]);                  
  $cart['image'] = "";   
  foreach($productImages as $pikey=>$pivalue){
    if(!empty($pivalue->image)){
        $cart['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'product' . DS . $pivalue->image;
    }else{
        $cart['image'] = "";   
    }
}
$cartArr[]= $cart;          
}
     //$arrdetail['error'] = '0';
return $cartArr;           
}else{
             //$arrdetail['error'] = '1';
   return array(); 
}        
}else{    
   return array();    
} 
}


public function appAddtocart(){
   $this->loadModel('Productcarts');
   if($this->request->is('post') && ($this->request->data)){
       if(isset($this->request->data['user_id']) && !empty($this->request->data['user_id'])){
           if(isset($this->request->data['product_id']) && !empty($this->request->data['product_id'])){
            if(isset($this->request->data['quantity']) && !empty($this->request->data['quantity'])){
               if(isset($this->request->data['price']) && !empty($this->request->data['price'])){
                 $this->request->data['unit_price'] = $this->request->data['price'];
                 $totalprice = $this->request->data['price'] * $this->request->data['quantity'];
                 $this->request->data['total_price'] = $totalprice;
                     //  print_r($this->request->data);
                       //exit;
                 $cart = $this->Productcarts->newEntity();
                 $issaveddata = $this->Productcarts->patchEntity($cart, $this->request->data);
                 $issaved = $this->Productcarts->save($issaveddata);
                 if($issaved->id >0){
                    $arrdetail['error'] = '0';
                    $arrdetail['response'] = 'Cart added successfully..'; 
                }else{
                    $arrdetail['error'] = '1';
                    $arrdetail['response'] = "Record not found,try later";   
                }
            }else{
               $arrdetail['error'] = '1';
               $arrdetail['response'] = 'Price is missing';     
           }
       }else{
         $arrdetail['error'] = '1';
         $arrdetail['response'] = 'Quantity is missing';  
     }
 }else{
     $arrdetail['error'] = '1';
     $arrdetail['response'] = 'Product id is missing';    
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


public function showCartrecords(){
  $this->loadModel('Products');
  $this->loadModel('Productcarts');
  $this->loadModel('Productimages');
  $this->loadModel('Users');
  if($this->request->is('post') && ($this->request->data)){
    if(isset($this->request->data['user_id']) && $this->request->data['user_id']){

       $CartTable = TableRegistry::get('productcarts');
       $exists = $CartTable->exists(['user_id' => $this->request->data['user_id']]);
       if($exists == 1){
           $arrdetail['error'] = '0';
           $arrdetail['response'] = 'Showing cart detail';  
           $arrdetail['cartInfo'] = $this->showCartdetail($this->request->data['user_id']);
       }else{
          $arrdetail['error'] = '1';
          $arrdetail['response'] = 'User cart is empty ';  
          $arrdetail['cartInfo'] = array();        
      }
  }else{
   $arrdetail['error'] = '0';
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

public function showCartrecordsold(){ 
  $this->loadModel('Products');
  $this->loadModel('Productcarts');
  $this->loadModel('Productimages');
  $this->loadModel('Users');
  if($this->request->is('post') && ($this->request->data)){
    if(isset($this->request->data['user_id']) && $this->request->data['user_id']){

       $cartArr = array();
       $cartdetail = $this->Productcarts->find()->where(['Productcarts.user_id'=>$this->request->data['user_id']])->toArray();
       if(!empty($cartdetail)){          
          foreach($cartdetail as $cdkey=>$cdvalue){          
            $cart['id'] = $cdvalue['id'];
            $cart['user_id'] = $cdvalue['user_id'];
            $cart['product_id'] = $cdvalue['product_id'];
            $cart['quantity'] = $cdvalue['quantity'];
            $cart['unit_price'] = $cdvalue['unit_price'];
            $cart['total_price'] = $cdvalue['total_price'];

            $productdetail = $this->Products->find()->select(['product_name','product_part_num','product_price_before_gst','product_stock_qty'])
            ->where(['Products.id'=>$cdvalue['product_id']])->toArray();
            $cart['product_name'] = $productdetail[0]['product_name'];
            $cart['product_part_num'] = $productdetail[0]['product_part_num'];

            if($productdetail[0]['product_description']!=''){
                $cart['product_description'] = $productdetail[0]['product_description'];
            }else{
              $cart['product_description']= "";
          }

          if($productdetail[0]['product_stock_qty']>0){
            $cart['stock_quantity'] = $productdetail[0]['product_stock_qty'];
        }else{
          $cart['stock_quantity'] = "";
      }	

      $productImages = $this->Productimages->find('all',['conditions'=>[
       ['Productimages.product_id = '=>$cdvalue['product_id']]
       ],
       'fields'=>['Productimages.id','Productimages.product_id','Productimages.image'],
       'limit'=>1
       ]);                  
      $cart['image'] = "";   
      foreach($productImages as $pikey=>$pivalue){
        if(!empty($pivalue->image)){
            $cart['image'] = $this->request->scheme().'://'.$this->request->host().DS.$this->request->base.DS.'img'.DS.'product' . DS . $pivalue->image;
        }else{
            $cart['image'] = "";   
        }
    }
    $cartArr[]= $cart;          
}
$arrdetail['error'] = '0';
$arrdetail['cartInfo'] = $cartArr; 

}else{
 $arrdetail['error'] = '1';
 $arrdetail['cartInfo'] = 'No item found in this card'; 
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

public function appRemoveCartitem(){
   $this->loadModel('Productcarts');
   if($this->request->is('post') && ($this->request->data)){
      $cartProduct = $this->Productcarts->find()->where(['id'=>$this->request->data['cart_id']])->toArray();
      if(isset($this->request->data['cart_id']) && !empty($this->request->data['cart_id'])){
       $CartTable = TableRegistry::get('productcarts');
       $exists = $CartTable->exists(['id' => $this->request->data['cart_id']]);
       if($exists == 1){
           $entity = $this->Productcarts->get($this->request->data['cart_id']);
           $result = $this->Productcarts->delete($entity);    
           $arrdetail['error'] = '0';
           $arrdetail['response'] = 'Item remove from the cart';

           $arrdetail['myCart'] = $this->showCartdetail($cartProduct[0]['user_id']);
       }else{
          $arrdetail['error'] = '1';
          $arrdetail['response'] = 'Cart id doesnt exists '; 
      }
  }else{
    $arrdetail['error'] = '1';
    $arrdetail['response'] = 'Cart id is missing'; 
}
}else{
$arrdetail['error'] = '1';
$arrdetail['response'] = 'Parameters are missing'; 
}

$this->set([ 'message' => $arrdetail,
   '_serialize' => ['message']
   ]);   
}


/***********************************************Update cart detail ***********************************************************/
Public function appUpdateCartDetail(){ 
$this->loadModel('Orders'); 
$this->loadModel('Productcarts');
if($this->request->is('post') && ($this->request->data)){
   if(isset($this->request->data['user_id']) && !empty($this->request->data['user_id'])){
      if(isset($this->request->data['cart_info']) && !empty($this->request->data['cart_info'])){
                   // format : productid:Qty:unitprice||productid:Qty:unitprice
       if (strpos($this->request->data['cart_info'], '||') !== false) {
          $cartdata = explode('||',$this->request->data['cart_info']);
          if(!empty($cartdata)){
              foreach($cartdata as $cartvalue){
               if(strpos($cartvalue,':') !== false){     
                   $mainCartValue = explode(':',$cartvalue);
                   $this->request->data['product_id'] =  $mainCartValue[0];
                   $this->request->data['quantity'] =  $mainCartValue[1];
                   $this->request->data['unit_price'] =  $mainCartValue[2];
                   $this->request->data['total_price'] = $this->request->data['quantity'] *$this->request->data['unit_price'];

                   $productid = $this->request->data['product_id'];
                   $query = $this->Productcarts->query();
                   $query->update()
                   ->set(['quantity' => $this->request->data['quantity'],'unit_price'=>$this->request->data['unit_price'],'total_price'=>$this->request->data['total_price']])
                   ->where(['product_id' => $productid])
                   ->execute();
                   if($query){
                      $arrdetail['error'] = '0';
                      $arrdetail['response'] = 'Cart Info updated';          
                  }else{
                      $arrdetail['error'] = '0';
                      $arrdetail['response'] = 'Cart Info not  updated';                    
                  }
              }else{
               $arrdetail['error'] = '1';
               $arrdetail['response'] = 'Cart Info value not valid format'; 
           }
       }
   }else{
       $arrdetail['error'] = '0';
       $arrdetail['response'] = 'Cart value is empty';   
   }
}else{
  if(strpos($this->request->data['cart_info'], ':') !== false){
    $mainCartValue = explode(':',$this->request->data['cart_info']);
    $this->request->data['product_id'] =  $mainCartValue[0];
    $this->request->data['quantity'] =  $mainCartValue[1];
    $this->request->data['unit_price'] =  $mainCartValue[2];
    $this->request->data['total_price'] = $this->request->data['quantity'] *$this->request->data['unit_price'];
    $productid = $this->request->data['product_id'];
    $query = $this->Productcarts->query();
    $query->update()
    ->set(['quantity' => $this->request->data['quantity'],'unit_price'=>$this->request->data['unit_price'],'total_price'=>$this->request->data['total_price']])
    ->where(['product_id' => $productid])
    ->execute();
    if($query){
      $arrdetail['error'] = '0';
      $arrdetail['response'] = 'Cart Info updated';          
  }else{
      $arrdetail['error'] = '0';
      $arrdetail['response'] = 'Cart Info not  updated';                    
  }                            
}  
}     
}else{
   $arrdetail['error'] = '1';
   $arrdetail['response'] = 'Cart data is missing';         
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


  //--------------------------------------end update cart ----------------------------------------------------//


   ///-------------------------------------Promocode ----------------------------------------------///

function checkPromocode($promocode,$userid = 0){
   $this->loadModel('Promocodes');
   $this->loadModel('Orders');
   $today = date('Y-m-d');
   $promoUsed = 0;
  // if($this->request->is('post') && ($this->request->data)){
   $orderTable = TableRegistry::get('Orders');
   $existing = $orderTable->exists(['order_user_id'=>$userid,'order_promocode'=>$promocode]);
   if($existing == 1){
    $promoUsed = 1;  
}

$promocodeTable = TableRegistry::get('Promocodes');
 //$this->request->data['promocode'];

$promocodes = $this->Promocodes->find()->where(['promocode'=>$promocode,'expiry_date >='=>$today]);
$promocode = $promocodes->select(['count' => $promocodes->func()->count('*')])->toArray();    
$promocodeExists = $promocode[0]['count'];


if($promocodeExists ==1){
    $promoCheckVal=$this->Promocodes->find()->where(['promocode' => $this->request->data['promocode']])->toArray();
	$superPromo = $promoCheckVal[0]['usage_type']; //44-Once, 45-Multiple times
       if($superPromo == 45){
        $now = date("Y-m-d H:i:s");
        $arr['valid'] = 'Yes';
        $arr['discount_amount'] = number_format($promoCheckVal[0]['amount'],2);
        if($promoCheckVal[0]['discount_type']==17){
           $discount_type = '%';
       }elseif($promoCheckVal[0]['discount_type']==18){
        $discount_type = '$';                 
    }  
    $arr['discount_type'] = $discount_type;			
    $arr['expiry_date'] = ($promoCheckVal[0]['expiry_date'] > $now) ? 'No' : 'Yes';

}else if($superPromo==44 && $promoUsed==0){
    $now = date("Y-m-d H:i:s");
    $arr['valid'] = 'Yes';
    $arr['discount_amount'] = number_format($promoCheckVal[0]['amount'],2);
    if($promoCheckVal[0]['discount_type']==17){
       $discount_type = '%';
   }elseif($promoCheckVal[0]['discount_type']==18){
    $discount_type = '$';                 
}
$arr['discount_type'] = $discount_type;			
$arr['expiry_date'] = ($promoCheckVal[0]['expiry_date'] > $now) ? 'No' : 'Yes';
}else{
  $arr['valid'] = 'Already Used';
}    
return $arr;
}else{     
 return array();
}
}

public function appPromocode(){    
   if(!empty($this->request->data)) {
       $userid = isset($this->request->data['userid']) ? $this->request->data['userid'] : 0;
       $promo = $this->request->data['promocode'];
       $promoCode = $this->checkPromocode($promo,$userid);
//print_r($promoCode);
//exit;
       if(!empty($promoCode)){
         if($promoCode['valid']=='Already Used'){
             $arrdetail['error'] = '1';
             $arrdetail['message'] = 'Promo code has been already used';	
         }else{
             $arrdetail['promoDetail'] = $promoCode;
             $arrdetail['error'] = '0';
             $arrdetail['message'] = 'PromoCode details.';
         }
     }else{
       $arrdetail['error'] = '1';
       $arrdetail['message'] = 'Sorry, invalid promocode or already used/Expired.';	
   }
}else{
$message = '';
$arrdetail['error'] = '1';
$arrdetail['message'] = 'Parameters are missing.';
}
$this->set([ 'message' => $arrdetail,
   '_serialize' => ['message']
   ]);
}




}