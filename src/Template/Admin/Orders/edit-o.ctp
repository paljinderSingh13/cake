 <?php

 
foreach ($order['products'] as  $pro) {
    $product[$pro['id']] = $pro['product_name'];
    # code...
}

 foreach($order['setting'] as $value){
    if($value->type =="brand" )
    {
        $brands[$value->id] = $value->name;
    }
    if($value->type =="type" )
    {
        $type[$value->id] = $value->name;
    }
    if($value->type =="color" )
    {
        $color[$value->id] = $value->name;
    }
    if($value->type =="cartridge_type" )
    {
        $cartridge_type[$value->id] = $value->name;
    }
    if($value->type =="est_yield" )
    {
        $est_yield[$value->id] = $value->name;
    }
    if($value->type =="inventor_availability" )
    {
        $inventor_availability[$value->id] = $value->name;
    }
    if($value->type =="compatibility" )
    {
        $compatibility[$value->id] = $value->name;
    }
    if($value->type =="shipping_weight" )
    {
        $shipping_weight[$value->id] = $value->name;
    }
    if($value->type =="usage" )
    {
        $usage[$value->id] = $value->name;
    }
 $order_status= array('pending'=>'Pending','approved'=>'Approved','processing'=>'Processing','dispatched'=>'Dispatched','complete'=>'Complete');
    
    if($value->type =="delivery_method" )
    {
        $delivery_method[$value->id] = $value->name;
    }
}
?>
<script>
$(document).ready(function() {
    var max_fields      = 8; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-row product-rows"><div class="label-field">Product Name:<div class="input-box"><?php echo $this->Form->input('product_id[]', ['options'=>$product, 'label'=>false, 'empty'=>'Select Product','selected'=>'12', 'class'=>'input-field']);?></div></div><div class="label-field">Qty:<div class="input-box"><?= $this->Form->input('quantity[]',['required'=>false,'class'=>'input-field ','label'=>false]); ?> </div></div><div class="label-field">Price:<div class="input-box"><?= $this->Form->input('unit_price[]',['required'=>false,'class'=>'input-field','label'=>false]); ?> </div></div><a href="#" class="remove_field">Delete</a></div>'); //add input box
        }
    });
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});

</script>
<div class="white-wrapper">
   <div class="page-head clearfix">
       <h2><img src="../../../images/icon-pencil.png" width="28" height="29" alt=""> Edit Order</h2>
   </div>
   <div class='form'>

       <?=  $this->Form->create($order,['type'=>'file','id'=>'order-registration']); ?>

        <div class="form-row">

            <div class="label-field">Order No:</div>
            <div class="input-box">
                <?= $this->Form->input('order_num',['required'=>true,'class'=>'input-field','label'=>false]);
                //$this->Form->input('order_user_name',['required'=>false,'type'=>'hidden','class'=>'input-field','label'=>false]); ?>
            </div>
        </div>

        <div class="form-row">
            <div class="label-field">Order Date:</div>
            <div class="input-box">
             <?= $this->Form->input('order_date',['required'=>false,'type'=>'text','class'=>'width  datepicker ','label'=>false,'value'=>date('d M Y',strtotime($order->order_date))]); ?>

         </div>
     </div>
     <div class="form-row">
        <div class="label-field">Customer Name:</div>
        <div class="input-box">
         <?= $this->Form->input('order_username',['required'=>false,'class'=>'input-field','label'=>false]); ?>

     </div>
 </div>
 <div class="form-row">
    <div class="label-field"> Status:</div>
    <div class="input-box">
        <?php
        echo $this->Form->input('order_status', ['options'=>$order_status, 'label'=>false, 'empty'=>'Select Status','class'=>'input-field']);
        ?>
    </div>
</div>
<div class="input_fields_wrap">
<?php

foreach ($order->productcarts as  $c) {
    
    foreach ($order['products'] as  $pro) {
        if($pro['id']==$c['product_id'])
        $productids = $c['product_id'];
        $quantity = $c['quantity'];
        $unit_price = $c['unit_price'];
} ?>


<div class="form-row product-rows">
    <div class="label-field">Product Name:
    <div class="input-box">
     <?php echo $this->Form->input('product_id[]', ['options'=>$product,'label'=>false,'value'=>$productids, 'empty'=>'Select Product','class'=>'input-field']);
        ?>
 </div>
    </div>
 <div class="label-field">Qty:
 <div class="input-box">
     <?= $this->Form->input('quantity[]',['required'=>false,'class'=>'integer input-field ','label'=>false,'value'=>$quantity]); ?>

 </div>
 </div>
 <div class="label-field">Price:
 <div class="input-box">
     <?= $this->Form->input('unit_price[]',['required'=>false,'class'=>'integer input-field','label'=>false,'value'=>$unit_price]); ?>
 </div>
 </div>
  <a href="<?php echo $this->Url->build(['controller'=>'orders','action'=>'delproduct',$productids]);?>">Delete</a>
</div>

<?php } ?>
</div>
<div class="form-row " style="float:right">
 <input type="button" value="Add Item" class="btn add_field_button">
</div>


<div class="form-row">
    <div class="label-field">Shipping Weight:</div>
    <div class="input-box">
        <?= $this->Form->input('order_shipping_weight',['class'=>'integer input-field small','label'=>false]); ?>
        <?php
        echo $this->Form->input('order_shipping_method', ['options'=>$shipping_weight, 'label'=>false, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field ']);
        ?>
    </div>
</div>
<div class="form-row">
    <div class="label-field"> Delivery Method:</div>
    <div class="input-box">

        <?php
        echo $this->Form->input('order_delivery_method', ['options'=>$delivery_method, 'label'=>false, 'empty'=>'Select Delivery Method','selected'=>'12', 'class'=>'input-field']);
        ?>
    </div>
</div>
<div class="form-row">
    <div class="label-field">Recipient:</div>
    <div class="input-box">
     <?= $this->Form->input('order_recipient',['required'=>false,'class'=>'input-field ','label'=>false]); ?>

 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 1(or company name):</div>
    <div class="input-box">
     <?= $this->Form->input('order_address_line1',['required'=>false,'class'=>'input-field ','label'=>false]); ?>

 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 2(optional):</div>
    <div class="input-box">
     <?= $this->Form->input('order_address_line2',['required'=>false,'class'=>'input-field ','label'=>false]); ?>

 </div>
</div>
<div class="form-row">
    <div class="label-field">Town/City:</div>
    <div class="input-box">
     <?= $this->Form->input('order_city',['required'=>false,'class'=>'input-field ','label'=>false]); ?>

 </div>
</div>

<div class="form-row">
    <div class="label-field">Postal Code:</div>
    <div class="input-box">
        <?= $this->Form->input('order_postal_code',['required'=>false,'class'=>'input-field ','label'=>false]); ?>

    </div>
</div>
<div class="form-row">
    <div class="label-field">Phone No:</div>
    <div class="input-box">
        <?= $this->Form->input('order_phone_num',['required'=>false,'class'=>'integer input-field ','label'=>false]); ?>

    </div>
</div>

<div class="form-row">
    <div class="label-field">Order SubTotal:</div>
    <div class="input-box">
        <?= $this->Form->input('order_sub_total',['required'=>false,'class'=>'integer input-field ','label'=>false]); ?>

    </div>
</div>
<div class="form-row">
    <div class="label-field">Shipping Cost:</div>
    <div class="input-box">
        <?= $this->Form->input('order_shipping_cost',['required'=>false,'class'=>'integer input-field ','label'=>false]); ?>

    </div>
</div>
<div class="form-row">
    <div class="label-field">Estimate Tax:</div>
    <div class="input-box">
        <?= $this->Form->input('order_estimated_tax',['required'=>false,'class'=>'integer input-field ','label'=>false]); ?>

    </div>
</div>
<div class="form-row">
    <div class="label-field">Order Total:</div>
    <div class="input-box">
        <?= $this->Form->input('order_total',['required'=>false,'class'=>'input-field integer','label'=>false]); ?>

    </div>
</div>

<div class="form-buttons">
    <input type="submit" value="Save" class="btn">
    <a class="btn btn-cancel" href="<?php echo $this->Url->build(['controller'=>'orders','action'=>'index']);?>">Cancel</a>
</div>

</form>
</div>

</div>
