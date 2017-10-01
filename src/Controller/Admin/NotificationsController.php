<?php

namespace App\Controller\Admin;

use Cake\Event\Event;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Brand;
use App\Model\Entity\Promocodes;
use Cake\Network\Exception\NotFoundException;


class NotificationsController extends AppController
{

   public $paginate = ['limit' => 10,
   'order' => [
            'Notifications.id' => 'desc'
        ]];

public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow('delete');
  }

  public function index()
  {  
    
      $this->viewBuilder()->layout('/Admin/adminheader');
      $this->loadModel('Users');
      $query =  $this->Notifications->find()->contain(['Usernotifications']);
      $notification = $this->paginate($query);
      $notification->user = $this->Users->find();
      // foreach ($notification['user'] as  $value) {
      //   echo $value->id;
      //   # code...
      // }
        //print_r($notification);   
        //die;
      $this->set(compact('notification'));
      $this->set('_serialize',['notification']);
  }  
  public function userdata()
  {
      $this->loadModel('Users');
      $this->loadModel('Usernotifications');
      
      $u_data = $this->Users->find('all')->select(['id','username'])->toArray();
      if(isset($_POST['type']))
      {
         $u_data['user_notif'] =  $this->Usernotifications->find()->where(array('notification_id'=>$_POST['id'])); //get($_POST['id'],[
      }

      echo json_encode($u_data);

      die;
  }

  public function usersearch()
  {
    //pr($_POST);
    $this->loadModel('Users');
    $this->loadModel('Usernotifications');
      $u_data = $this->Users->find('all')->select(['id','username'])->where(array('username like'=>$_POST['username'].'%'))->toArray();
      if(isset($_POST['id']))
      {
         $u_data['user_notif'] =  $this->Usernotifications->find()->where(array('notification_id'=>$_POST['id']));
          
      }

     echo json_encode($u_data); 
    die;

  }

  public function edit($id = null)
  {
    $this->viewBuilder()->layout('/Admin/adminheader');
    $this->loadModel('Usernotifications');
    $this->loadModel('Users');
   
        $notification =  $this->Notifications->get($id,[
          'contain'=>'Usernotifications'
          ]);

        $notification->user = $this->Users->find();
        
        if($this->request->is(['patch','post','put']))
    {
      pr($this->request->data);
     $count =$this->Usernotifications->find()->where(array('notification_id'=>$id))->count();
      $us_notif['notification_id'] = $id;
      if($count==0)
      {
              for($i =0; $i < count($this->request->data['user_id']); $i++)
              {
                $us_notif['user_id']  = $this->request->data['user_id'][$i];
               $user_notif = $this->Usernotifications->newEntity();
                $user_notif = $this->Usernotifications->patchEntity($user_notif,$us_notif );
                $this->Usernotifications->save($user_notif);
              }  
      }
      else if($this->Usernotifications->deleteAll(array('notification_id'=>$id)))
      {
             for($i =0; $i < count($this->request->data['user_id']); $i++)
              {
                $us_notif['user_id']  = $this->request->data['user_id'][$i];
               $user_notif = $this->Usernotifications->newEntity();
                $user_notif = $this->Usernotifications->patchEntity($user_notif,$us_notif );
                $this->Usernotifications->save($user_notif);
              }  

      }
      
      $notification = $this->Notifications->patchEntity($notification, $this->request->data);
      if($this->Notifications->save($notification))
      {
        $this->Flash->success(__('This notification has been updated'));
        return $this->redirect(['action'=>'index']);
      }else{
        $this->Flash->error(__('This notification could not be updated. Please, try again.'));
      }
    }

        $this->set(compact('notification'));
        $this->set('_serialize',['notification']);
 // echo $id;
    // $this->loadModel('Promocodes');
    // $promocodes  = $this->Promocodes->get($id,[
    //   'contain'=>[]
    //   ]); 
    // if($this->request->is(['patch','post','put']))
    // {
    //   pr($this->request->data);

    //   $promocodes = $this->Promocodes->patchEntity($promocodes, $this->request->data);
    //   if($this->Promocodes->save($promocodes))
    //   {
    //     $this->Flash->success(__('This promocodes has been updated'));
    //     return $this->redirect(['action'=>'index']);
    //   }else{
    //     $this->Flash->error(__('This promocodes could not be updated. Please, try again.'));
    //   }
    // }


    
    // $this->set(compact('promocodes'));
    // $this->set('_serialize',['promocodes']);

  }

  public function delete($id = null)
  { 
        $this->viewBuilder()->layout('/Admin/adminheader');
        if (empty($id)) {
        throw new NotFoundException(__('Notifications not found'));
        }

        $notifications = $this->Notifications->get($id);
        if ($this->Notifications->delete($notifications)) {
        $this->Flash->success(__('The Notification has been deleted.'));
        } else {
        $this->Flash->error(__('The Notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
  }

  public function view($id = null)
  {
    $this->viewBuilder()->layout('/Admin/adminheader');
    $this->loadModel('Usernotifications');
     $this->loadModel('Users');
   
        $notification =  $this->Notifications->get($id,[
          'contain'=>'Usernotifications'
          ]);

        $notification->user = $this->Users->find();
      

        $this->set(compact('notification'));
        $this->set('_serialize',['notification']);
  }

  public function add()
  {

    $this->loadModel('Usernotifications');
   $this->viewBuilder()->layout('/Admin/adminheader');
   $this->loadModel('Users');
   $notification['user'] = $this->Users->find('all')->select(['id','username']);
    if($this->request->is(['post']))
    {
         $this->request->data['status']=1;
          $this->request->data['type']='notification';
         $this->request->data['create_date']=date("Y-m-d");
         $notifi = $this->Notifications->newEntity();
         $notifi = $this->Notifications->patchEntity($notifi,$this->request->data);
         if($this->Notifications->save($notifi))
         {
           $user_notif['notification_id'] = $notifi->id;
           for($i =0; $i<count($this->request->data['user_id']); $i++)
          {
             $user_notif['user_id'] = $this->request->data['user_id'][$i];
             $us_notif = $this->Usernotifications->newEntity();
             $us_notif = $this->Usernotifications->patchEntity($us_notif,$user_notif);
             $this->Usernotifications->save($us_notif);
           

          }

          $this->redirect(['action'=>'index']);
           
      }
      

    
    }
    $this->set(compact('notification'));
    $this->set('_serialize', ['notification']);

  }









}