<?php 
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\ORM\TableRegistry;
use App\Model\Entity\User;

class DashboardsController extends AppController
{
	public function index()
	{
		 $this->viewBuilder()->layout('/Admin/adminheader');
		 $this->loadModel('Orders');
     	 $this->loadModel('Productcarts');
         $this->loadModel('Products');
         $this->loadModel('Users');

         $backDate =  date('Y-m-d',strtotime('-7 days')); 

       

 
 //echo "<pre>";
 	$dash  = $this->Orders->find()->contain(['Productcarts.Products'])->order(['Orders.id' => 'DESC'])->limit(5);
//____New Sign-up account
 	  $dash->usercount  = $this->Users->find()->where(['signupdate >='=>$backDate])->count();
//___new order count        
	$dash->ordercount = $this->Orders->find()->where(['order_date >='=>$backDate])->count();
//compeleted order count
	$dash->ordercompletecount = $this->Orders->find()->where(['order_status'=>'completed'])->count();
//canceled order count	
$dash->ordercancelcount = $this->Orders->find()->where(['order_status'=>'canceled'])->count();



 	 $sale =    $this->Orders->find()->where(['order_date'=>date('Y-m-d')]);

    $dash->total_sale =  $sale->sumOf('order_total'); 

 	$dash->user  = $this->Users->find()->order(['id' => 'DESC'])->limit(10);

 	$dash->compelete = $this->Orders->find()->contain(['Productcarts.Products'])->where(['Orders.order_status'=>'completed'])->order(['Orders.id' => 'DESC'])->limit(5);

 	$dash->canceled = $this->Orders->find()->contain(['Productcarts.Products'])->where(['Orders.order_status'=>'canceled'])->order(['Orders.id' => 'DESC'])->limit(5);

//$this->set('compeleted', $compeleted);
 	//print_r(json_decode(json_encode($dash)));

 //	die;
//$users= $this->set('users',$this->Users->get($id,['contain'=>['Orders.Productcarts.Products']]));

$this->set(compact('dash'));
  $this->set('_serialize', ['dash']);

	}
}
?>