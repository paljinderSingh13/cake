
 <input  id='product_id' value="<?= h($product['id']) ?>" type="hidden">
  <input  id='imgcount' value="<?= h(count($product->productimages)) ?>" type="hidden">
 <?php

//  print_r($promotion['id']);
// echo $this->request->scheme();
// echo "<br>";
// echo $this->request->host();
// echo "<br>";
// echo $this->request->here;
// echo "<br>";
// echo $this->request->base;
// echo "<br>";
// echo $this->request->params['pass'][0];
// echo "<br>";
//  $url = $this->request->host().'/'.$this->request->base;
// echo "<br>";
// echo $this->request->url;



count($product->productimages);

 foreach($product['setting'] as $value){
  
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
    
}



?>
<script type='text/javascript'>
   $(document).ready(function(){ 


    printers();



    //______________validation on Printer checkbox______//
    $(".btn").click(function(e)
    {

    checked = $("input[type=checkbox]:checked").length;

    if(!checked) {
    alert("You must check at least one printer checkbox.");
    return false;
    }


    });

//______________validation for Integer Values _________________//
    $(".integer").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    count = $("#imgcount").val();
    total = 8;  
var max_fields      = total; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = count; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-row"><div class="label-field">Image:</div><div class="input-box add-printer-image"><input type="file" name="product_image[]" id="product_image" onchange="addreadURL(this);" ><img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image" required="true"></div><a href="javascript:void(0)" class="btn remove_field">Remove</a></div>'); //add input box
        }
if(x==max_fields){

        $("#remove").hide();
}


    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
          $("#remove").show();
    })




    $("#printer_search").click(function(){
            printer_search();
        });
         $('.used-printers').jScrollPane({
		showArrows:true,
		verticalDragMinHeight: 50,
		verticalDragMaxHeight: 50
		});
		
		 $('#select').click(function(){
    
            $('tbody tr td input[type="checkbox"]').each(function(){
                $(this).prop('checked', true);
            });

           });
    
    $('#deselect').click(function(){
          $('tbody tr td input[type="checkbox"]').each(function(){
              $(this).prop('checked', false);
          });
      });
   });

 function addreadURL(input) {
     // img =  $(input).closest('img').attr('src');

       var url = $(input).next('img').attr('src');      
    
      
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).next('img').attr('src',e.target.result);
                //$('#printer-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
function readURL(input) {
  //alert(input.id);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("."+input.id).attr('src', e.target.result);

                if(input.id!='product_image')
                {

                $("#img_id").append('<input name="changeimg[]" type="hidden" value="'+input.id+'">')
              }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

// function readURL(input) {
//      // img =  $(input).closest('img').attr('src');

//      alert(input.src);

//        var url = $(input).next('img').attr('src');      
//     if (input.files && input.files[0]) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 $(input).next('img').attr('src',e.target.result);
//                 //$('#printer-image').attr('src', e.target.result);
//             }

//             reader.readAsDataURL(input.files[0]);
//         }
//     }
   function printer_search()
{
       search  =  $("#search").val();
       pro_id  = $("#product_id").val();
       $.ajax({
        url:'<?php echo $this->Url->build(["controller" => "Products", "action" => "printersearch"]);?>',//"printersearch",
        type:"POST",
        dataType:"json",
        data:{'search':search,'pro_id':pro_id},
        success:function(data)
        {
            console.log(data);
            var tr;
var count = 1; 

    $.each(data.alldata,function(index,val)
    {
        $.each(data.setting,function(index,set)
        {
            if(set.id==val.brand_id)
            {
               brand_name =  set.name;
            }
        })

          check ='<input type="checkbox"  name="printer_id[]" value="'+val.id+'">';

         $.each(data.sprinter,function(index,sel)
        {
          if(sel.printer_id==val.id)
            {
  check ='<input type="checkbox" checked="checked" name="printer_id[]" value="'+val.id+'">';
}
        })

        tr +='<tr><td width="10%" class="text-center">'+count+'</td>';
        tr +='<td width="10%"><div class="custom-checkbox">'+check+'<label></label></div></td>';
        tr +='<td width="12%">'+brand_name+'</td>';
        tr +='<td width="22%">'+val.printer_name+'</td>';
        tr +='<td width="25%">'+val.alias+'</td>';
        tr +='<td class="actions text-center" width="10%"><a class="edit" href="/DBR/admin/products/editprinter/'+val.id+'"></a>';
        tr +='<a class="delete" href="/DBR/admin/products/deleteprinter/'+val.id+'"></a></center></tr>';

        count++;

    })
    $("#alldata").html(tr);
    $('.used-printers').jScrollPane({
        showArrows:true,
        verticalDragMinHeight: 50,
        verticalDragMaxHeight: 50
        });
            }
       })
} 

   

   function printers(){
    pro_id = $("#product_id").val();
    $.ajax({
        type: "POST",
        dataType: "json",
        data: {'type':'edit', 'pro_id':pro_id},
  url: '<?php echo $this->Url->build(["controller" => "Products", "action" => "getprinters"]);?>',
        success: function(data) {
        console.log(data);
          var tr;
          var count = 1; 
    $.each(data.alldata,function(index,val)
    {
        $.each(data.setting,function(index,set)
        {
            if(set.id==val.brand_id)
            {
               brand_name =  set.name;
            }
        })
  check ='<input type="checkbox"  name="printer_id[]" value="'+val.id+'">';

         $.each(data.sprinter,function(index,sel)
        {
          if(sel.printer_id==val.id)
            {
  check ='<input type="checkbox" checked="checked" name="printer_id[]" value="'+val.id+'">';
        }
        })

        tr +='<tr><td width="10%" class="text-center">'+count+'</td>';
        tr +='<td width="10%"><div class="custom-checkbox">'+check+'<label></label></div></td>';
        tr +='<td width="12%">'+brand_name+'</td>';
        tr +='<td width="22%">'+val.printer_name+'</td>';
        tr +='<td width="25%">'+val.alias+'</td>';
        tr +='<td class="actions text-center" width="10%"><a class="edit" href="/DBR/admin/products/editprinter/'+val.id+'"></a>';
        tr +='<a class="delete" href="/DBR/admin/products/deleteprinter/'+val.id+'"></a></center></tr>';

        count++;

    })
    $("#alldata").html(tr);
    $('.used-printers').jScrollPane({
        showArrows:true,
        verticalDragMinHeight: 50,
        verticalDragMaxHeight: 50
        });

    }
    });
    }
   
   // function readURL(input) {
   //      if (input.files && input.files[0]) {
   //          var reader = new FileReader();

   //          reader.onload = function (e) {
   //              $('#printer-image').attr('src', e.target.result);
   //          }

   //          reader.readAsDataURL(input.files[0]);
   //      }
   //  } 
    </script>

<div class="white-wrapper">
   <div class="page-head clearfix">
       <h2><img src="<?php echo $this->Url->build('/');?>images/icon-pencil.png" width="28" height="29" alt=""> Edit Product</h2>
   </div>
   <div class='form'>
    
       <?=  $this->Form->create($product,['type'=>'file','id'=>'user-registration']); ?>
       <div class="form-row">
        <div class="label-field">Brand:</div>
        <div class="input-box">
            <?php
            
            echo $this->Form->input('brand_id', ['required'=>true, 'options'=>$brands, 'label'=>false, 'empty'=>'Select Brand','selected'=>'12', 'class'=>'input-field']); 
            ?>
        </div>
    </div>


    <div class="form-row">
       <div class="label-field">Product Name:</div>
       <div class="input-box">
        <?= $this->Form->input('product_name',['required'=>true,'class'=>'input-field','label'=>false]); ?>
    </div>
</div>
<div class="form-row">
    <div class="label-field">Price per Unit Before GST (S$):</div>
    <div class="input-box">
        <?= $this->Form->input('product_price_before_gst',['type'=>'text','required'=>true,'class'=>'input-field integer','label'=>false]); ?>

    </div>
    
</div>
<div class="form-row"> 
    <div class="label-field">Price per Unit Including GST (S$):</div>
    <div class="input-box">
      <?= $this->Form->input('product_price_including_gst',['type'=>'text','required'=>true,'class'=>'input-field integer','label'=>false]); ?>
  </div>
</div>
<div class="form-row">
    <div class="label-field">Type:</div>
    <div class="input-box">
        <?php
        
        echo $this->Form->input('product_type', ['required'=>true,  'options'=>$type, 'label'=>false, 'empty'=>'Select  Type','selected'=>'12', 'class'=>'input-field']); 
        ?>
    </div>
</div>


<div class="form-row">
    <div class="label-field">Part No.:</div>
    <div class="input-box">
        <?= $this->Form->input('product_part_num',['type'=>'text','required'=>true,  'class'=>'input-field','label'=>false]); ?>
    </div>
</div>
<div class="form-row">
    <div class="label-field">Color:</div>
    <div class="input-box">
        <?php
        
        echo $this->Form->input('product_color', ['required'=>true,  'options'=>$color, 'label'=>false, 'empty'=>'Select  color','selected'=>'12', 'class'=>'input-field']); 
        ?>
    </div>
</div>

<div class="form-row">
    <div class="label-field">Cartridge Type:</div>
    <div class="input-box">
       <?php 
       echo $this->Form->input('product_catridge_type', ['required'=>true, 'options'=>$cartridge_type, 'label'=>false, 'empty'=>'Select Cartridge Type', 'class'=>'input-field']); 
       ?>
   </div>
</div>
<div class="form-row">
    <div class="label-field">Est. Yield:</div>
    <div class="input-box">
       <?= $this->Form->input('product_est_yield',['required'=>true, 'class'=>'input-field small','label'=>false]); ?>

       <?php  echo $this->Form->input('product_est_yield1', ['required'=>true, 'options'=>$est_yield, 'label'=>false, 'empty'=>'Select Est. ','selected'=>'12', 'class'=>'input-field est-yield-select']); 
       ?>

       <!-- <select class="input-field est-yield-select"><option>Please Select</option></select>-->

   </div>
</div>
<div class="form-row">
    <div class="label-field">Stock Qty:</div>
    <div class="input-box">
     <?= $this->Form->input('product_stock_qty',['required'=>true, 'class'=>'input-field integer','label'=>false]); ?>
 </div>
</div>

<div class="form-row">
    <div class="label-field">Inventory Availability:</div>
    <div class="input-box">

        <?php 
        echo $this->Form->input('product_inventory_availability', ['required'=>true, 'options'=>$inventor_availability, 'label'=>false, 'empty'=>'Select Availability','selected'=>'12', 'class'=>'input-field ']); 
        ?>
    </div>
</div>

<div class="form-row"> 
    <div class="label-field">Alias:</div>
    <div class="input-box">
        <?= $this->Form->input('product_alias',['required'=>true, 'class'=>'input-field','label'=>false]); ?>
    </div>
</div>

<div class="form-row">
    <div class="label-field">Compatibility:</div>
    <div class="input-box">
        <?php 
        echo $this->Form->input('product_compatability', ['required'=>true, 'options'=>$compatibility, 'label'=>false, 'empty'=>'Select Compatibility ','selected'=>'12', 'class'=>'input-field ']); 
        ?>
    </div>
</div>

<div class="form-row">
    <div class="label-field">Dimensions (L x W x H):</div>
    <div class="input-box dimensions">
     <?= $this->Form->input('product_dimension_length',['type'=>'text','required'=>true, 'class'=>'input-field small integer','label'=>false]); ?> cm x <?= $this->Form->input('product_dimension_width',['type'=>'text','required'=>true, 'class'=>'input-field integer small','label'=>false]); ?> cm x <?= $this->Form->input('product_dimension_height',['type'=>'text','class'=>'input-field small integer','label'=>false]); ?> cm </div>
 </div>
 
 <div class="form-row">
    <div class="label-field">Shipping Weight:</div>
    <div class="input-box">
       <?= $this->Form->input('product_shipping_weight',['required'=>true, 'class'=>'input-field small integer','label'=>false]); ?>
       <?php 
       echo $this->Form->input('product_shipping_weight_unit', ['required'=>true, 'options'=>$shipping_weight, 'label'=>false, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field est-yield-select integer']); 
       ?>
   </div>
</div>

<div class="form-row">
    <div class="label-field">Warranty:</div>

    
    <div class="input-box">
     <?= $this->Form->input('product_warranty',['type'=>'text','required'=>true, 'class'=>'input-field','label'=>false]); ?>

 </div>
</div>

<div class="form-row">
    <div class="label-field">Usage:</div>
    <div class="input-box">
        <?php 
        echo $this->Form->input('product_usage', ['required'=>true, 'options'=>$usage, 'label'=>false, 'empty'=>'Select Usage ','selected'=>'12', 'class'=>'input-field ']); 
        ?>
    </div>
</div>     


<div class="form-row">
    <div class="label-field">Keywords (separated by commas):</div>
    <div class="input-box">
       <?= $this->Form->input('product_keywords',['required'=>true, 'class'=>'input-field','label'=>false]); ?>
   </div> (max. 5 keywords)
</div>

<div class="form-row">
    <div class="label-field">Description:</div>
    <div class="input-box">
       <?= $this->Form->input('product_description',['required'=>true, 'class'=>'input-field','label'=>false,'type'=>'textarea','rows'=>5,'cols'=>34]); ?>
       <?php //echo $this->Form->textarea('product_description'); ?>
       
   </div>
</div>

<!-- <div class="form-row">
    <div class="label-field">Minimum Order for Waiver of<br>Delivery Charges (S$):</div>
    <div class="input-box">
     <?= $this->Form->input('product_waiver_charges',['required'=>true, 'class'=>'input-field integer','label'=>false]); ?>

 </div>
</div> -->
<div >

<div id="img_id">
  

</div>

<div class="form-row">
<div class="label-field">Images:</div>
	<?php
    $productImage =  $product->productimages;
    $i =1;
    foreach($productImage as $pkey=>$pvalue)
    {

    // echo 'imgggg'. $pvalue->id;

     // echo '<div class="form-row"><div class="label-field">Image: '.$i.'</div>';

      echo '<div class="input-box add-printer-image" >';

      echo '<img class="'.$pvalue->id.'" src="'.$this->request->base.'/img/product'.DS.$pvalue->image.'" >';
          //$this->Html->image('product'.DS.$pvalue->image,["alt" => "", "class"=> $pvalue->id ]);
		echo '<input type="file" id="'.$pvalue->id.'" name="product_image[]" onchange="readURL(this);" >';
  echo '</div>';
  $i++;
        }
   
   ?>
</div>   
    <!-- <input value="change" type="file" name="product_image[]" id="printer-image" onchange="readURL(this);" > -->
   




<div class="form-row">
<div class="label-field">Image:</div><div class="input-box add-printer-image"><input type="file" name="product_image[]" id="product_image" onchange="addreadURL(this);" ><img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image" required="true">
</div>
 <div class="input_fields_wrap">
               <!--  <div class="form-row">
                    <div class="label-field">Image:</div>
                    <div class="input-box add-printer-image">
                       <input type="file" name="product_image[]" id="product_image" onchange="readURL(this);" >
                        <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image" required="true">
                    </div>
                  <!--   <button class="btn add_field_button">Add More Image</button> -->
                
            </div>

            <div  class="form-row">
                <div class="label-field"></div>
                <div class="input-box">

                     <button type="button" id="remove" class="btn add_field_button">Add More Image</button>
                </div>
            </div>
              <div class="used-printers-heading">Used on Printer(s):</div>
                
                   <div class="select-all-search clearfix">
  <div class="pull-left"><a id="select" href="javascript:void(0)">Select all</a> &nbsp;|&nbsp; <a id="deselect" href="javascript:void(0)" >Deselect  all</a></div>
  <div class="pull-right"><input id="search"  class='input-field' type="text" ><input id="printer_search" type="button" name="search" value="Search" class="btn"> <?php echo $this->Html->link('Add Printer',['action' => 'printer'],['class'=>'btn']); ?></div></div>
                
                <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                    <tbody><tr>
                        <th width="10%" class="text-center">No.</th>
                        <th width="10%">Tag</th>
                        <th width="12%">Brand</th>
                        <th width="22%">Printer Name</th>
                        <th width="25%">Alias</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </tbody></table>
                
                <div class="used-printers">
                 
                  <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                    <tbody id="alldata">

                    
                   
                </tbody>
                </table>
                
                </div>

                <div class="form-buttons">
                    <input type="submit" value="Save" class="btn"> <a class="btn btn-cancel" href="index">Cancel</a>
                </div>
            </form> 
                


</div>

              
                
            </div>
