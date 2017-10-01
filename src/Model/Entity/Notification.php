<?php
namespace App\Model\Entity;


use Cake\ORM\Entity;

/**
 * User Entity.
 */
class Promotion extends Entity
{
    
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
    
    
    
}
