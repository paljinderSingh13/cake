<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\Helper\FlashHelper;
use Cake\ORM\TableRegistry;
use App\Model\Entity\User;

class UsersController extends AppController
{
    public $components = ['Cookie'];
    public $helpers = ['Form','Flash'];
    public $paginate = ['limit' => 10,
    'order' => [
            'Users.id' => 'desc'
        ]];
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['registration', 'logout','login']);
    }
    public function index(){
        $this->viewBuilder()->layout('/Admin/adminheader');
        $queryUsers = $this->Users->find('all')->where(['role' => 3]);
       if ($this->request->is('post'))
         { // echo 1234234;
        //     print_r($this->request->data);
          $username = trim($this->request->data['username']);
            $queryUsers = $this->Users->find('all')->where(['username like'=>'%'.$username.'%','role' => 3]);
        }

        $this->set('users', $this->paginate($queryUsers));
        $this->set('_serialize', ['users']);   
    }
    

   /* public function login(){
        $this->viewBuilder()->layout('default');
        $this->request->Session()->read('Auth.User.id');
        if($this->request->Session()->read('Auth.User.id')){
            echo $this->redirect('/admin/dashboards/index');
        }else{
           if ($this->request->is('post')) {
            $userAuthenticate = $this->Auth->identify();
            if ($userAuthenticate == true) {
                $this->Auth->setUser($userAuthenticate);
                $this->_setCookie();
                $this->Flash->success(__('User login in '));
                echo $this->redirect('/admin/dashboards/index');
            }else{
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }
}*/
    
    public function login(){
        $this->loadModel('Permissions');
        $this->viewBuilder()->layout('default');
        $this->request->Session()->read('Auth.User.id');
        if($this->request->Session()->read('Auth.User.id')){
            echo $this->redirect('/admin/dashboards/index');
        }else if(!is_null($this->Cookie->read('remember_me'))){
            $cookie = $this->Cookie->read('remember_me');
            if (!is_null($cookie)) {
                $this->request->data = $cookie;
                $user = $this->Auth->identify();
                 $userValue = $this->Auth->setUser($user);
                if ($userValue) {
                        echo $this->redirect('/admin/dashboards/index');
                } else {
                    $this->Cookie->delete('remember_me');
                     echo $this->redirect('/admin/users/login');
                }
            }
        }else if($this->request->is('post') && $this->request->data !=""){
            $userAuthenticate = $this->Auth->identify();
            if ($userAuthenticate == true) {
                $this->Auth->setUser($userAuthenticate);
          if (isset($this->request->data['remember_me']) && $this->request->data['remember_me'] == "on"){
            $cookie = array();
            $cookie['username'] = $this->request->data['username'];
            $cookie['password'] = $this->request->data['password'];
            $this->Cookie->write('remember_me', $cookie, true, "1 week","","","","",true);
            unset($this->request->data['remember_me']);
          }
             echo $this->redirect('/admin/dashboards/index');
                $this->Flash->success(__('User login in'));
            }else{
                $this->Flash->error(__('Invalid username or password, try again'));
            }
            
        }
    
}
    
public function logout(){
    $this->Cookie->delete('remember_me');
    echo $this->redirect($this->Auth->logout());
     $this->Flash->success(__('User logout '));
}

     // registration here  
public function add(){
   $this->viewBuilder()->layout('/Admin/adminheader');
   $user = $this->Users->newEntity(); 
   if ($this->request->is('post')) {
    $this->request->data['role']="3";
    $this->request->data['status']="1";

    $date = explode('/',$this->request->data['signupdate']);
    $mainDate  = $date[2]."-".$date[0]."-".$date[1] ;
    $this->request->data['signupdate'] = $mainDate;
           // pr($this->request->data);
           // exit;
    $user = $this->Users->patchEntity($user, $this->request->data);
    if ($this->Users->save($user)) {
        $this->Flash->success(__('The user has been saved.'));
        return $this->redirect(['action' => 'index']);
    } else {
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
} 
/* doubt on this topic*/
$this->set(compact('user'));
$this->set('_serialize', ['user']);
}

    //dashboard here
public function dashboard(){
    $this->viewBuilder()->layout('/Admin/adminheader');
        //echo "User logged in successfully";
}

public function edit($id = null){
    $this->viewBuilder()->layout('/Admin/adminheader');
    $user = $this->Users->get($id,[
        'contain'=>[]
        ]); 
    if($this->request->is(['patch','post','put'])){


        if(isset($this->request->data['image']))
        {
           $one2 = $this->request->data['image'];
           $this->request->data['image'] = time().'.' . pathinfo($one2['name'], PATHINFO_EXTENSION);

           if ($one2['error'] == '0') {
                $pth2 =  WWW_ROOT.'img'.DS.'user' . DS . $this->request->data['image'];
            move_uploaded_file($one2['tmp_name'], $pth2);
        }
    }
    $this->request->data['role']="3";
    $this->request->data['status']="1";
    // $date = explode('/',$this->request->data['signupdate']);
    // $mainDate  = $date[2]."-".$date[0]."-".$date[1] ;
    $mainDate = date('Y-m-d', strtotime($this->request->data['signupdate']));
    $this->request->data['signupdate'] = $mainDate;

    $user = $this->Users->patchEntity($user,$this->request->data);
    if($this->Users->save($user)){
        $this->Flash->success(__('This user has been updated'));
        return $this->redirect(['action'=>'index']);
    }else{
        $this->Flash->error(__('This user could not be updated. Please, try again.'));
    }
}
$this->set(compact('user'));
$this->set('_serialize',['user']);
}

//______________________User Suspend________________________//
public function suspenduser($id=null,$status=null)
{
  // print_r($id); 

  
   if($status=='s')
   {
$user_status['status'] = 0;
$message = 'suspend';
   }else if($status=='u'){
$user_status['status'] = 1;
$message = 'un suspend';

   }
    $user = $this->Users->get($id);
    
    $user = $this->Users->patchEntity($user,$user_status);
    if($this->Users->save($user))
    {
         $this->Flash->success(__('This user has been '.$message));
        return $this->redirect('/admin/users/edit/'.$id);
    }

}
public function view($id = null){
    $this->viewBuilder()->layout('/Admin/adminheader');
    $users= $this->set('users',$this->Users->get($id));
    $this->set('_serialize', ['users']);  
}


public function delete($id = null)
{
    $this->viewBuilder()->layout('/Admin/adminheader');
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);
    if ($this->Users->delete($user)) {
        $this->Flash->success(__('The user has been deleted.'));
    } else {
        $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'index']);
}

/************************************************Section Sub Admin**************************************************/
public function subAdmin(){
    $this->viewBuilder()->layout('/Admin/adminheader');
    $query = $this->Users->find('all')->where(['role' => 2]);

if($this->request->is(['patch','post','put']))
    {
$query = $this->Users->find('all')->where(['username like'=>$_POST['username'].'%','role' => 2]);

    }
    $this->set('users', $this->paginate($query));
    $this->set('_serialize', ['users']);  
}
//____________________Forgot Password_______________

public function forgot()
{
$this->viewBuilder()->layout('forgot');
}


//_____________________Delete Sub Admin__________________//
public function deletesubadmin($id = null)
{
    $this->loadModel('Users');
    $this->viewBuilder()->layout('/Admin/adminheader');

 //  echo $id; die;
   // $this->request->allowMethod(['post', 'delete']);

    $user = $this->Users->get($id);
   
    if ($this->Users->delete($user)) {


        $this->Flash->success(__('The subadmin has been deleted.'));
    } else {
        $this->Flash->error(__('The subadmin could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'subAdmin']);
}
//_____________________viewsubadmin____________________//
public function viewsubadmin($id=null)
{   
    $this->viewBuilder()->layout('/Admin/adminheader');
    $userdata =  $this->Users->get($id,['contain'=>['Permissions']]);

    $this->set(compact('userdata'));
    $this->set('_serialize',['userdata']);
}
//_____________________EDIT SUB-ADMIN___________________//    
public function editsubadmin($id=null)
{
    $this->viewBuilder()->layout('/Admin/adminheader');
    $this->loadModel('Permissions');
    $subadmin =  $this->Users->get($id,['contain'=>['Permissions']]);


    if($this->request->is(['patch','post','put']))
    {
//        if(isset($this->request->data['password']) && $this->request->data['password']!=''){
//            $this->request->data['password'];
//        }
        
             $permission =  $this->Permissions->find()->select(['id'])->where(array('user_id'=>$id));//->count();
             // $permission->toArray();
            
             $count = $permission->count();
             if($count==0)
             {
                $perm = $this->Permissions->newEntity();
                 $this->request->data['user_id']=$id;
             }else{
                $permissions =  $this->Permissions->find()->select(['id'])->where(array('user_id'=>$id))->toArray();
                $pid = $permissions[0]['id'];
                $perm = $this->Permissions->get($pid);
            }


            if(!isset($this->request->data['permission_products']))
            {
                $this->request->data['permission_products']=0;

            }
      
            if(!isset($this->request->data['permission_users']))
            {
                $this->request->data['permission_users']=0;

            }
            if(!isset($this->request->data['permission_promo_codes']))
            {
                $this->request->data['permission_promo_codes']=0;

            }
            if(!isset($this->request->data['permission_static_pages']))
            {
                $this->request->data['permission_static_pages']=0;

            }
            if(!isset($this->request->data['permission_orders']))
            {
                $this->request->data['permission_orders']=0;

            }
            if(!isset($this->request->data['permisson_notification']))
            {
                $this->request->data['permisson_notification']=0;

            }
            if(!isset($this->request->data['permisson_sale']))
            {
                $this->request->data['permisson_sale']=0;
            }
       // pr($this->request->data);
            $user = $this->Users->patchEntity($subadmin ,$this->request->data);
            $this->Users->save($user);
            $permission  =  $this->Permissions->patchEntity($perm, $this->request->data);
            $this->Permissions->save($permission);
            return $this->redirect(['action'=>'subAdmin']);
        }
        $this->set(compact('subadmin'));
        $this->set('_serialize', ['subadmin']); 
    }

    public function subAdminAdd(){
        $this->viewBuilder()->layout('/Admin/adminheader');
        $this->loadModel('Permissions');
        $configureAccess = array('permission_products'=>'Add/Edit/Delete Products','permission_users'=>'Add/Edit/Delete Users','permission_promo_codes'=>'Add/Edit/Delete Promo Codes','permission_static_pages'=>'Add/Edit/Delete Static Pages','permission_orders'=>'Add/Edit/Delete Orders');
        $this->set('configureAccess',$configureAccess);
        $user = $this->Users->newEntity(); 
        if ($this->request->is('post','put')) {
               

            $this->request->data['role']="2";
            $this->request->data['status']="1";

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($inserted = $this->Users->save($user)) {
              $getlastInsertedId = $inserted->id;
              $this->request->data['user_id'] = $getlastInsertedId;
              $permisson = $this->Permissions->newEntity();
              $permisson =$this->Permissions->patchEntity($permisson, $this->request->data);

              if($this->Permissions->save($permisson))
              {

                $this->Flash->success(__('The sub admin has been saved.'));
                echo $this->redirect(['action' => 'subAdmin']);
              }
              else{
              $this->Flash->error(__('The sub admin could not be saved. Please, try again.'));

              }

            //       if($getlastInsertedId>0){
            //         $keyvalue = array();
            //          foreach($this->request->data['allow'] as $key=>$value){
            //             if(isset($value[0]) && !empty($value[0])){
            //             $keyvalue[$key] = $value[0];
            //             }else{
            //              $keyvalue[$key] = 0;
            //          }
            //          }
            //         if(isset($keyvalue[1]) && !empty($keyvalue[1])){
            //              $permission_products = $keyvalue[1];
            //          }else{
            //             $permission_products = "0";
            //          }
            //         if(isset($keyvalue[2]) && !empty($keyvalue[2])){
            //           $permission_users = $keyvalue[2];
            //          }else{
            //             $permission_users = "0";
            //          }
            //         if(isset($keyvalue[3]) && !empty($keyvalue[3])){
            //             $permission_promo_codes = $keyvalue[3];
            //          }else{
            //             $permission_promo_codes = "0";
            //          }
            //         if(isset($keyvalue[4]) && !empty($keyvalue[4])){
            //             $permission_static_pages = $keyvalue[4];
            //          }else{
            //             $permission_static_pages = "0";
            //          }
            //          if(isset($keyvalue[5]) && !empty($keyvalue[5])){
            //              $permission_orders = $keyvalue[5];
            //          }else{
            //             $permission_orders = "0";
            //          }

            //     $permissionTable = TableRegistry::get('Permissions');
            //   $permission= $permissionTable->newEntity();
            //   $permission->user_id = $getlastInsertedId;
            //  $permission->permission_products = $permission_products;
            //  $permission->permission_users= $permission_users;
            //  $permission->permission_promo_codes= $permission_promo_codes;
            //  $permission->permission_static_pages= $permission_static_pages;
            // $permission->permission_orders= $permission_orders;
            // $permissionTable->save($permission);
          }else{
            $this->Flash->error(__('The sub admin could not be saved. Please, try different name.'));  
          }
          
      } 
} 






/************************************************End Section Sub Admin**********************************************/
}
?>