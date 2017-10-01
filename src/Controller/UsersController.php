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
use Cake\ORM\Table;
use Cake\ORM\Query;
use App\Model\Entity\User;
use Cake\Mailer\Email;
use Cake\View\ViewBuilder;
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
class UsersController extends AppController
{
    public $helpers = ['Form'];
    public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
}

 public function beforeFilter(Event $event){
      parent::beforeFilter($event);
       $this->Auth->allow(['appRegistration','appLogin','appLogout','appUpdateProfile','appUserDelete','appForgotPassword','appSocialLogin','appCountyList',              'addDeliveryAdrs' ,  'deliveryDetail' ,'enquiry','enquiryDetail']);
}
    
    public function index(){
       
       $users = $this->Users->find('all');
       $this->set(compact('users'));
      //   $this->set('users',$this->Users->find('all'));
       // pr($this->Users->find('all'));
    }
    
    public function registration(){
        
    echo $word = "1231223";
    //Inflector::singularize($word);camelize,underscore,singularize
    }
    
    public function loginsection(){
        
    }
    public function logout(){
        
    }
    public function dashboard(){
        
    }
    
    /*******************************************************App Functions*********************************************/
/*   public function getUserInfo($userid){
    if(isset($userid) && $userid>0){
     $this->Users->id = $userid;
     $users = $this->Users->get($this->Users->id);    
    return $users; 
    }else{
     return "User id not found";
    }
}*/



public function getUserInfo($userid){
    if(isset($userid) && $userid>0){
     $this->Users->id = $userid;
     $users = $this->Users->get($this->Users->id);
     $userArr = array();

     if(isset($users->id) && (!empty($users->id))){
        $uArr['id'] = $users->id;
     }
    if(isset($users->firstname) && (!empty($users->firstname))){
        $uArr['firstname'] = $users->firstname;
     }else{
        $uArr['firstname'] = '';
     }
    if(isset($users->lastname) && (!empty($users->lastname))){
        $uArr['lastname'] = $users->lastname;
     }else{
        $uArr['lastname'] = '';
     }
    if(isset($users->username) && (!empty($users->username))){
        $uArr['username'] = $users->username;
     }else{
        $uArr['username'] = '';
     }
     if(isset($users->emailid) && (!empty($users->emailid))){
        $uArr['emailid'] = $users->emailid;
     }else{
        $uArr['emailid'] = '';
     }
    if(isset($users->phone_code) && !empty($users->phone_code)){
        $uArr['phone_code'] = $users->phone_code;
     }else{
        $uArr['phone_code'] = '';
     }

    if(isset($users->phone) && (!empty($users->phone))){
        $uArr['phone'] = $users->phone;
     }else{
        $uArr['phone'] = '';
     }
    if(isset($users->role) && $users->role>0){
        $uArr['role'] = $users->role;
     }else{
        $uArr['role'] = '';
     }
     
    if(isset($users->image) && (!empty($users->image))){
        $uArr['image'] = $this->request->scheme().'://'.$this->request->host().$this->request->base.DS.'img'.DS.'user' . DS .$users->image;
     }else{
        $uArr['image'] = '';
     }  
     if(isset($users->address_line1) && (!empty($users->address_line1))){
        $uArr['address_line1'] = $users->address_line1;
     }else{
        $uArr['address_line1'] = '';
     }
    if(isset($users->address_line2) && (!empty($users->address_line2))){
        $uArr['address_line2'] = $users->address_line2;
     }else{
        $uArr['address_line2'] = '';
     }
         if(isset($users->city) && (!empty($users->city))){
        $uArr['city'] = $users->city;
     }else{
        $uArr['city'] = '';
     }
         if(isset($users->country) && (!empty($users->country))){
        $uArr['country'] = $users->country;
     }else{
        $uArr['country'] = '';
     }
     if(isset($users->postal_code) && (!empty($users->postal_code))){
        $uArr['postal_code'] = $users->postal_code;
     }else{
        $uArr['postal_code'] = '';
     }
    if(isset($users->signupdate) && $users->signupdate!='0000-00-00' ){
        $uArr['signupdate'] = $users->signupdate;
     }else{
        $uArr['signupdate'] = '';
     }
     
    if(isset($users->status) && $users->status>0){
        $uArr['status'] = $users->status;
     }else{
        $uArr['status'] = '';
     }
     
     if(isset($users->device_token) && (!empty($users->device_token))){
        $uArr['device_token'] = $users->device_token;
     }else{
        $uArr['device_token'] = '';
     }
     
 if(isset($users->device_type)){
        $uArr['device_type'] = $users->device_type;
     }else{
        $uArr['device_type'] = '';
     }
 return $uArr;
    }else{
     return "User id not found";
    }
}
   
    function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

   //App Registration
  //field - username,password,emailid
    public function appRegistration(){
         $user = $this->Users->newEntity();
        if($this->request->is('post') && (!empty($this->request->data))){
            //get table users record 
            $UserTable = TableRegistry::get('Users');
$exists = $UserTable->exists(['emailid' => $this->request->data['emailid']]);
$usernameexists = $UserTable->exists(['username' => $this->request->data['username']]);

    if($exists == 1 && $this->request->data['emailid']!=''){
                $arrdetail['error'] = '1';
                $arrdetail['response'] = 'Email already exits'; 
    }elseif($usernameexists==1){
				$arrdetail['error'] = '1';
                $arrdetail['response'] = 'Username already exists'; 
	}else{
$this->request->data['role']=3;
$this->request->data['status']=1;
         $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)){
				$arrdetail['UserInfo'] = $this->getUserInfo($user->id) ;
				$arrdetail['error'] = '0';													
				$arrdetail['response'] = "user registered successfully";
             }else{
                $arrdetail['error'] = '2';
			    $arrdetail['response'] = 'Please try again';
             }
    }
   }else{
                $arrdetail['error'] = '3';
                $arrdetail['response'] = 'Parameters are missing';
        }

         $this->set([
            'message' => $arrdetail,
            '_serialize' => ['message']
        ]);           
    }
   
//_______________Start Add Delivery Address____________________///

Public function addDeliveryAdrs()
{
if($this->request->is('post') && (!empty($this->request->data)))
{
 if(isset($this->request->data['user_id'])  &&  isset($this->request->data['fullname']) && isset($this->request->data['address']) &&  isset($this->request->data['country'])&&  isset($this->request->data['postalcode']) &&  isset($this->request->data['phone']))  
     {
        $this->loadModel('Deliveryaddress');
        $delivery =  $this->Deliveryaddress->newEntity();
        $delivery = $this->Deliveryaddress->patchEntity($delivery ,$this->request->data);
        if($this->Deliveryaddress->save($delivery))
        {
            $arrdetail['error'] = '0';
            $arrdetail['response'] = 'Delivery address submit successfully';
            $arrdetail['deliveryDetail'] = $this->deliveryDetail($this->request->data['user_id']) ;
         }else if(isset($this->request->data['user_id']))
         {
             $arrdetail['error'] = '0';
            $arrdetail['deliveryDetail'] = $this->deliveryDetail($this->request->data['user_id']) ;
        }
        else{
                 $arrdetail['error'] = '0';
                $arrdetail['deliveryDetail'] = $this->deliveryDetail($this->request->data['user_id']) ;
         }
    }
    else{
    $arrdetail['deliveryDetail'] = $this->deliveryDetail($this->request->data['user_id']);
        }

}
else{
                $arrdetail['error'] = '1';
                $arrdetail['response'] = 'Parameters are missing';
       }

        $this->set([
             'message' => $arrdetail,
            '_serialize' => ['message']
            ]);
}

public function deliveryDetail($userid)
{
        $this->loadModel('Deliveryaddress');
        $detail = $this->Deliveryaddress->find()->where(array('user_id'=>$userid));

        return $detail;

}


//_______________End Add Delivery Address____________________///


//_______________Start Enquiry____________________///

public function enquiry()
{

    $this->loadModel("Enquirys");
    if($this->request->is('post') && (!empty($this->request->data)))
    {
        $enquiry =  $this->Enquirys->newEntity();
        $enquiry =  $this->Enquirys->patchEntity($enquiry,$this->request->data);
        if($this->Enquirys->save($enquiry))
        {
            $arrdetail['error'] = '0';
            $arrdetail['response'] = 'Delivery detail add successfully';
        }
    }
    else{
        $arrdetail['error'] = '1';
        $arrdetail['response'] = 'Parameters are missing';
    }
    $this->set([
        'message' => $arrdetail,
        '_serialize' => ['message']
        ]);
}

// public function  enquiryDetail($userid)
// {
//    $this->loadModel("Enquirys");
//    $detail = $this->Enquirys->find()->where(array('user_id'=>$userid));
//   return $detail;
// }


//_________________end enquiry __________________///

    //App Login
    //field - emailid,password
    Public function appLogin(){
        if($this->request->is('post') && (!empty($this->request->data))){
			
        $userAuthenticate = $this->Auth->identify();
            if($userAuthenticate == true){
                $userrArr=array();
             $this->Auth->setUser($this->Auth->identify());
                //$userArr['id']  = $this->request->Session()->read('Auth.User.id');
                //$userArr['username'] = $this->request->Session()->read('Auth.User.username');
                //$userArr['image'] = $this->request->Session()->read('Auth.User.image');
			$arrdetail['UserInfo'] = $this->getUserInfo($this->request->Session()->read('Auth.User.id')) ;
            $arrdetail['error'] = '0';
            $arrdetail['response'] = 'Successfully logged in....';
            }else{ 
                $arrdetail['error'] = '1';
                $arrdetail['response'] = 'Invalid Credential.';
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
    
    //App Logout
    //field - no field
    Public function appLogout(){
         if($this->request->is('post')){
            if ($this->Auth->logout()) {
                $arrdetail['error'] = '0';
                $arrdetail['response'] = 'User logout successfully';
            } else {
                $arrdetail['error'] = '1';
                $arrdetail['response'] = 'can not logout';
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

    
    //App Update Profile
    //field - firstname,lastname,emailid,image,password,phone,role,address_line1,address_line2,city,country,postalcode
    Public function appUpdateProfile(){
        
       if($this->request->is(['post','put'])){
		/******************for profile photo upload*********************/
		  if(isset($_FILES['image'])){
			$one21 = $_FILES['image'];
            $this->request->data['image'] = date('YmdHis') . '.' . pathinfo($one21['name'], PATHINFO_EXTENSION);
            if ($one21['error'] == '0') {
               $pth21 = WWW_ROOT.'img'.DS.'user' . DS . $this->request->data['image'];
                move_uploaded_file($one21['tmp_name'], $pth21);
              }
			 }
		  /**************************************/
          
    $this->Users->id = $this->request->data['id'];
    $users = $this->Users->get($this->Users->id);            
         $userRecord = $this->Users->patchEntity($users, $this->request->data);
         if($this->Users->save($userRecord)){

@$this->request->data['fullname']  =  @$this->request->data['firstname'].' '. @$this->request->data['lastname'];
@$this->request->data['address']  =  @$this->request->data['address_line1'].' '. @$this->request->data['address_line2'].', '. @$this->request->data['city']; 
@$this->request->data['postalcode']  = @$this->request->data['postal_code'];  



	   $arrdetail['UserInfo'] = $this->getUserInfo($this->request->data['id']) ;

       $this->request->data['user_id'] =       $this->request->data['id'];
            unset($this->request->data['id']);

                $this->loadModel('Deliveryaddress');
        $delivery =  $this->Deliveryaddress->newEntity();
        $delivery = $this->Deliveryaddress->patchEntity($delivery ,$this->request->data);
        if($this->Deliveryaddress->save($delivery))
        {}
                $arrdetail['error'] = '0';
                $arrdetail['response'] = 'Record updated successfully';
         }else{
                 $arrdetail['error'] = '1';
                $arrdetail['response'] = 'Record not updated successfully';
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
    
    //App Delete User 
    Public function appUserDelete(){
 if($this->request->is(['post','delete'])){
    $this->Users->id = $this->request->data['id'];
    $users = $this->Users->get($this->Users->id);            
         if($this->Users->delete($users)){
                $arrdetail['error'] = '0';
                $arrdetail['response'] = 'Record deleted successfully';
         }else{
                 $arrdetail['error'] = '1';
                $arrdetail['response'] = 'Record not deleted successfully';
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
    
    //App Forgot Password
    
    Public function appForgotPassword(){
        $UserTable = TableRegistry::get('Users');
     
        if($this->request->is('post') && (!empty($this->request->data))){
        @$exists = $UserTable->exists(['emailid' => $this->request->data['emailid']]);
       @$usernameExist = $UserTable->exists(['username' => $this->request->data['username']]);
       
      ///$exists = $UserTable->exists($this->Users->findByUsernameOrEmailid($this->request->data['username'], $this->request->data['emailid']));
    if($exists == 1){
    @$emailRecord = $this->Users->find()->where(['emailid' => $this->request->data['emailid']])->toArray();
    $email = new Email('default');
    $username = $emailRecord[0]['username'];
    $password = $this->randomPassword();

    $url = $this->request->host().'/'.$this->request->base;
    
    //update password record
   $userRecord = $UserTable->get($emailRecord[0]['id']);
    $userRecord->password = $password;
    $UserTable->save($userRecord);

    $msg= "Your new password  has been generated <br>Please login with given credential.<br><br>
	<b>Username: </b>" . $username . "<br><b>Password: </b>" . $password;
    $email->from(['phpdeveloper01@gmail.com' => 'DBR Website'])
          ->to($this->request->data['emailid'])
          ->subject('Forgot Password')
          ->send($msg);         
       /*   $queryUser = $this->Users->query();
          $queryUser->update()
          ->set(['password' => $password])
          ->where(['id' => $emailRecord[0]['id']])
          ->execute();  */
        
        $arrdetail['error'] = '0';
            $arrdetail['response'] = 'Your request has been submitted.we will send you an email shortly. Thank you.'; 
            }            
            elseif($usernameExist == 1){
            $usernameQuery = $this->Users->find()->where(['username' => $this->request->data['username']])->toArray();
            if($usernameQuery[0]['emailid']!=""){
                $email = new Email('default');
                $username = $this->request->data['username'];
                $password = $this->randomPassword();
                $url = $this->request->host().'/'.$this->request->base;
            // update password by username
    $userRecord = $UserTable->get($usernameQuery[0]['id']);
    $userRecord->password = $password;
    $UserTable->save($userRecord);
    
    $msg= "Your new password  has been generated <br>Please login with given credential.<br><br>
	<b>Username: </b>" . $username . "<br><b>Password: </b>" . $password;
    
    
    $email->from(['phpdeveloper01@gmail.com' => 'DBR Website'])
          ->to($usernameQuery[0]['emailid'])
          ->subject('Forgot Password')
          ->send($msg); 
                 $arrdetail['error'] = '0';
                 $arrdetail['response'] = 'Your request has been submitted.we will send you an email shortly. Thank you.'; 
            }else{
                $arrdetail['error'] = '1';
                $arrdetail['response'] = 'Sorry can not find email id associated with this username.'; 
            }
            }else{   
                $arrdetail['error'] = '1';
                $arrdetail['response'] = 'User not found'; 
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
  
   //Social Login
 public function appSocialLogin(){
    $UserTable = TableRegistry::get('Users');
        if($this->request->is('post') && (!empty($this->request->data))){
            if(isset($this->request->data['social_id']) && (!empty($this->request->data['social_id']))){
            @$usernameExist = $UserTable->exists(['social_id' => $this->request->data['social_id'],'social_type' => $this->request->data['social_type']]);
            if($usernameExist == 1){
            $userlist = $this->Users->find()->where(['Users.social_id ='=>$this->request->data['social_id'],'Users.status ='=>1])->toArray();
            $arrdetail['error'] = '1'; 
            $arrdetail['response'] = 'User login successfully...';
            $arrdetail['UserInfo'] = $this->getUserInfo($userlist[0]['id']);
                    }else{
        $user = $this->Users->newEntity();
        $exists = $UserTable->exists(['emailid' => $this->request->data['emailid']]);
        $usernameexists = $UserTable->exists(['username' => $this->request->data['username']]);
            if($exists == 1){
            $arrdetail['error'] = '2';
            $arrdetail['response'] = 'Email already exits'; 
    }elseif($usernameexists == 1){
            $arrdetail['error'] = '2';
            $arrdetail['response'] = 'Username already exists'; 
	}else{
        $this->request->data['username'] = $this->request->data['social_id'];
	$this->request->data['password'] = $this->request->data['social_id'];
        $this->request->data['role']=3;
        $this->request->data['status']=1;
        $user = $this->Users->patchEntity($user, $this->request->data);
        if($this->Users->save($user)){
                $userlist = $this->Users->find()->where(['Users.id ='=>$user->id,'Users.status ='=>1])->toArray();
                $arrdetail['UserInfo'] = $this->getUserInfo($userlist[0]['id']);
				$arrdetail['error'] = '0';													
				$arrdetail['response'] = "user registered successfully";
               
             }else{
                $arrdetail['error'] = '1';
			    $arrdetail['response'] = 'Please try again';
             }
        } 
    }           
            }else{
        $arrdetail['error'] = '1';
        $arrdetail['response'] = 'Please try again'; 
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

function appCountyList(){
    $this->loadModel('countries');
    $countryList = $this->countries->find('all',array('fields'=>array('iso','name','phonecode')));
    if(!empty($countryList)){
        $arrdetail['error'] = '0';
        $arrdetail['Country'] = $countryList;
    }else{
        $arrdetail['error'] = '0';
        $arrdetail['response'] = 'No country found.';
    }
     $this->set([
            'message' => $arrdetail,
            '_serialize' => ['message']
                    ]);
    }    

}
