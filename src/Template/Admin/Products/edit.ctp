<style>
#tags{
  float:left;
  border:1px solid #ccc;
  padding:5px;
  background:#fff;
  border-radius:5px;
}
#tags > span{
  cursor:pointer;
  display:block;
  float:left;
  color:#fff;
  background:rgb(16, 106, 164);
  padding:5px;
  padding-right:25px;
  margin:4px;
  position:relative;
}
#tags > span:hover{
  background:#000;
}
#tags > span:after{
 position:absolute;
 content:"×";
 border:1px solid;
 padding:0 5px;
 margin-left:3px;
 font-size:11px;
 top:6px;
 line-height:16px;
}
#tags > input{
  background:#eee;
  border:0;
  margin:4px 0;
  padding:7px;
  width:100%;
}
</style>
 <input  id='product_id' value="<?= h($product['id']) ?>" type="hidden">
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
        $type[$value->name] = $value->name;
    }
    if($value->type =="color" )
    {
        $color[$value->name] = $value->name;
    }
    if($value->type =="cartridge_type" )
    {
        $cartridge_type[$value->name] = $value->name;
    }
    if($value->type =="est_yield" )
    {
        $est_yield[$value->name] = $value->name;
    }
    if($value->type =="inventor_availability" )
    {
        $inventor_availability[$value->name] = $value->name;
    }
    if($value->type =="compatibility" )
    {
        $compatibility[$value->name] = $value->name;
    }
    if($value->type =="shipping_weight" )
    {
        $shipping_weight[$value->name] = $value->name;
    }
    if($value->type =="usage" )
    {
        $usage[$value->name] = $value->name;
    }
    
}



?>
<script type='text/javascript'>
   $(document).ready(function(){ 
   printers();

   //___________________Keywords Script_________________________________//        

        $("#tags input").on({
    focusout : function() {
      var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
      if(txt)
      { 


        if($('#tags > span').length  <5)
        { $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
             keys =  $("#keywords").val();
             nkey = keys+''+txt+', '; 
              $("#keywords").val(nkey);
        }
        else{

            alert("Keyword exceed limit");
        }
  }
      //alert(txt);
      this.value = "";
    },
    keyup : function(ev) {
      // if: comma|enter (delimit more keyCodes with | pipe)
      if(/(188|13)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#tags').on('click', 'span', function() {
    if(confirm("Remove "+ $(this).text() +"?"))
    {  Val = $("#keywords").val();
      newv =   Val.replace($(this).text()+',' , '');
        $("#keywords").val(newv);
     $(this).remove(); 

    }
  });

//___________________End Keywords Script_________________________________//   


    //______________validation on Printer checkbox______//
    $(".submit").click(function(e)
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


//----------------------------------REMOVE IMAGE ______________________________________________////    
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text

      imgcounter = $("#imgcount").val();
        e.preventDefault(); $(this).parent('div').remove(); imgcounter--;
        $("#imgcount").val(imgcounter);
        // e.preventDefault(); $(this).parent('div').remove(); x--;
        //   $("#remove").show();
    })



//-------------------------------PRINTER SEARCH ______________________________________________////    

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


//-------------------------------ADD NEW IMAGE ______________________________________________////    


 function addreadURL(input) {
     // img =  $(input).closest('img').attr('src');
    var ext = $(input).val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
    alert('invalid extension!');
      return false;
    }

  var url = $(input).next('img').attr('src');      
  if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function (e) 
  {
  $(input).next('img').attr('src',e.target.result);
  //$('#printer-image').attr('src', e.target.result);
  id = input.id.replace('product_image_','');

  imgcounter = $("#imgcount").val();
  if(id < imgcounter)
  {
  }else{

    var max_fields      = 8; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var x = imgcounter; //initlal text box count
  //on add input button click
  e.preventDefault();
    if(x < max_fields)
    { //max input box allowed
      imgcounter++;
      $("#imgcount").val(imgcounter);
      x++; //text box increment

      // alert(x);
      $(wrapper).append('<div class="input-box add-printer-image"><input type="file" name="product_image[]" id="product_image_'+x+'" onchange="addreadURL(this);" ><img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image" required="true"><a href="#" class="remove_field remove_image"></a></div>'); //add input box
    }
    if(x==max_fields)
    {
      $("#remove").hide();
    }

  }
}

      reader.readAsDataURL(input.files[0]);
}
}

//--------------------FOR EDIT IMAGE -----------------------------------------//
function readURL(input) {

  var ext = $(input).val().split('.').pop().toLowerCase();
if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
    alert('invalid extension!');

    return false;
}
  //alert(input.id);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("."+input.id).attr('src', e.target.result);

               // alert(input.id);
                if(input.id!='product_image')
                {

                $("#img_id").append('<input name="changeimg[]" type="hidden" value="'+input.id+'">')
               }
 }

            reader.readAsDataURL(input.files[0]);
        }
    }


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
            
            echo $this->Form->input('brand_id', ['id'=>'brand' ,'required'=>true, 'options'=>$brands, 'label'=>false, 'empty'=>'Select Brand','selected'=>'12', 'class'=>'input-field']); 
            ?>
            <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('brand')" ></a> 
                                <a onclick="removesetting('brand')" class="icon-minus"></a></div>
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
        
        echo $this->Form->input('product_type', ['id'=>'type','required'=>true,  'options'=>$type, 'label'=>false, 'empty'=>'Select  Type','selected'=>'12', 'class'=>'input-field']); 
        ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('type')" ></a> 
                                <a onclick="removesetting('type')" class="icon-minus"></a></div>
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
        
        echo $this->Form->input('product_color', ['id'=>'color' ,  'required'=>true,  'options'=>$color, 'label'=>false, 'empty'=>'Select  color','selected'=>'12', 'class'=>'input-field']); 
        ?>
 <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('color')" ></a> 
                                <a onclick="removesetting('color')" class="icon-minus"></a></div>

    </div>
</div>

<div class="form-row">
    <div class="label-field">Cartridge Type:</div>
    <div class="input-box">
       <?php 
       echo $this->Form->input('product_catridge_type', ['id'=>'cartridge_type' ,'required'=>true, 'options'=>$cartridge_type, 'label'=>false, 'empty'=>'Select Cartridge Type', 'class'=>'input-field']); 
       ?>
       <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('cartridge_type')" ></a> 
                                <a onclick="removesetting('cartridge_type')" class="icon-minus"></a></div>
   </div>
</div>
<div class="form-row">
    <div class="label-field">Est. Yield:</div>
    <div class="input-box">
       <?= $this->Form->input('product_est_yield',['required'=>true, 'class'=>'input-field small','label'=>false]); ?>

       <?php  echo $this->Form->input('product_est_yield1', ['id'=>'est_yield', 'required'=>true, 'options'=>$est_yield, 'label'=>false, 'selected'=>'12', 'class'=>'input-field est-yield-select']); 
       ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('est_yield')" ></a> 
                                <a onclick="removesetting('est_yield')" class="icon-minus"></a></div>

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
        echo $this->Form->input('product_inventory_availability', ['id'=>'inventor_availability' , 'required'=>true, 'options'=>$inventor_availability, 'label'=>false, 'empty'=>'Select Availability','selected'=>'12', 'class'=>'input-field ']); 
        ?>
  <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('inventor_availability')" ></a> 
                                <a onclick="removesetting('inventor_availability')" class="icon-minus"></a></div>
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
        echo $this->Form->input('product_compatability', ['id'=>'compatibility' , 'required'=>true, 'options'=>$compatibility, 'label'=>false, 'empty'=>'Select Compatibility ','selected'=>'12', 'class'=>'input-field ']); 
        ?>
        <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('compatibility')" ></a> 
                                <a onclick="removesetting('compatibility')" class="icon-minus"></a></div>
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
       echo $this->Form->input('product_shipping_weight_unit', ['id'=>'shipping_weight' , 'required'=>true, 'options'=>$shipping_weight, 'label'=>false, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field est-yield-select integer']); 
       ?>
<div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('shipping_weight')" ></a> 
                                <a onclick="removesetting('shipping_weight')" class="icon-minus"></a></div>

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
        echo $this->Form->input('product_usage', ['id'=>'usage', 'required'=>true, 'options'=>$usage, 'label'=>false, 'empty'=>'Select Usage ','selected'=>'12', 'class'=>'input-field ']); 
        ?>
      <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('usage')" ></a> 
                                <a onclick="removesetting('usage')" class="icon-minus"></a></div>
    </div>
</div>     


<div class="form-row">
    <div class="label-field">Keywords (separated by commas):</div>
    <div class="input-box">

        <div id="tags">
       <?php 
        $tags = explode(',' ,$product->product_keywords);  //echo count($tags); 
          for($i=0; $i<count($tags); $i++)
          {
            echo '<span>'.$tags[$i].'</span>';
          }
         ?>                     
                     <input type="text" value="" placeholder="Add a tag" />
                </div>    
                     <?= $this->Form->input('product_keywords',['hidden'=>True , 'id'=>'keywords' ,'class'=>'input-field', 'required'=>true, 'label'=>false]); ?>
                    </div> (max. 5 keywords)
               

</div>

<div class="form-row">
    <div class="label-field">Description:</div>
    <div class="input-box">
       <?= $this->Form->input('product_description',['required'=>true, 'class'=>'input-field','label'=>false,'type'=>'textarea','rows'=>5,'cols'=>34]); ?>
       <?php //echo $this->Form->textarea('product_description'); ?>
       
   </div>
</div>



<div id="img_id">
  

</div> 
<?php $imgcounter = count($product->productimages)+1; ?>
  <input  id='imgcount' value="<?= h($imgcounter) ?>" type="hidden">

<div class="form-row">
<div class="label-field" style="float:left;">Image:</div>
<div class="input_fields_wrap">
	<?php
    $productImage =  $product->productimages;
    $i =1;
    foreach($productImage as $pkey=>$pvalue)
    {

     echo '<div class="input-box add-printer-image" >';

echo '<img class="'.$pvalue->id.'" src="'.$this->request->base.'/img/product'.DS.$pvalue->image.'" >';
          //$this->Html->image('product'.DS.$pvalue->image,["alt" => "", "class"=> $pvalue->id ]);
		echo '<input type="file" id="'.$pvalue->id.'" name="product_image[]" onchange="readURL(this);" >';
  echo '</div>';
  $i++;
        }
   
   ?>
  
    <!-- <input value="change" type="file" name="product_image[]" id="printer-image" onchange="readURL(this);" > -->
   


<?php if($imgcounter<9){ ?>


<div class="input-box add-printer-image"><input type="file" name="product_image[]" id="product_image_<?php  echo $imgcounter;  ?>" onchange="addreadURL(this);" ><img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image" required="true">
</div>
</div> 
<?php } ?>
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
                    <input type="submit" value="Save" class="btn submit"> <a class="btn btn-cancel" href="index">Cancel</a>
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