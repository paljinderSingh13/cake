<?php 
$discount_type = "";
$usage_promo="";

foreach($promocodes->setting as $value){
    if($value->id == $promocodes->discount_type)
    {
        $discount_type = $value->name;
    } 

    if($value->id == $promocodes->usage_type)
    {
        $usage_type = $value->name;
    } 
}

?>
<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="/DBR/images/icon-view.png" alt=""> View Promo Code</h2>
            </div>
           
     <div class="form">
            <div class="form-row user-view-row">
            	<div class="label-field">Promo Code:</div>
                <div class="input-box">
                <?=  $promocodes->promocode; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Discount Type:</div>
                <div class="input-box">
                <?=  $discount_type; ?>
                </div>
            </div>
         <?php if($promocodes->discount>0){ ?>
            <div class="form-row user-view-row">
                <div class="label-field">Discount %:</div>
                <div class="input-box">
                <?php  if($promocodes->discount >0){ echo $promocodes->discount; }; ?>
                </div>
            </div>
         <?php } ?>
            <div class="form-row user-view-row">
                <div class="label-field">Quantity:</div>
                <div class="input-box">
                <?=  $promocodes->quantity; ?>
                </div>
            </div>
            <?php if($promocodes->amount>0){ ?>
            <div class="form-row user-view-row">
                <div class="label-field">Amount:</div>
                <div class="input-box">
                <?=  $promocodes->amount; ?>
                </div>
            </div>
            <?php } ?>
             <div class="form-row user-view-row">
                <div class="label-field">Expiry Date:</div>
                <div class="input-box">
                <?=  $promocodes->expiry_date; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Usage Type:</div>
                <div class="input-box">
                <?=  $promocodes->usage_type; ?>
                </div>
            </div>
             <div class="form-row user-view-row">
                <div class="label-field">Exceed Amount:</div>
                <div class="input-box">
                <?=  $promocodes->excced_amount; ?>
                </div>
            </div>
             <div class="form-row user-view-row">
                <div class="label-field">Description:</div>
                <div class="input-box">
                <?=  $promocodes->description; ?>
                </div>
            </div>
             

            
            <div class="view-buttons">
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promocodes->id],['class'=>'edit','label'=>false]) ?>
        <?= $this->Html->link(__('Delete'), ['action' => 'delete', $promocodes->id],['class'=>'delete','lagend'=>false])   
            ?>


            </div>

            



            
            
            
            
                
               
            
    </div>
</div>
