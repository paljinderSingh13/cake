<?php

namespace App\Model\Table;

use App\Model\Entity\Order;
use Cake\ORM\Query; 
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;


class OrdersTable extends Table
{ 
public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('orders');
        $this->primaryKey('id');    
        $this->addBehavior('Timestamp');
        
         $this->hasMany('Productcarts',[
                'className'=>'Productcarts',
                'foreignKey' => 'order_id',
                'dependent' => true
         ]);

         $this->hasMany('Ordertracks',[
                'className'=>'Ordertracks',
                'foreignKey' => 'order_id',
                'dependent' => true
         ]);


         
    }  
}


?>