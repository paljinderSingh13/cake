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
use Cake\Database\Connection;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class NotificationsController extends AppController
{
    public $helpers = ['Form'];
    public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
}

public function beforeFilter(Event $event)
{
      parent::beforeFilter($event);
      $this->Auth->allow(['enquiry','notificationList']);
}

public function index()
{

$users = $this->Users->find('all');
$this->set(compact('users'));
//   $this->set('users',$this->Users->find('all'));
// pr($this->Users->find('all'));
}


public function notificationList()
{
if($this->request->is('post') && (!empty($this->request->data['user_id'])))
{
		$limit = isset($this->request->data['limit']) ? $this->request->data['limit'] : 10;
        $page = isset($this->request->data['page']) ? $this->request->data['page'] : 1;

        $this->paginate = [
        'limit' => $limit,
        'page'=>$page
        ];



	$this->loadModel("Users");
	$this->loadModel("Notifications");

	$user = TableRegistry::get('Usernotifications');
	$exists = $user->exists(['user_id' => $this->request->data['user_id']]);
			if($exists == 1)
			{

				$query = $this->Notifications
				->find('all')
				->contain(['Usernotifications'])     
				->matching('Usernotifications')
				->where([
				'Usernotifications.user_id' => $this->request->data['user_id']
				]);

				$response = $this->paginate($query);

				$i=0;
				foreach ($response as  $value)
				{

				if($value->type =='promotion')
					{
						$value->expiry_date = '02 july 2016';
					}
					else{
						$value->expiry_date = '';
					}



				$value->create_date =	 date('jS F Y', strtotime($value->create_date));
				unset($value->_matchingData);
				unset($value->usernotifications);
				}

				$arrdetail['error'] = '0';
				$arrdetail['response'] = $response;

			}
			else
			 {

			   	$arrdetail['error'] = '1';
				$arrdetail['response'] = "User have no notification message";
				

			 }
}else{

	$arrdetail['error'] = '1';
	$arrdetail['response'] = "Parameters are missing";

}
	

$this->set([
        'message' => $arrdetail,
        '_serialize' => ['message']
        ]);



}





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



}

?>