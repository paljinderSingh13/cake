<?php

namespace App\Model\Table;

use App\Model\Entity\Productimage;
use App\Model\Entity\Product;
use Cake\ORM\Query; 
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;



class PromotionsTable extends Table
{
    
public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('promotions');
        $this->primaryKey('id');    
        $this->addBehavior('Timestamp');
         $this->hasMany('Productpromotions',[
                'className'=>'Productpromotions',
                'dependent' => true
         ]);
          $this->hasMany('Productpromotions', [
            'className'=>'Productpromotions',
            'foreignKey' => 'promotion_id',
            'dependent' => true,
        ]); 
    }
    
}


?>