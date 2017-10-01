<?php

namespace App\Model\Table;

use App\Model\Entity\Printerimage;
use App\Model\Entity\Printer;
use Cake\ORM\Query; 
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;



class PrintersTable extends Table
{
    
public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('printers');
        $this->primaryKey('id');    
        $this->addBehavior('Timestamp');
         $this->hasMany('Printerimages',[
                'className'=>'Printerimages',
                'dependent' => true
         ]); 
    }
    
}


?>