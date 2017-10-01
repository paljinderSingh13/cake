<?php

namespace App\Model\Table;

use App\Model\Entity\Productimage;
use App\Model\Entity\Product;
use Cake\ORM\Query; 
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;


class UsernotificationsTable extends Table
{
    
public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('usernotifications');
        $this->primaryKey('id');    
        $this->addBehavior('Timestamp');
        $this->hasOne('Notifications',[
                'className'=>'Notifications',
                'foreignKey' => 'nid',
                'dependent' => true,

         ]);
        
          
    }
    
}


?>