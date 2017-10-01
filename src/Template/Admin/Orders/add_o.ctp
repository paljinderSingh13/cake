<?php
foreach ($data['products'] as  $pro) {

    $product[$pro['id']] = $pro['product_name'];
    # code...
}

foreach($data['setting'] as $value){
   // 'color','brand','type','cartridge_type','est_yield','inventor _availability','compatibility','shipping_weight'

    if($value->type =="usage" )
    {
        $usage[$value->id] = $value->name;
    }
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
    if($value->type =="delivery_method" )
    {
        $delivery_method[$value->id] = $value->name;
    }
    
 $order_status= array('pending'=>'Pending','approved'=>'Approved','processing'=>'Processing', 'intransit'=>'In-Transit', 'delivered'=>'Delivered','completed'=>'Completed','canceled'=>'Canceled');
    
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
            $(wrapper).append('<div class="form-row product-rows"><div class="label-field">Product Name:</div><div class="input-box product-name"><?php $x = '<script>x</script>';  echo $this->Form->input('product_id[]', [ 'options'=>$product, 'onchange'=>'proval(this)' , 'id'=>"pro1" , 'label'=>false,'required'=>true, 'empty'=>'Select Product','selected'=>'12', 'class'=>'input-field proval']);  ?><input id="'+x+'" class="prod" type="hidden" value="'+x+'" > <input type="hidden" id="oneunit'+x+'" class="'+x+'"    ></div><div class="label-field">Qty:</div><div class="input-box product-qty"><input id="qty'+x+'" onblur="byqtycalprc(this)" type="text" name="quantity[]" class="input-field"></div><div class="label-field price">Price:</div><div class="input-box product-price"> <input onblur="calsubtotal(this.value)" id="prc'+x+'" class="integer input-field prc" type="text" readonly value="0.00"> </div><a href="#" id="'+x+'" class="remove_field">Delete</a></div>'); //add input box
        }
    });   

   
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        
     id = $(this).attr('id');
     prc = $("#prc"+id).val();
   
   allval =   $("#allval").val();
   
   calval =  parseInt(allval) - parseInt(prc);
 
   $("#allval").val(calval.toFixed(2));
   $("#subtotal").val(calval.toFixed(2));

$("#totalvalue").val(calval.toFixed(2));
e.preventDefault(); 

     // v =    $(e).parent('div').childern('.product-price').html();
     // alert(v);
        $(this).parent('div').remove(); x--;

    });

// $('.proval').on('change', function() {
//   proid = this.value; // or $(this).val()
//   id =  $(this).closest('.prod').val();
//   alert(id);

//  $.ajax({
//         url:"proprice",
//         type:"POST",
//         dataType:"json",
//         data:{'proid':proid},
//         success:function(data)
//         {
//           $(this).closest('.prc').val(data[0].product_price_before_gst);
//             console.log(data[0].product_price_before_gst);
//         }

//       });

// });
    
$("#subtotal").on('keyup',function(){
if($('#subtotal').val().length != 0){
  var subtotal = this.value;    
        }else{
   var subtotal = 0;     
  }
if($('#shipping').val().length != 0){
  var shipping  = $("#shipping").val();  
  }else{
   var shipping = 0;     
  }
if($('#tax').val().length != 0){
  var tax  = $("#tax").val();  
  }else{
  var tax = 0;     
  }
var total = parseInt(subtotal)+parseInt(shipping)+parseInt(tax);
$("#totalvalue").val(total);
$("#totalvalue").html(total);
});       

$("#shipping").on('keyup',function() {
if($('#subtotal').val().length != 0){
  var subtotal = $('#subtotal').val();   
        }else{
   var subtotal = 0;     
  }
if($('#shipping').val().length != 0){
  var shipping = this.value;  
  }else{
   var shipping = 0;     
  }
if($('#tax').val().length != 0){
  var tax  = $("#tax").val();  
  }else{
  var tax = 0;     
  }
var total = parseInt(subtotal)+parseInt(shipping)+parseInt(tax);
$("#totalvalue").val(total);
$("#totalvalue").html(total);
});       

$("#tax").on('keyup',function() {
var total="";
if($('#subtotal').val().length != 0){
  var subtotal = $('#subtotal').val();   
        }else{
   var subtotal = 0;     
  }
if($('#shipping').val().length != 0){
  var shipping = $('#shipping').val();  
  }else{
   var shipping = 0;     
  }
if($('#tax').val().length != 0){
  var tax  = this.value;  
  }else{
  var tax = 0;     
  }
var total = parseInt(subtotal) + parseInt(shipping) + parseInt(tax);
$("#totalvalue").val(total);
$("#totalvalue").html(total);
    });
    
  });

function byqtycalprc(val)
{
 v = $(val).attr('id');
 n = v.replace('qty','');
prc  =  $("#oneunit"+n).val(); //unit price 

qty = $("#qty"+n).val(); // qty number

Qtotal = parseInt(qty) * parseInt(prc); // qty X unit price

pprc = $("#prc"+n).val(); //present price 
$("#prc"+n).val(Qtotal.toFixed(2));
cprc = $("#prc"+n).val();
//alert(cprc);

all = $("#allval").val();
newall = parseInt(all) - parseInt(pprc);
ftotal = parseInt(newall) + parseInt(cprc);
//total = parseInt(prc) + parseInt(all);
$("#allval").val(ftotal.toFixed(2));
$("#subtotal").val(ftotal.toFixed(2));
$("#totalvalue").val(ftotal.toFixed(2));


//alert(qty);

 //alert(prc);

}

function proval(val)
{

  proid = val.value; // or $(this).val()

 id = $(val).parent('.select').next('.prod').attr('id');
  

  $("#qty"+id).val(1);


 $.ajax({
        url:"proprice",
        type:"POST",
        dataType:"json",
        data:{'proid':proid},
        success:function(data)
        {

         prc = data[0].product_price_before_gst;
          //$(this).closest('.prc').val(data[0].product_price_before_gst);
            console.log(data[0].product_price_before_gst);
          pprc    =   $("#prc"+id).val(); // present prc
          pallval =   $("#allval").val(); // present all val
          nallval =   parseInt(pallval) - parseInt(pprc); // new all val

          $("#prc"+id).val(prc.toFixed(2)); // change prc
          cprc = $("#prc"+id).val();
          fallprc = parseInt(nallval) + parseInt(cprc);
           
            $("#oneunit"+id).val(prc);

             // all = $("#allval").val();
              //total = parseInt(prc) + parseInt(all);
              $("#allval").val(fallprc.toFixed(2));
              $("#subtotal").val(fallprc.toFixed(2));
              $("#totalvalue").val(fallprc.toFixed(2));
              //$("#totalvalue").val(ftotal);



  
        }

      });
 
}

function productprice(val)
{

alert(val);
}

function del(val)
{

}

function calsubtotal(val)
{
  //alert(val);
  all = $("#allval").val();
total = parseInt(val) + parseInt(all);
$("#allval").val(total);
}
</script>
<div class="white-wrapper add-product">
    <div class="page-head clearfix">
        <h2><?php echo $this->Html->image('/images/icon-add.png',array('width'=>28,'height'=>29));?>
       Add Order</h2>
    </div>

    <div class="form">
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
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
             <?= $this->Form->input('order_date',['required'=>true,'class'=>'input-field width datepicker datepicker-order','label'=>false]); ?> 

         </div>
     </div>
     <div class="form-row">
        <div class="label-field">Customer Name:</div>
        <div class="input-box">
         <?= $this->Form->input('order_username',['required'=>true,'class'=>'input-field','label'=>false]); ?> 

     </div>
 </div>

 <div class="form-row">
    <div class="label-field"> Status:</div>
    <div class="input-box">
        <?php 
        echo $this->Form->input('order_status', ['options'=>$order_status, 'label'=>false,'required'=>true, 'empty'=>'Select Status','selected'=>'12', 'class'=>'input-field']); 
        ?>
    </div>
</div>

<hr /> 

<div class="input_fields_wrap product-list">
<div class="form-row product-rows">
    <div class="label-field">Product Name:</div><div class="input-box product-name">
    <input type="hidden" id="allval" value="0" > 
     <?php 
        echo $this->Form->input('product_id[]', [ 'onchange'=>'proval(this)', 'options'=>$product, 'id'=>"pro1" , 'label'=>false,'required'=>true, 'empty'=>'Select Product','selected'=>'12', 'class'=>'input-field proval']); 
        ?>

        <input id="1" class="prod" type="hidden" value="1" >
         <input type="hidden" class="1" id="oneunit1">
        

        
 </div><div class="label-field">Qty:</div><div class="input-box product-qty">
     <?= $this->Form->input('quantity[]',[ 'id'=>'qty1' , 'onblur'=>'byqtycalprc(this)' ,'required'=>true, 'class'=>'1 integer input-field ','label'=>false]); ?> 

 </div>
 <div class="label-field price">Price:</div><div class="input-box product-price"> <input onblur="calsubtotal(this.value)" id="prc1" class="integer input-field prc" type="text" readonly value="0.00"> </div>

     <!-- <input onblur="calsubtotal(this.value)" id="prc1" name="unit_price[]" class="integer input-field small" type="text" value="0" readonly > -->
 </div>
  <a href="">Delete</a>
</div>
</div>
<div class="form-row text-right" style="padding-right:10.5%;">
 <input type="button" value="Add Item" class="btn add_field_button" style="min-width:112px;"> 
</div>
<hr />
<div class="form-row">
    <div class="label-field">Shipping Weight:</div>
    <div class="input-box">
        <?= $this->Form->input('order_shipping_weight',['class'=>'integer input-field small','label'=>false,'required'=>true]); ?>
        <?php 
        echo $this->Form->input('order_shipping_method', ['options'=>$shipping_weight, 'label'=>false,'required'=>true, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field est-yield-select']); 
        ?>
    </div>
</div>
<div class="form-row">
    <div class="label-field"> Delivery Method:</div>
    <div class="input-box">

        <?php 
        echo $this->Form->input('order_delivery_method', ['options'=>$delivery_method, 'label'=>false, 'required'=>true,'empty'=>'Select Delivery Method','selected'=>'12', 'class'=>'integer input-field']); 
        ?>
    </div>
</div>
<div class="form-row">
    <div class="label-field">Recipient:</div>
    <div class="input-box">
     <?= $this->Form->input('order_recipient',['required'=>true,'class'=>'input-field ','label'=>false]); ?> 

 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 1(or company name):</div>
    <div class="input-box">
     <?= $this->Form->input('order_address_line1',['required'=>true,'class'=>'input-field ','label'=>false]); ?> 

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
     <?= $this->Form->input('order_city',['required'=>true,'class'=>'input-field ','label'=>false]); ?> 

 </div>
</div>
<div class="form-row">
    <div class="label-field">Postal Code:</div>
    <div class="input-box">
        <?= $this->Form->input('order_postal_code',['required'=>true,'class'=>'input-field integer','label'=>false]); ?> 

    </div>
</div>
<div class="form-row">
    <div class="label-field">Phone No:</div>
    <div class="input-box phone-number">
        <?= $this->Form->input('order_phone_num',['required'=>true,'class'=>'input-field integer','label'=>false]); ?> 
		<a href="#">Add Delivery Address</a>
    </div>
</div>
<hr />
<div class="form-row">
    <div class="label-field">Order SubTotal:</div>
    <div class="input-box order-field">
        S$ <?= $this->Form->input('order_sub_total',['required'=>true,'class'=>'input-field integer total','label'=>false,'id'=>'subtotal', 'readonly'=>true]); ?> 

    </div>
</div>
<div class="form-row">
    <div class="label-field">Shipping Cost:</div>
    <div class="input-box order-field">
        S$ <?= $this->Form->input('order_shipping_cost',['required'=>false,'class'=>'input-field integer total','label'=>false,'id'=>'shipping']); ?> 
    </div>
</div>
<div class="form-row">
    <div class="label-field">Estimate Tax:</div>
    <div class="input-box order-field">
        S$ <?= $this->Form->input('order_estimated_tax',['required'=>false,'class'=>'input-field integer total','label'=>false,'id'=>'tax']); ?> 

    </div>
</div>
<div class="form-row">
    <div class="label-field">Order Total:</div>
    <div class="input-box order-field">
        S$ <?= $this->Form->input('order_total',['required'=>true,'class'=>'input-field integer','label'=>false,'id'=>'totalvalue','readonly'=>true]); ?> 

    </div>
</div>

<div class="form-buttons">
    <input type="submit" value="Save" class="btn">
    <a class="btn btn-cancel" href="<?php echo $this->Url->build(['controller'=>'orders','action'=>'index']);?>">Cancel</a>
</div>

</form> 
</div>

</div>