<?php

namespace App\Controller\Admin;

use Cake\Event\Event;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Brand;
use App\Model\Entity\Product;



class GiftsController extends AppController
{
   

    public function index(){
       
    	 $this->viewBuilder()->layout('/Admin/adminheader');
         $query = $this->Gifts->find('all');
         $this->set('gifts', $this->paginate($query));
         $this->set('_serialize', ['gifts']); 

       // echo "index page hereeeeeeeeeeeeeeeeeeeeeeeeeeeeyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy"; 
        }  

        public function edit($id = null){
             $gift = $this->Gifts->get($id,[
                'contain'=>[]
            ]); 
           $this->viewBuilder()->layout('/Admin/adminheader');
            if($this->request->is(['patch','post','put'])){
        if($this->request->data['gift_image']!=''){                   
          $one2 = $this->request->data['gift_image'];
          $this->request->data['gift_image'] = time() .'.' . pathinfo($one2['name'], PATHINFO_EXTENSION);

          if ($one2['error'] == '0') {
            $pth2 =  WWW_ROOT.'img'.DS.'gift' . DS . $this->request->data['gift_image'];
            move_uploaded_file($one2['tmp_name'], $pth2);
          }
         }else{
            $this->request->data['gift_image'] = '';
         }
            $gift = $this->Gifts->patchEntity($gift,$this->request->data);
            if($this->Gifts->save($gift)){
                $this->Flash->success(__('This user has been updated'));
                return $this->redirect(['action'=>'index']);
            }else{
                $this->Flash->error(__('This user could not be updated. Please, try again.'));
            }
         }

     $this->set(compact('gift'));
    $this->set('_serialize',['gift']);
     
        }

        public function delete($id = null)
            { //$this->loadModel('Products');
                $this->viewBuilder()->layout('/Admin/adminheader');
                 if (empty($id)) {
        throw new NotFoundException(__('Article not found'));
    }
                //$this->request->allowMethod(['post', 'delete']);


                $gift = $this->Gifts->get($id);
                if ($this->Gifts->delete($gift)) {
                    $this->Flash->success(__('The user has been deleted.'));
                } else {
                    $this->Flash->error(__('The user could not be deleted. Please, try again.'));
                }
                
                return $this->redirect(['action' => 'index']);
            }

         public function view($id = null){
        $this->viewBuilder()->layout('/Admin/adminheader');
    $gifts= $this->set('gifts',$this->Gifts->get($id));

      $this->set('_serialize', ['gifts']);  
    }


        public function gifts()
        {
        	//print_r($_POST); 
        	
        	$this->loadModel('Gifts');
        	$this->viewBuilder()->layout('/Admin/adminheader'); 
        		if ($this->request->is('post','put')) {
        				print_r($_POST);

				$gift = $this->Gifts->newEntity();
         		
         		 $gift = $this->Gifts->patchEntity($gift, $_POST);
            	 if($this->Gifts->save($gift))
                 {
                        echo "product add successfully";
                 }
         		die();
         	}

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

         public function add()
         {
    $this->viewBuilder()->layout('/Admin/adminheader'); 
         	if ($this->request->is('post','put')) {
				$gift = $this->Gifts->newEntity();
         if($this->request->data['gift_image']!=''){                   
          $one2 = $this->request->data['gift_image'];
          $this->request->data['gift_image'] = time().'.' . pathinfo($one2['name'], PATHINFO_EXTENSION);

          if ($one2['error'] == '0') {
            $pth2 =  WWW_ROOT.'img'.DS.'gift' . DS . $this->request->data['gift_image'];
            move_uploaded_file($one2['tmp_name'], $pth2);
          }
         }else{
            $this->request->data['gift_image'] = '';
         }
                
         $gift = $this->Gifts->patchEntity($gift, $this->request->data);
         $this->Gifts->save($gift);
         	return $this->redirect(['action' => 'index']);
         	}
    
		$this->set(compact('data'));
        	$this->set('_serialize', ['data']);
       	}
}
