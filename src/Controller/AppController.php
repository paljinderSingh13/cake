<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    

public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadComponent('Auth', [
        'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
         ],
        'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
        ],
        'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'username']
            ]
        ],
        'storage' => 'Session',
        'loginAction' => [
            'controller' => 'Users',
            'action' => 'login'
        ]
    ]);

    $this->Auth->allow(['forgot']);
}
    
        public function beforeFilter(Event $event){
            if(!array_key_exists('_serialize',$this->viewVars) &&
               in_array($this->response->type(),['application/json','application/xml'])){
                $this->set('_serialize',true);
            }
      
    }
}
