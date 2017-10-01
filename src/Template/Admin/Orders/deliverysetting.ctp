<div class="white-wrapper add-product">
   <div class="page-head clearfix">
       <h2><img src="../../../images/icon-pencil.png" width="28" height="29" alt=""> Delivery Settings</h2>
   </div>
   <div class='form'>

       <?=  $this->Form->create($deliverysetting,['type'=>'file','id'=>'order-registration']); ?>

       

        <div class="form-row">

       
            <div class="label-field">Waive Delivery Charges For Order Above:</div>
            <div class="input-box">
            <!-- <?php  $waive =number_format($deliverysetting->waive_delivery_charges_for_order_above,2); ?> -->
               $ <?= $this->Form->input('waive_delivery_charges_for_order_above',["type"=>"text", 'required'=>true,'class'=>'input-field','label'=>false]);
                //$this->Form->input('order_user_name',['required'=>false,'type'=>'hidden','class'=>'input-field','label'=>false]); ?>
            </div>
        </div>

        <div class="form-row">

            <div class="label-field">Delivery Fee Normal:</div>
            <div class="input-box">
               $ <?= $this->Form->input('delivery_fee_normal',["type"=>"text",  'required'=>true,'class'=>'input-field','label'=>false]);
                //$this->Form->input('order_user_name',['required'=>false,'type'=>'hidden','class'=>'input-field','label'=>false]); ?>
            </div>
        </div>

        <div class="form-row">

            <div class="label-field">Delivery Fee Urgent:</div>
            <div class="input-box">
               $ <?= $this->Form->input('delivery_fee_urgent',["type"=>"text",  'required'=>true,'class'=>'input-field','label'=>false]);
                //$this->Form->input('order_user_name',['required'=>false,'type'=>'hidden','class'=>'input-field','label'=>false]); ?>
            </div>
        </div>

        <div class="form-buttons">
    <input type="submit" value="Save" class="btn">
    <a class="btn btn-cancel" href="<?php echo $this->Url->build(['controller'=>'orders','action'=>'deliverysetting']);?>">Cancel</a>
</div>
</form>
        </div>


        </div>