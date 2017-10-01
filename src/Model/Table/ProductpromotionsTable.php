<?php

namespace App\Model\Table;

use App\Model\Entity\Productcart;
use Cake\ORM\Query; 
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;


class ProductpromotionsTable extends Table
{ 
public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('productpromotions');
        $this->primaryKey('id');    
        $this->addBehavior('Timestamp');
        
         $this->belongsTo('Products',[
                'className'=>'Products',
                'foreignKey' => 'product_id',
                'dependent' => true
         ]);

         
    }  
}


?>