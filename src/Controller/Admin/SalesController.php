<?php

namespace App\Controller\Admin;

use Cake\Event\Event;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Brand;
use App\Model\Entity\Product;
use Cake\Network\Exception\NotFoundException;


class SalesController extends AppController
{

  public $paginate = ['limit' => 10];
  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
     $this->Auth->allow('delete');
  }

  public function  index()
  {
  	$this->viewBuilder()->layout('/Admin/adminheader');
  	$this->loadModel('Orders');
  	 $sales = $this->paginate($this->Orders->find('all'));

  
	if($this->request->is(['post']))
		{

		$query =$this->Orders->find('all')->where(['order_date >='=> date('Y-m-d', strtotime($this->request->data['from'])),'order_date <=' => date('Y-m-d', strtotime($this->request->data['to']))]);
		//print_r($this->request->data);
		$sales = $this->paginate($query); 
		$sales->total = $query->sumOf('order_total');
		$sales->countorders = $query->count();
		
	
       }
       else{
       	$query1 =  $this->Orders->find('all');
  	 	$sales = $this->paginate($query1);
		$sales->total = $query1->sumOf('order_total');
		$sales->countorders =  $query1->count();

       }
	// $sum =  $this->Orders->find('all');
 //        if($totalAmount>0){
	// $sales->total = $totalAmount;
 //        }else{
 //        $sales->total = $sum->sumOf('order_total');   
 //        }
 //        if($count>0){
 //        $sales->countorders  = $count; 
 //              }else{
 //        $sales->countorders  = $sum->count();
 //              }
  	  $this->set(compact('sales'));
  $this->set('_serialize', ['sales']);
 
  }
   public function view($id = null){   

       $this->loadModel('Orders');
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

}