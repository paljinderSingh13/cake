<?php

namespace App\Model\Table;

use App\Model\Entity\Page;
use Cake\ORM\Query; 
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;



class PagesTable extends Table
{
    
public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('pages');
        $this->primaryKey('id');    
        $this->addBehavior('Timestamp');
 
    }
    
}


?>