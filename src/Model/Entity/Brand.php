<?php

// namespace App\Model\Entity;

// use Cake\ORM\Entity;

// class Brand extends Entity
// {
// }

namespace App\Model\Entity;


use Cake\ORM\Entity;

/**
 * User Entity.
 */
class Brand extends Entity
{
    
     protected $_accessible = [
         '*' => true
         //'brand_id' => true,
    ];
    
    
 }

?>