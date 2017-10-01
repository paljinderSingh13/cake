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
        $shipping_weight[$value->name] = $value->name;
    }
    if($value->type =="usage" )
    {
        $usage[$value->id] = $value->name;
    }
     if($value->type =="order_status" )
    {
        $order_status[$value->name] = $value->name;
    }
 // $order_status = array('pending'=>'Pending','approved'=>'Approved','processing'=>'Processing', 'intransit'=>'In-Transit', 'delivered'=>'Delivered','completed'=>'Completed','canceled'=>'Canceled');
    
    if($value->type =="delivery_method" )
    {
        $delivery_method[$value->id] = $value->name;
    }
}
?>
<script>
$(document).ready(function() {

  chk = $("#orderadrschk").val();

if(chk=='1')
{
 $(".show-shipping-detail").hide(); 

}else{
  $(".show-shipping-detail").show();
}

   $("#order_same_billing_detail:checkbox").change(function() {


                    var ischecked= $(this).is(':checked');
                    if(!ischecked)
                    {
                      $(".diffshipadrs").attr('required',true);
                      // $("#add-delivery-address").hide();
                      $(".show-shipping-detail").fadeIn(500);

                      // location.reload(); 
                    }
                    else{

                      $(".diffshipadrs").val('');

                      $(".diffshipadrs").attr('required',false);
                     
                      // $("#add-delivery-address").show();
                       $(".show-shipping-detail").hide(500); 
                      // $( "#order_same_billing_detail" ).prop( "checked", false );
                    }
                }); 

// //  $( "#x" ).prop( "checked", true );
 
// // // Uncheck #x
// // $( "#x" ).prop( "checked", false );


//   $("#add-delivery-address").click(function(){
//    $(".show-shipping-detail").fadeIn(500); 
//    $("#add-delivery-address").hide();
// });

  noprod = $('#noprod').val();
    var max_fields      = 8; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = noprod; //initlal text box count
    $(add_button).click(function(e){ //on add input button click


        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
             $(wrapper).append('<div class="form-row product-rows"><div class="label-field">Product Name:</div><div class="input-box product-name"><?php $x = '<script>x</script>';  echo $this->Form->input('product_id[]', [ 'options'=>$product, 'onchange'=>'proval(this)' , 'id'=>"pro1" , 'label'=>false,'required'=>true, 'empty'=>'Select Product','selected'=>'12', 'class'=>'input-field proval']);  ?><input id="'+x+'" class="prod" type="hidden" value="'+x+'" > <input name="unit_price[]" type="hidden" id="oneunit'+x+'" class="'+x+'"    ></div><div class="label-field">Qty:</div><div class="input-box product-qty"><input id="qty'+x+'" onblur="byqtycalprc(this)" type="text" value="0" name="quantity[]" class="integer input-field"></div><div class="label-field price">Price:</div><div class="input-box product-price"> <input onblur="calsubtotal(this.value)" id="prc'+x+'" class="integer input-field prc" type="text"  value="0.00" readonly> </div><a href="#" id="'+x+'" class="remove_field">Delete</a></div>'); //add input box
          }
    });
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text

 id = $(this).attr('id');
 prc = $("#prc"+id).val();
 
 allval =   $("#allval").val();
 
 calval =  parseInt(allval) - parseInt(prc);
 
 $("#allval").val(calval.toFixed(2));
 $("#subtotal").val(calval.toFixed(2));

 shipping =  $("#shipping").val();
 tax      =  $("#tax").val();

 total = parseInt(shipping) + parseInt(calval) + parseInt(tax);
 $("#totalvalue").val(total.toFixed(2));




        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
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
$("#totalvalue").val(total.toFixed(2));
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
$("#totalvalue").val(total.toFixed(2));
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
$("#totalvalue").val(total.toFixed(2));
$("#totalvalue").html(total);
    });

});

function byqtycalprc(val)// calculate price by qty
{
 v = $(val).attr('id');

n = v.replace('qty','');
if($("#oneunit"+n).val()=='')
{
  
  prc =0;
}
else{
  prc  =  $("#oneunit"+n).val(); //unit price 
}
if($("#qty"+n).val() =='')
{
  qty =0;
  $("#qty"+n).val(0);
}
else{
qty = $("#qty"+n).val(); // qty number
}

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

              shipping =  $("#shipping").val();
              tax      =  $("#tax").val();

               total = parseInt(shipping) + parseInt(ftotal) + parseInt(tax);
              $("#totalvalue").val(total.toFixed(2));
//$("#totalvalue").val(ftotal.toFixed(2));


//alert(qty);

 //alert(prc);



// var total="";
// if($('#subtotal').val().length != 0){
//   var subtotal = $('#subtotal').val();   
//         }else{
//    var subtotal = 0;     
//   }
// if($('#shipping').val().length != 0){
//   var shipping = $('#shipping').val();  
//   }else{
//    var shipping = 0;     
//   }
// if($('#tax').val().length != 0){
//   var tax  = this.value;  
//   }else{
//   var tax = 0;     
//   }
// var total = parseInt(subtotal) + parseInt(shipping) + parseInt(tax);
// $("#totalvalue").val(total.toFixed(2));
// $("#totalvalue").html(total);
   



}

function proval(val)
{

  proid = val.value; // product id  value 
  id = $(val).parent('.select').next('.prod').attr('id'); // near product unique id 
  $("#qty"+id).val(1);
 $.ajax({
        url:"<?php echo $this->Url->build(['controller'=>'Orders' , 'action'=>'proprice']); ?>",
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

              shipping =  $("#shipping").val();
              tax      =  $("#tax").val();

               total = parseInt(shipping) + parseInt(fallprc) + parseInt(tax);
              $("#totalvalue").val(total.toFixed(2));

              //$("#totalvalue").val(fallprc.toFixed(2));
              //$("#totalvalue").val(ftotal);



  
        }

      });
 
}

</script>
<div class="white-wrapper add-product">
   <div class="page-head clearfix">
       <h2><img src="../../../images/icon-pencil.png" width="28" height="29" alt=""> Edit Order</h2>
   </div>
   <div class='form'>

       <?=  $this->Form->create($order,['type'=>'file','id'=>'order-registration']); ?>

        <div class="form-row">

            <div class="label-field">Order No:</div>
            <div class="input-box">
                <?= $this->Form->input('id',["type"=>"text", "readonly"=>true, 'class'=>'input-field','label'=>false]);
                //$this->Form->input('order_user_name',['required'=>false,'type'=>'hidden','class'=>'input-field','label'=>false]); ?>
            </div>
        </div>

        <div class="form-row">
            <div class="label-field">Order Date:</div>
            <div class="input-box">
             <?= $this->Form->input('order_date',['type'=>'text','class'=>'width input-field datepicker ','label'=>false,'value'=>date('d M Y',strtotime($order->order_date))]); ?>

         </div>
     </div>
     <div class="form-row">
        <div class="label-field">Customer Name:</div>
        <div class="input-box">
         <?= $this->Form->input('order_username',['class'=>'input-field','label'=>false]); ?>

     </div>
 </div>
 <div class="form-row">
    <div class="label-field"> Status:</div>
    <div class="input-box">
        <?php 
        echo $this->Form->input('order_status', ['id'=>'order_status', 'options'=>$order_status, 'label'=>false,'empty'=>'Select Status','selected'=>'12', 'class'=>'input-field']); 
        ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('order_status')" ></a> 
                                <a onclick="removesetting('order_status')" class="icon-minus"></a></div>
    </div>
</div>
<hr /> 

<input type="hidden" id="allval" value="<?php echo $order->order_sub_total; ?>" >
<div class="input_fields_wrap product-list">

<input id="noprod" type="hidden" value="<?php echo count($order->productcarts); ?>"  >
<?php
$i =1;
foreach ($order->productcarts as  $c) {
    
    foreach ($order['products'] as  $pro) {
        if($pro['id']==$c['product_id'])
        $productids = $c['product_id'];
        $quantity = $c['quantity'];
        $unit_price = $c['unit_price'];
        $total_price = $c['total_price'];

        
} ?>


<div class="form-row product-rows"><div class="label-field">Product Name:</div><div class="input-box product-name"> 
     <?php echo $this->Form->input('product_id[]', [ 'onchange'=>'proval(this)','options'=>$product,'label'=>false,'value'=>$productids, 'empty'=>'Select Product','class'=>'input-field']);
        ?>
         <input id="<?php echo $i; ?>" class="prod" type="hidden" value="<?php echo $i; ?>" >
         <input name="unit_price[]" type="hidden" value="<?php echo $unit_price; ?>" class="<?php echo $i; ?>" id="oneunit<?php echo $i; ?>" value='0'> 

        </div><div class="label-field">Qty:</div><div class="input-box product-qty">
     <?= $this->Form->input('quantity[]',[ 'id'=>'qty'.$i , 'onblur'=>'byqtycalprc(this)' , 'value'=>$quantity, 'class'=>'integer input-field ','label'=>false]); ?> 
     </div><div class="label-field">Price:</div><div class="input-box product-price">
     <input onblur="calsubtotal(this.value)" id="prc<?php echo $i; ?>" class="integer input-field prc" type="text" readonly value="<?php echo number_format($total_price,2); ?>">
 </div><a  class="remove_field"  id="<?php echo $i; ?>" >Delete</a>
</div>

<?php $i++;} ?>
</div>

<div class="form-row text-right" style="padding-right:10.5%;">
 <input type="button" value="Add Item" class="btn add_field_button" style="min-width:112px;">
</div>

<hr /> 
<div class="form-row">
    <div class="label-field">Shipping Weight:</div>
    <div class="input-box">
       <?= $this->Form->input('order_shipping_weight',['class'=>'integer input-field small','label'=>false]); ?>
        <?php 
        echo $this->Form->input('order_shipping_method', ['id'=>"shipping_weight", 'options'=>$shipping_weight, 'label'=>false, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field est-yield-select']); 
        ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('shipping_weight')" ></a> 
                                <a onclick="removesetting('shipping_weight')" class="icon-minus"></a></div>
    </div>
</div>
<div class="form-row">
    <div class="label-field"> Delivery Method:</div>
    <div class="input-box">

         <?php 
        echo $this->Form->input('order_delivery_method', ['id'=>'delivery_method' , 'options'=>$delivery_method, 'label'=>false, 'empty'=>'Select Delivery Method','selected'=>'12', 'class'=>'integer input-field']); 
        ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('delivery_method')" ></a> 
                                <a onclick="removesetting('delivery_method')" class="icon-minus"></a></div>
    </div>
</div>
<div class="form-row">
    <div class="label-field">Recipient:</div>
    <div class="input-box">
     <?= $this->Form->input('order_recipient',['class'=>'input-field ','label'=>false]); ?>

 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 1(or company name):</div>
    <div class="input-box">
     <?= $this->Form->input('order_address_line1',['class'=>'input-field ','label'=>false]); ?>

 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 2(optional):</div>
    <div class="input-box">
     <?= $this->Form->input('order_address_line2',['class'=>'input-field ','label'=>false]); ?>

 </div>
</div>
<div class="form-row">
    <div class="label-field">Town/City:</div>
    <div class="input-box">
     <?= $this->Form->input('order_city',['class'=>'input-field ','label'=>false]); ?>

 </div>
</div>

<div class="form-row">
    <div class="label-field">Postal Code:</div>
    <div class="input-box">
        <?= $this->Form->input('order_postal_code',['class'=>'input-field integer','label'=>false]); ?>

    </div>
</div>
<div class="form-row">
    <div class="label-field">Phone No:</div>
    <div class="input-box">
        <?= $this->Form->input('order_phone_num',['class'=>'integer input-field ','label'=>false]); ?>

    </div>
</div>

<div class="form-row">
    <div class="label-field"><h4><strong>Shipping Details</strong></h4></div>
        <div class="input-box">
   <?php  //echo $this->Form->checkbox('order_same_billing_detail', ['required'=>false,'class'=>'input-field','id'=>'order_same_billing_detail']);
if($order->order_same_billing_detail==0){ ?>

  <input type="hidden" id="orderadrschk" value='0'  >
  <input id="order_same_billing_detail" type="checkbox" name="order_same_billing_detail"  value="1" >Same as billing details
<?php }
else{ ?>

  <input type="hidden" id="orderadrschk" value='1'  >

<input checked="checked"  id="order_same_billing_detail" type="checkbox" name="order_same_billing_detail"  value="1" > Same as billing details

<?php }


    ?>
       
    </div>
</div>
<div class="show-shipping-detail">
<div class="form-row">
    <div class="label-field">Recipient:</div>
    <div class="input-box">
     <?php echo  $this->Form->input('order_delivery_recipient',['class'=>'input-field diffshipadrs','label'=>false]); ?>
 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 1(or company name):</div>
    <div class="input-box">
    <?php echo $this->Form->input('order_delivery_address_line1',['class'=>'input-field diffshipadrs','label'=>false]); ?> 

 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 2(optional):</div>
    <div class="input-box">
    <?php echo $this->Form->input('order_delivery_address_line2',['class'=>'input-field ','label'=>false]); ?> 

 </div>
</div>
<div class="form-row">
    <div class="label-field">Town/City:</div>
    <div class="input-box">
     <?php echo $this->Form->input('order_delivery_city',['class'=>'input-field diffshipadrs','label'=>false]); ?> 

 </div>
</div>
<div class="form-row">
    <div class="label-field">Postal Code:</div>
    <div class="input-box">
       <?php echo $this->Form->input('order_delivery_postal_code',['class'=>'input-field integer diffshipadrs','label'=>false]); ?> 

    </div>
</div>
<div class="form-row">
    <div class="label-field">Phone No:</div>
    <div class="input-box phone-number">
       <?php echo $this->Form->input('order_delivery_phone_num',['class'=>'input-field integer diffshipadrs','label'=>false]); ?> 
    
</div>
</div>
 </div>   

<hr /> 


<hr /> 
<div class="form-row">
    <div class="label-field">Order SubTotal:</div>
    <div class="input-box order-field"> <?php $order->order_sub_total = number_format($order->order_sub_total,2); ?>
        S$ <?= $this->Form->input('order_sub_total',['type'=>'text','required'=>true,'class'=>'integer input-field ', "default"=>"0.00" , 'label'=>false,'id'=>'subtotal']); ?>
    </div>
</div>
<div class="form-row">
    <div class="label-field">Shipping Cost:</div>
    <div class="input-box order-field"><?php $order->order_shipping_cost = number_format($order->order_shipping_cost,2); ?>
       S$  <?= $this->Form->input('order_shipping_cost',['type'=>'text','required'=>false,'class'=>'integer input-field', "default"=>"0.00"   , "default"=>"0.00"  , 'label'=>false,'id'=>'shipping']); ?>

    </div>
</div>
<div class="form-row">
    <div class="label-field">Estimate Tax:</div>
    <div class="input-box order-field"> <?php $order->order_estimated_tax = number_format($order->order_estimated_tax,2); ?>
        S$ <?= $this->Form->input('order_estimated_tax',['type'=>'text','required'=>false,'class'=>'integer input-field ',"default"=>"0.00"  ,'label'=>false,'id'=>'tax']); ?>

    </div>
</div>
<div class="form-row">
    <div class="label-field">Order Total:</div>
    <div class="input-box order-field"> <?php $order->order_total = number_format($order->order_total,2); ?>
        S$ <?= $this->Form->input('order_total',['type'=>'text','required'=>true,'class'=>'input-field integer', "default"=>"0.00" , 'label'=>false,'id'=>'totalvalue']); ?>

    </div>
</div>

<div class="form-buttons">
    <input type="submit" value="Save" class="btn">
    <a class="btn btn-cancel" href="<?php echo $this->Url->build(['controller'=>'orders','action'=>'index']);?>">Cancel</a>
</div>

</form>
</div>

</div>
<div id="pop_content" style="display:none">
  <div class="popup" id="popup">
      <div class="popup-heading">Add <span id="head"> </span></div>
        <div class="popup-content text-center">
          <div class="form-row">
              <label>Name:</label> <div  class="input-box">
<input id="types" type="hidden" class="input-field">
                <input id="name" type="text" class="input-field"></div>
            </div>
            <div class="form-row text-right">
              <input id="addsetting" onclick="addsetting()" type="button" class="btn" value="OK"> <a href="javascript:void();" onclick="$.colorbox.close();" class="btn btn-cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>