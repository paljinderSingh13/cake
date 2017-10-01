<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Page;

class PagesController extends AppController
{

    public $helpers = ['Form'];

    public function beforeFilter(Event $event){
    parent::beforeFilter($event);
    $this->Auth->allow(['registration', 'logout','login']);
}
    public function index(){
        $this->viewBuilder()->layout('/Admin/adminheader');
         $queryPages = $this->Pages->find('all')->where(['page_status' => 1]);
         
        $this->set('pages', $this->paginate($queryPages));
       $this->set('_serialize', ['pages']);   
    }
//___________________ADD BANNER____________________________________//
    public function addbanner()
    {
        $this->viewBuilder()->layout('/Admin/adminheader');
        if($this->request->is(['POST']))
        {
            if($this->request->data['page_banner1'])
                {
                $one1 = $this->request->data['page_banner1'];
                $this->request->data['page_banner1'] = time().'.'.pathinfo($one1['name'], PATHINFO_EXTENSION);

                if ($one1['error'] == '0') {
                $pth2 =  WWW_ROOT.'img'.DS.'banner' . DS . $this->request->data['page_banner1'];
                move_uploaded_file($one1['tmp_name'], $pth2);
                }
                  $pa['page_banner1'] = $this->request->data['page_banner1'];
                  $pa['page_status'] =1; 
                  $pa['banner_status'] =1;
                }

if($this->request->data['page_banner2'])
                {
                $one2 = $this->request->data['page_banner2'];
                $this->request->data['page_banner2'] = time().'.'.pathinfo($one2['name'], PATHINFO_EXTENSION);

                if ($one2['error'] == '0') {
                $pth2 =  WWW_ROOT.'img'.DS.'banner' . DS . $this->request->data['page_banner2'];
                move_uploaded_file($one1['tmp_name'], $pth2);
                }
                  $pa['page_banner2'] = $this->request->data['page_banner2'];
                $pa['page_status'] =1;
                 $pa['banner_status'] =1;
                }
    if($this->request->data['page_banner3'])
                {
                $one3 = $this->request->data['page_banner3'];
                $this->request->data['page_banner3'] = time().'.'.pathinfo($one3['name'], PATHINFO_EXTENSION);

                if ($one3['error'] == '0') {
                $pth2 =  WWW_ROOT.'img'.DS.'banner' . DS . $this->request->data['page_banner2'];
                move_uploaded_file($one3['tmp_name'], $pth2);
                }
                  $pa['page_banner3'] = $this->request->data['page_banner3'];
                  $pa['page_status'] =1;
                   $pa['banner_status'] =1;
                }


                $pge = $this->Pages->newEntity();
                $pge = $this->Pages->patchEntity($pge,$pa);
                if($this->Pages->save($pge))
                {
                $this->Flash->success(__('Banner has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Banner could not be saved. Please, try again.'));
            }
        }

            

    }
////__________________________editbanner______________________________//

    public function editbanner($id = null)
    {
         $this->viewBuilder()->layout('/Admin/adminheader');
         $banner = $this->Pages->get($id);
         if($this->request->is(['POST']))
         {
           

            
             if($this->request->data['page_banner1']['name']!="")
                {
                $one1 = $this->request->data['page_banner1'];
                $this->request->data['page_banner1'] = date('Y-m-d-H-i-s') . '_' . uniqid().'.'.pathinfo($one1['name'], PATHINFO_EXTENSION); //time().'.'.pathinfo($one1['name'], PATHINFO_EXTENSION);

                if ($one1['error'] == '0') {
                $pth1 =  WWW_ROOT.'img'.DS.'banner' . DS . $this->request->data['page_banner1'];
                move_uploaded_file($one1['tmp_name'], $pth1);
                }
                  $pa['page_banner1'] = $this->request->data['page_banner1'];
                  $pa['page_status'] =1; 
                  $pa['banner_status'] =1;
                }

if($this->request->data['page_banner2']['name']!="")
                {
                $one2 = $this->request->data['page_banner2'];
                $this->request->data['page_banner2'] = date('Y-m-d-H-i-s') . '_' . uniqid().'.'.pathinfo($one2['name'], PATHINFO_EXTENSION);

                if ($one2['error'] == '0') {
                $pth2 =  WWW_ROOT.'img'.DS.'banner' . DS . $this->request->data['page_banner2'];
                move_uploaded_file($one2['tmp_name'], $pth2);
                }
                  $pa['page_banner2'] = $this->request->data['page_banner2'];
                $pa['page_status'] =1;
                 $pa['banner_status'] =1;
                }
    if($this->request->data['page_banner3']['name']!="")
                {
                $one3 = $this->request->data['page_banner3'];
                $this->request->data['page_banner3'] = date('Y-m-d-H-i-s') . '_' . uniqid().'.'.pathinfo($one3['name'], PATHINFO_EXTENSION);

                if ($one3['error'] == '0') {
                $pth3 =  WWW_ROOT.'img'.DS.'banner' . DS . $this->request->data['page_banner3'];
                move_uploaded_file($one3['tmp_name'], $pth3);
                }
                  $pa['page_banner3'] = $this->request->data['page_banner3'];
                  $pa['page_status'] =1;
                   $pa['banner_status'] =1;
                }

                       // pr($pa);
                       //die;
               
                $pge = $this->Pages->patchEntity($banner,$pa);
                if($this->Pages->save($pge))
                {
                $this->Flash->success(__('Banner has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Banner could not be saved. Please, try again.'));
            }

         }
        $this->set(compact('banner'));
        $this->set('_serialize',['banner']);
    }

     public function viewbanner($id = null)
    {
         $this->viewBuilder()->layout('/Admin/adminheader');
         $banner = $this->Pages->get($id);//->select(['id','page_banner1','page_banner2','page_banner3']);
        $this->set(compact('banner'));
        $this->set('_serialize',['banner']);
    }
    
     // registration here  
    public function add(){
 $this->viewBuilder()->layout('/Admin/adminheader');
   $page = $this->Pages->newEntity();
            if ($this->request->is('post')) {
          $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success(__('Page has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Page could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }
    
     
     public function edit($id = null){
        $this->viewBuilder()->layout('/Admin/adminheader');
         $page = $this->Pages->get($id,[
                'contain'=>[]
            ]); 
         if($this->request->is(['patch','post','put'])){
            $this->request->data['page_status']="1";
            $page = $this->Pages->patchEntity($page,$this->request->data);
            if($this->Pages->save($page)){
                $this->Flash->success(__(' Page has been updated'));
                return $this->redirect(['action'=>'index']);
            }else{
                $this->Flash->error(__('Page could not be updated. Please, try again.'));
            }
         }
    $this->set(compact('page'));
    $this->set('_serialize',['page']);
     }
    
    public function view($id = null){
        $this->viewBuilder()->layout('/Admin/adminheader');
    $users= $this->set('pages',$this->Pages->get($id));
      $this->set('_serialize', ['pages']);  
    }
    
    
        public function delete($id = null)
    {
        $this->viewBuilder()->layout('/Admin/adminheader');
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('Page has been deleted.'));
        } else {
            $this->Flash->error(__('Page could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /*************************************************End Section Sub Admin**********************************************/
}
?>