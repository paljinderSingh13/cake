<?php
namespace App\Model\Entity;


use Cake\ORM\Entity;

/**
 * User Entity.
 */
class Usernotification extends Entity
{
    
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
    
    
    
}
