<?php

namespace App\Model\Table;

use App\Model\Entity\Productimage;
use App\Model\Entity\Product;
use Cake\ORM\Query; 
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;



class ProductsTable extends Table
{
    
public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('products');
        $this->primaryKey('id');    
        $this->addBehavior('Timestamp');
         $this->hasMany('Productimages',[
                'className'=>'Productimages',
                'dependent' => true
         ]);

         $this->hasMany('Productpromotions', [
            'className'=>'Productpromotions',
            'foreignKey' => 'product_id',
            'dependent' => true,
        ]);
         $this->hasMany('Productprinters', [
            'className'=>'Productprinters',
            'foreignKey' => 'product_id',
            'dependent' => true,
        ]);
    }
    
}


?>