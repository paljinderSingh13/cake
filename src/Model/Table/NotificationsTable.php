<?php

namespace App\Model\Table;

use App\Model\Entity\Productimage;
use App\Model\Entity\Product;
use Cake\ORM\Query; 
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;


class NotificationsTable extends Table
{
    
public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('notifications');
        $this->primaryKey('id');    
        $this->addBehavior('Timestamp');
        $this->hasMany('Usernotifications',[
                'className'=>'Usernotifications',
                'foreignKey' => 'notification_id',
                'dependent' => true,

         ]);
        
          
    }
    
}


?>