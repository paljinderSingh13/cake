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
        $shipping_weight[$value->name] = $value->name;
    }
    if($value->type =="delivery_method" )
    {
        $delivery_method[$value->id] = $value->name;
    }
    if($value->type =="order_status" )
    {
        $order_status[$value->name] = $value->name;
    }
 // $order_status= array('pending'=>'Pending','approved'=>'Approved','processing'=>'Processing', 'intransit'=>'In-Transit', 'delivered'=>'Delivered','completed'=>'Completed','canceled'=>'Canceled');
    
       }

?>
<script>
$(document).ready(function() {


  $("#order_same_billing_detail:checkbox").change(function() {


                    var ischecked= $(this).is(':checked');
                    if(!ischecked)
                    {
                      // $("#add-delivery-address").hide();
                      $(".diffshipadrs").attr('required',true);
                      $(".show-shipping-detail").fadeIn(500);

                      // location.reload(); 
                    }
                    else{
                       $(".diffshipadrs").attr('required',false);
                       $(".diffshipadrs").val('');
                     
                      // $("#add-delivery-address").show();
                       $(".show-shipping-detail").hide(500); 
                      // $( "#order_same_billing_detail" ).prop( "checked", false );
                    }
                }); 

 // $("#order_same_billing_detail:checkbox").change(function() {
 //                    var ischecked= $(this).is(':checked');
 //                    if(!ischecked)
 //                    {
 //                      $("#add-delivery-address").hide();
 //                      $(".show-shipping-detail").fadeIn(500);
 //                    }
 //                    else{
                     
 //                      $("#add-delivery-address").show();
 //                      $(".show-shipping-detail").hide(500); 
 //                      $( "#order_same_billing_detail" ).prop( "checked", false );
 //                    }
 //                }); 

//  $( "#x" ).prop( "checked", true );
 
// // Uncheck #x
// $( "#x" ).prop( "checked", false );


//   $("#add-delivery-address").click(function(){
//    $(".show-shipping-detail").fadeIn(500); 
//    $("#add-delivery-address").hide();
// });


    
    var max_fields      = 8; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).on('click',function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-row product-rows"><div class="label-field">Product Name:</div><div class="input-box product-name"><?php $x = '<script>x</script>';  echo $this->Form->input('product_id[]', [ 'options'=>$product, 'onchange'=>'proval(this)' , 'id'=>"pro1" , 'label'=>false,'required'=>true, 'empty'=>'Select Product','selected'=>'12', 'class'=>'input-field proval']);  ?><input id="'+x+'" class="prod" type="hidden" value="'+x+'" > <input name="unit_price[]" type="hidden" id="oneunit'+x+'" class="'+x+'"    ></div><div class="label-field">Qty:</div><div class="input-box product-qty"><input id="qty'+x+'" onblur="byqtycalprc(this)" type="text" value="0" name="quantity[]" class="integer input-field"></div><div class="label-field price">Price:</div><div class="input-box product-price"> <input onblur="calsubtotal(this.value)" id="prc'+x+'" class="integer input-field prc" type="text"  value="0.00" readonly> </div><a href="#" id="'+x+'" class="remove_field">Delete</a></div>'); //add input box
        }
    });   

  $(wrapper).on('keydown',".integer",function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
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
  
 $(".datepicker-order").datepicker({ dateFormat: 'd M yy'}).datepicker("setDate", new Date());
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

//alert(qty);

 //alert(prc);

}

function proval(val)
{

  proid = val.value; // product id  value 
  id = $(val).parent('.select').next('.prod').attr('id'); // near product unique id 
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
              shipping =  $("#shipping").val();
              tax      =  $("#tax").val();

               total = parseInt(shipping) + parseInt(fallprc) + parseInt(tax);
              $("#totalvalue").val(total.toFixed(2));
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
 // alert(all);
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
        <!-- <div class="form-row">
            
            <div class="label-field">Order No:</div>
            <div class="input-box">
                <?= $this->Form->input('order_num',['required'=>true,'class'=>'input-field','label'=>false]);
                //$this->Form->input('order_user_name',['required'=>false,'type'=>'hidden','class'=>'input-field','label'=>false]); ?>
            </div>
        </div> -->
        
        <div class="form-row">
            <div class="label-field">Order Date:</div>
            <div class="input-box">
             <?= $this->Form->input('order_date',['required'=>true,'class'=>'input-field width datepicker-order','label'=>false]); ?> 

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
        echo $this->Form->input('order_status', ['id'=>'order_status', 'options'=>$order_status, 'label'=>false,'required'=>true, 'empty'=>'Select Status','selected'=>'12', 'class'=>'input-field']); 
        ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('order_status')" ></a> 
                                <a onclick="removesetting('order_status')" class="icon-minus"></a></div>
    </div>
</div>

<hr /> 

<div class="input_fields_wrap product-list">
<div class="form-row product-rows">
    <div class="label-field">Product Name:</div><div class="input-box product-name">
    <input type="hidden" id="allval" value="0" ><?php 
        echo $this->Form->input('product_id[]', [ 'onchange'=>'proval(this)', 'options'=>$product, 'id'=>"pro1" , 'label'=>false,'required'=>true, 'empty'=>'Select Product','selected'=>'12', 'value'=>0 , 'class'=>'input-field proval']); 
        ?>
        <input id="1" class="prod" type="hidden" value="1" >
         <input name="unit_price[]" type="hidden" class="1" id="oneunit1" value='0'>
   </div><div class="label-field">Qty:</div><div class="input-box product-qty">
     <?= $this->Form->input('quantity[]',[ 'id'=>'qty1' , 'onblur'=>'byqtycalprc(this)' ,'required'=>true, 'value'=>'0', 'class'=>'integer input-field ','label'=>false]); ?> 
 </div><div class="label-field price">Price:</div><div class="input-box product-price"> <input onblur="calsubtotal(this.value)" id="prc1" class="integer input-field prc" type="text" readonly value="0.00"></div><!-- <a href="javascript:void();" class="remove_field">Delete</a> -->
</div> 
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
        echo $this->Form->input('order_shipping_method', ['id'=>"shipping_weight", 'options'=>$shipping_weight, 'label'=>false,'required'=>true, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field est-yield-select']); 
        ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('shipping_weight')" ></a> 
                                <a onclick="removesetting('shipping_weight')" class="icon-minus"></a></div>
    </div>
</div>
<div class="form-row">
    <div class="label-field"> Delivery Method:</div>
    <div class="input-box">

        <?php 
        echo $this->Form->input('order_delivery_method', ['id'=>'delivery_method' , 'options'=>$delivery_method, 'label'=>false, 'required'=>true,'empty'=>'Select Delivery Method','selected'=>'12', 'class'=>'integer input-field']); 
        ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('delivery_method')" ></a> 
                                <a onclick="removesetting('delivery_method')" class="icon-minus"></a></div>
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
<!-- 		        <a href="javascript:void(0);" id='add-delivery-address' >Add Delivery Address</a>
 -->
    </div>
</div>


 <!-- style="display:none;" -->
<div class="form-row">
    <div class="label-field"><h4><strong>Shipping Details</strong></h4></div>
        <div class="input-box">
   <?php  //echo $this->Form->checkbox('order_same_billing_detail', ['required'=>false,'class'=>'input-field','id'=>'order_same_billing_detail']); ?>
       <input id="order_same_billing_detail" type="checkbox" name="order_same_billing_detail" value="1"> Same as billing details
    </div>
</div>
<div class="show-shipping-detail" >
<div class="form-row">
    <div class="label-field">Recipient:</div>
    <div class="input-box">
     <?php echo  $this->Form->input('order_delivery_recipient',['required'=>true,'class'=>'input-field diffshipadrs','label'=>false]); ?>
 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 1(or company name):</div>
    <div class="input-box">
    <?php echo $this->Form->input('order_delivery_address_line1',['required'=>true,'class'=>'input-field diffshipadrs','label'=>false]); ?> 

 </div>
</div>
<div class="form-row">
    <div class="label-field">Address Line 2(optional):</div>
    <div class="input-box">
    <?php echo $this->Form->input('order_delivery_address_line2',['required'=>false,'class'=>'input-field ','label'=>false]); ?> 

 </div>
</div>
<div class="form-row">
    <div class="label-field">Town/City:</div>
    <div class="input-box">
     <?php echo $this->Form->input('order_delivery_city',['required'=>true,'class'=>'input-field diffshipadrs','label'=>false]); ?> 

 </div>
</div>
<div class="form-row">
    <div class="label-field">Postal Code:</div>
    <div class="input-box">
       <?php echo $this->Form->input('order_delivery_postal_code',['required'=>true,'class'=>'input-field integer diffshipadrs','label'=>false]); ?> 

    </div>
</div>
<div class="form-row">
    <div class="label-field">Phone No:</div>
    <div class="input-box phone-number">
       <?php echo $this->Form->input('order_delivery_phone_num',['required'=>true,'class'=>'input-field integer diffshipadrs','label'=>false]); ?> 
    
</div>
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
        S$ <?= $this->Form->input('order_shipping_cost',['required'=>false,'class'=>'input-field integer total', "default"=>"0.00" ,'label'=>false,'id'=>'shipping']); ?> 
    </div>
</div>
<div class="form-row">
    <div class="label-field">Estimate Tax:</div>
    <div class="input-box order-field">
        S$ <?= $this->Form->input('order_estimated_tax',['required'=>false,'class'=>'input-field integer total', "default"=>"0.00" , 'label'=>false,'id'=>'tax']); ?> 

    </div>
</div>
<div class="form-row">
    <div class="label-field">Order Total:</div>
    <div class="input-box order-field">
        S$ <?= $this->Form->input('order_total',['required'=>true,'class'=>'input-field integer','label'=>false,  "default"=>"0.00" , 'id'=>'totalvalue','readonly'=>true]); ?> 

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