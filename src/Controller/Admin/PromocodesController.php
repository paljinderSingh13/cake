<?php

namespace App\Controller\Admin;

use Cake\Event\Event;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Brand;
use App\Model\Entity\Promocodes;
use Cake\Network\Exception\NotFoundException;


class PromocodesController extends AppController
{

   public $paginate = ['limit' => 10];
  // public function __construct()
  // {
  //   echo 1213;
  // } 

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow('delete');
    $this->loadComponent('Flash');
  }

  public function index()
  {

    $this->viewBuilder()->layout('/Admin/adminheader');
    $query =  $this->Promocodes->find()->select(['id','promocode','discount_type', 'discount', 'quantity', 'amount', 'excced_amount' , 'expiry_date', 'usage_type'])->order(['id' => 'DESC']);;
    $promocodes = $this->paginate($query);

    $this->loadModel('Settings');
    $setting_query = $this->Settings->find(); 
    $setting_results = $setting_query->all();
    $promocodes->setting = $setting_results->toArray();
    $this->set(compact('promocodes'));
    $this->set('_serialize',['promocodes']);
  }  

  public function edit($id = null)
  {
    $this->viewBuilder()->layout('/Admin/adminheader');
 // echo $id;
    $this->loadModel('Promocodes');
    $promocodes  = $this->Promocodes->get($id,[
      'contain'=>[]
      ]); 
    if($this->request->is(['patch','post','put']))
    {
$this->request->data['expiry_date'] = date('Y-m-d' , strtotime($this->request->data['expiry_date']));

      $promocodes = $this->Promocodes->patchEntity($promocodes, $this->request->data);
      if($this->Promocodes->save($promocodes))
      {
        $this->Flash->success(__('This promocodes has been updated'));
        return $this->redirect(['action'=>'index']);
      }else{
        $this->Flash->error(__('This promocodes could not be updated. Please, try again.'));
      }
    }


    $this->loadModel('Settings');
    $setting_query =    $this->Settings->find(); 
    $setting_results = $setting_query->all();
    $promocodes['setting'] = $setting_results->toArray();
    $this->set(compact('promocodes'));
    $this->set('_serialize',['promocodes']);

  }

  public function delete($id = null)
  { 
        $this->viewBuilder()->layout('/Admin/adminheader');
        if (empty($id)) {
        throw new NotFoundException(__('Article not found'));
        }

        $promocodes = $this->Promocodes->get($id);
        if ($this->Promocodes->delete($promocodes)) {
        $this->Flash->success(__('The promocode has been deleted.'));
        } else {
        $this->Flash->error(__('The promocodes could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
  }

  public function view($id = null)
  {
     $this->viewBuilder()->layout('/Admin/adminheader');
    $promocodes =  $this->Promocodes->get($id);
    
    $this->loadModel('Settings');
    $setting_query =  $this->Settings->find(); 
    $setting_results = $setting_query->all();
    $promocodes->setting = $setting_results->toArray();
    
    $this->set(compact('promocodes'));
    $this->set('_serialize',['promocodes']);
 
    }

  public function add()
  {
    $this->viewBuilder()->layout('/Admin/adminheader');
    $this->loadModel('Settings');
    $setting_query =    $this->Settings->find(); 
    $setting_results = $setting_query->all();
    $promocode['setting'] = $setting_results->toArray();
    if($this->request->is(['post']))
    { 
      $data = $this->request->data;
      $data['expiry_date'] = date('Y-m-d',strtotime($data['expiry_date']));
      $promocodes = $this->Promocodes->newEntity();
      $promocodes = $this->Promocodes->patchEntity($promocodes,$data);
      if($this->Promocodes->save($promocodes)){
         echo $this->Flash->success(__('This Promocode has been added')); 

     echo $this->redirect(['controller'=>'promocodes','action' => 'index']);
      }else{
          echo $this->Flash->error(__('This Promocode has not been added')); 
      }
     }
    // $this->redirect(['controller'=>'promocodes','action'=>'index']);
    $this->set(compact('promocode'));
    $this->set('_serialize', ['promocode']);

  }









}