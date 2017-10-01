<?php

namespace App\Model\Table;

//use App\Model\Entity\Table;
//use Cake\ORM\Query;
//use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
//use Cake\Validation\Validator;


class CartridgesTable extends Table
{
    
public function initialize(array $config)
    {
        // parent::initialize($config);
        // $this->table('cartridges');
        // $this->primaryKey('brand_id');
        //$this->addBehavior('Timestamp');
        // $this->hasOne('Permissions', [
        //     'className' => 'Permissions',
        //     'dependent' => true
        // ]);
        
    }
    

   /* public function validationDefault-backup(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);
    }*/

// public function buildRules(RulesChecker $rules)
//     {
//         $rules->add($rules->isUnique(['brand_name']));
//         return $rules;
//     }
}


?>