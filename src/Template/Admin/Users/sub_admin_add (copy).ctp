<?php echo $this->element('/Admin/left-sidebar');?>
<div class="users form large-10 medium-9 columns">
    <?php //print_r($users);  ?>
    <?=  $this->Form->create($user,['type'=>'file','id'=>'user-registration']); ?>
    <fieldset>
        <legend><?= __('Add Sub Admin') ?></legend>
        <?= $this->Form->input('firstname',['required'=>true]); ?>
        <?= $this->Form->input('username',['required'=>true]); ?>
        <?=   $this->Form->input('password',['required'=>true]); ?>
        <?=    $this->Form->input('emailid',['type'=>'email','required'=>true]); ?>
        <?= $this->Form->input('phone',['required'=>true]); ?>    
        
        <legend><?= __('Configure Access'); ?></legend>
   <table>
    <thead>  
     <tr>
            <th><?= 'No'; ?></th>
            <th><?=  'Access Type';?></th>
            <th><?= 'Allow'; ?></th>
     </tr>
     <thead>
        <tbody>
            <?php $counter = "1" ;
            
           
            foreach($configureAccess as $key=>$value){ ?>
            <tr>
            <td><?= $counter; ?></td>
            <td><?=  $value;?></td>
            <td><?php
$options = array(1 => '');
echo $this->Form->input("allow[$counter]", 
    array('label'=>false,'multiple' => 'checkbox', 'options' => $options)
);
            ?></td>
            </tr>
            <?php
            $counter++;
            } ?>

     </tbody> 
     </table>
     <?php ?>
     
        <tr>
        </thead>    
   </table>
   
   
   
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
