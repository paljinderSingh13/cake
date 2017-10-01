<style>
#tags{
  float:left;
  border:1px solid #ccc;
  padding:5px;
  font-family:Arial;
}
#tags > span{
  cursor:pointer;
  display:block;
  float:left;
  color:#fff;
  background:#789;
  padding:5px;
  padding-right:25px;
  margin:4px;
}
#tags > span:hover{
  opacity:0.7;
}
#tags > span:after{
 position:absolute;
 content:"×";
 border:1px solid;
 padding:2px 5px;
 margin-left:3px;
 font-size:11px;
}
#tags > input{
  background:#eee;
  border:0;
  margin:4px;
  padding:7px;
  width:auto;
}
</style>
<script type="text/javascript">

//______________ADD MORE IMAGES _____________//

    $(document).ready(function() {

        var base_url = window.location.origin;

     
// "http://stackoverflow.com"

var host = window.location.host;
// stackoverflow.com

var pathArray = window.location.pathname.split( '/' );

//         $(".add-popup").on('click',function()
//         {
//                         alert(1213);

// $("#pop_content").html('<div class="popup" id="popup"><div class="popup-heading">Add Brand Category</div><div class="popup-content text-center"><div class="form-row"><label>Category Name:</label> <div  class="input-box"><input type="text" class="input-field"></div></div><div class="form-row text-right"><input type="submit" class="btn" value="OK"> <a href="javascript:void();" onclick="$.colorbox.close();" class="btn btn-cancel">Cancel</a> </div></div></div>');


//                     $(".add-popup").colorbox({inline:true, width:'100%', maxWidth:500});

//         } )


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

            alert("Keyword exccedd limit");
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

//______________validation on Printer checkbox______//
    $("#submit").click(function(e)
    {

    checked = $("input[type=checkbox]:checked").length;

    if(!checked) {
    alert("You must check at least one printer checkbox.");
    return false;
    }


    });


//________integer validation __________________//    

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



        printers();

        $("#search_printer").click(function(){
            printer_search();
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

    var max_fields      = 8; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="input-box add-printer-image"><input type="file" name="product_image[]" id="product_image" onchange="readURL(this);" ><img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image" required="true"><a href="#" class="remove_field remove_image"></a></div>'); //add input box
        }
if(x==max_fields){

        $("#remove").hide();
}


    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        imgcounter = $("#imgcount").val();
        e.preventDefault(); $(this).parent('div').remove(); imgcounter--;
        $("#imgcount").val(imgcounter);
          $("#remove").show();
    })
});

// function popup(type)
// {    
//     $("#name").val('');
//    ntype = type.replace('_', ' ');
//     $("#head").html(ntype);
//     $("#types").val(type);
//     $(".add-popup").colorbox({inline:true, width:'100%', maxWidth:500});
// }
// function removesetting(type)
// {
//    name =  $("#"+type).val();

//     $.ajax({
//     url:'removesetting',
//     type:"POST",
//     dataType:"json",
//     data:{'name':name , 'type': type},
//     success: function(response)
//     {
//         $("#"+type).html('');
//           $.each(response, function (key, value) {
//         console.log(value.name);
//      $("#"+type).append($("<option></option>").val(value.name).html(value.name));
//      })
// }})


   

// }
// function addsetting()
// {

//   type =  $("#types").val();
//     if($("#name").val()!='')
//     {
//         name =  $("#name").val();
//     }else{
//         alert('name must be fill out!');
//          return false;
//     }
//      $.ajax({
//     url:'addsetting',
//     type:"POST",
//     dataType:"json",
//     data:{'name':name , 'type': type},
//     success: function(response)
//     {
//        // console.log(response);
// $("#"+type).html('');
//   $.each(response, function (key, value) {
// console.log(value.name);


//  $("#"+type).append($("<option></option>").val(value.name).html(value.name));


//   })

// $("#"+type).val(name);
// $.colorbox.close();

//     }
//     })

// }

function printer_search()
{
       search  =  $("#printer_search").val();
       $.ajax({
        url:"printersearch",
        type:"POST",
        dataType:"json",
        data:{'search':search},
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

        tr +='<tr><td width="10%" class="text-center">'+count+'</td>';
        tr +='<td width="10%"><div class="custom-checkbox"><input type="checkbox" name="printer_id[]" value="'+val.id+'"><label></label></div></td>';
        tr +='<td width="10%">'+brand_name+'</td>';
        tr +='<td width="40%">'+val.printer_name+'</td>';
        tr +='<td width="20%">'+val.alias+'</td>';
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
    $.ajax({
        type: "POST",
        dataType: "json",
url: "getprinters", //Relative or absolute path to response.php file
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

        tr +='<tr><td width="10%" class="text-center">'+count+'</td>';
        tr +='<td width="10%"><div class="custom-checkbox"><input type="checkbox" name="printer_id[]" value="'+val.id+'"><label></label></div></td>';
        tr +='<td width="10%">'+brand_name+'</td>';
        tr +='<td width="40%">'+val.printer_name+'</td>';
        tr +='<td width="20%">'+val.alias+'</td>';
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

<?php
//echo '<pre>';



foreach($data['setting'] as $value){
   // 'color','brand','type','cartridge_type','est_yield','inventor _availability','compatibility','shipping_weight'

    if($value->type =="usage" )
    {
        $usage[$value->name] = $value->name;
    }
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
    
}

?>
<script type='text/javascript'>



   $(document).ready(function(){ 
         $('.used-printers').jScrollPane({
		showArrows:true,
		verticalDragMinHeight: 50,
		verticalDragMaxHeight: 50
		});
   });  



    function readURL(input) {
     // img =  $(input).closest('img').attr('src');
var ext = $(input).val().split('.').pop().toLowerCase();
if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
    alert('invalid extension!');

    return false;
}

id = input.id.replace('product_image_','');

       var url = $(input).next('img').attr('src');      
    
      
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).next('img').attr('src',e.target.result);

imgcounter = $("#imgcount").val();
if(id < imgcounter)
{
//alert('old img')
}else{

    var max_fields      = 8; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

      
    var x = imgcounter; //initlal text box count
    imgcounter++;
    $("#imgcount").val(imgcounter);
  //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment

            //alert(x);
            $(wrapper).append('<div class="input-box add-printer-image"><input type="file" name="product_image[]" id="product_image_'+x+'" onchange="readURL(this);" ><img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image" required="true"><a href="#" class="remove_field remove_image"></a></div>'); //add input box
        }
if(x==max_fields){

        $("#remove").hide();
}

}

                //$('#printer-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>

<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img width="27" height="27" alt="" src="/DBR/images/icon-add.png"> Add Product</h2>
            </div>
            
    <div class="form">
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
                <div class="form-row">
                    <div class="label-field">Brand:</div>
                        <div class="input-box">
                            <?php echo $this->Form->input('brand_id', ["id"=>"brand" ,'options'=>$brands, 'required'=>true,'label'=>false, 'empty'=>'Select Brand','selected'=>'12', 'class'=>'input-field']); 
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
                    <?= $this->Form->input('product_price_before_gst',['required'=>true,'class'=>'input-field integer','label'=>false]); ?>

                    </div>
                   
                    </div>
                
                
                <div class="form-row"> 
                    <div class="label-field">Price per Unit Including GST (S$):</div>
                    <div class="input-box">
                  <?= $this->Form->input('product_price_including_gst',['required'=>true,'class'=>'input-field integer','label'=>false]); ?>
                </div>
                </div>

                
                <div class="form-row">
                    <div class="label-field">Type:</div>
                    <div class="input-box">
                    <?php
                  echo $this->Form->input('product_type', ["id"=>"type", 'options'=>$type, 'required'=>true,'label'=>false, 'empty'=>'Select  Type','selected'=>'12', 'class'=>'input-field']); 
                                ?>
                                <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('type')" ></a> <a onclick="removesetting('type')"   class="icon-minus"></a></div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Part No.:</div>
                    <div class="input-box">
                    <?= $this->Form->input('product_part_num',['class'=>'input-field','label'=>false,'required'=>true]); ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Color:</div>
                    <div class="input-box">
                    <?php
                    //$color = array('1'=>'red','2'=>'yellow');
                         echo $this->Form->input('product_color', ["id"=>"color", 'options'=>$color, 'required'=>true,'label'=>false, 'empty'=>'Select  color','selected'=>'12', 'class'=>'input-field']); 
                                ?>
                                <div class="plus-minus"><a  href="#popup" class="icon-plus add-popup"  onclick="popup('color')" ></a> <a  onclick="removesetting('color')"  class="icon-minus"></a></div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Cartridge Type:</div>
                    <div class="input-box">
                         <?php 

                             echo $this->Form->input('product_catridge_type', ['id'=>'cartridge_type','options'=>$cartridge_type, 'label'=>false, 'empty'=>'Select Cartridge Type','selected'=>'12','required'=>true, 'class'=>'input-field']); 
                                ?>
                                <div class="plus-minus"><a  class="icon-plus add-popup"  onclick="popup('cartridge_type')" ></a> <a  onclick="removesetting('cartridge_type')"   class="icon-minus"></a></div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Est. Yield:</div>
                    <div class="input-box">
                     <?= $this->Form->input('product_est_yield',['class'=>'input-field small integer','label'=>false,'required'=>true]); ?>
                      <?php 
                    echo $this->Form->input('product_est_yield1', ['id'=>'est_yield' , 'options'=>$est_yield, 'label'=>false,'required'=>true, 'empty'=>'Select Est. ','selected'=>'12', 'class'=>'input-field est-yield-select']); 
                                ?> 
                     <div class="plus-minus"><a  href="#popup" class="icon-plus add-popup"  onclick="popup('est_yield')" ></a> <a onclick="removesetting('est_yield')" class="icon-minus"></a></div>

                    <!-- <select class="input-field est-yield-select"><option>Please Select</option></select>-->

                     </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Stock Qty:</div>
                    <div class="input-box">
                   <?= $this->Form->input('product_stock_qty',['class'=>'input-field integer','label'=>false,'required'=>true]); ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Inventory Availability:</div>
                    <div class="input-box">

<?php 
echo $this->Form->input('product_inventory_availability', ['id'=>'inventor_availability' , 'options'=>$inventor_availability, 'label'=>false,'required'=>true, 'empty'=>'Select Availability','selected'=>'12', 'class'=>'input-field ']); 
                                ?>
     <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('inventor_availability')" ></a> <a onclick="removesetting('inventor_availability')"  class="icon-minus"></a></div>

                                </div>
                </div>
                
                <div class="form-row"> 
                    <div class="label-field">Alias:</div>
                    <div class="input-box">
                    <?= $this->Form->input('product_alias',['class'=>'input-field','label'=>false,'required'=>true]); ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Compatibility:</div>
                    <div class="input-box">
                        <?php 
echo $this->Form->input('product_compatability', ['id'=>'compatibility' ,'options'=>$compatibility, 'label'=>false, 'empty'=>'Select Compatibility ','selected'=>'12', 'class'=>'input-field','required'=>true]); 
                                ?>
 <div class="plus-minus"><a href="#popup"  class="icon-plus add-popup"  onclick="popup('compatibility')" ></a> <a  onclick="removesetting('compatibility')"    class="icon-minus"></a></div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Dimensions (L x W x H):</div>
                    <div class="input-box dimensions">
                   <?= $this->Form->input('product_dimension_length',['class'=>'input-field small integer','label'=>false,'required'=>true]); ?> cm x <?= $this->Form->input('product_dimension_width',['class'=>'input-field small integer','label'=>false,'required'=>true]); ?> cm x <?= $this->Form->input('product_dimension_height',['class'=>'input-field small integer','label'=>false,'required'=>true]); ?> cm </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Shipping Weight:</div>
                    <div class="input-box">
                     <?= $this->Form->input('product_shipping_weight',['class'=>'input-field small integer','label'=>false,'required'=>true]); ?>
                        <?php 
echo $this->Form->input('product_shipping_weight_unit', ['id'=>'shipping_weight', 'options'=>$shipping_weight, 'label'=>false, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field  est-yield-select integer','required'=>true]); 
                                ?>
 <div class="plus-minus"><a href="#popup"  class="icon-plus add-popup"  onclick="popup('shipping_weight')" ></a> <a onclick="removesetting('shipping_weight')"   class="icon-minus"></a></div>

                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Warranty:</div>

                     
                    <div class="input-box">
                   <?= $this->Form->input('product_warranty',['class'=>'input-field','label'=>false,'required'=>true]); ?>

                    </div>
                </div>

                <div class="form-row">
                    <div class="label-field">Usage:</div>
                    <div class="input-box">
                        <?php 
echo $this->Form->input('product_usage', ['id'=>'usage', 'options'=>$usage, 'required'=>true,'label'=>false, 'empty'=>'Select Usage ','selected'=>'12', 'class'=>'input-field ']); 
                                ?> 
 <div class="plus-minus"><a href="#popup" class="icon-plus add-popup"  onclick="popup('usage')" ></a> <a onclick="removesetting('usage')"  class="icon-minus"></a></div>


                    </div>
                </div>     
                
                <div class="form-row">
                    <div class="label-field">Keywords (separated by commas):</div>
                    <div class="input-box">
                      <div id="tags">
                        
                     <input type="text" value="" placeholder="Add a tag" />
                </div>    
                     <?= $this->Form->input('product_keywords',['hidden'=>True , 'id'=>'keywords' ,'class'=>'input-field', 'required'=>true, 'label'=>false]); ?>
                    </div> (max. 5 keywords)
                </div>
                 <div class="form-row">
                    <div class="label-field">Description:</div>
                    <div class="input-box">
                     <?= $this->Form->input('product_description',['class'=>'input-field','required'=>true,'label'=>false,'type'=>'textarea','rows'=>5,'cols'=>34]); ?>
                     <?php //echo $this->Form->textarea('product_description'); ?>
                    
                    </div>
                </div>

               <!-- <div class="form-row">
    <div class="label-field">Minimum Order for Waiver of<br>Delivery Charges (S$):</div>
    <div class="input-box">
     <?= $this->Form->input('product_waiver_charges',['required'=>true, 'class'=>'input-field integer','label'=>false]); ?>

 </div>
</div>-->
            <input type="hidden" id="imgcount" value="1" >

             
                <div class="form-row">
                    <div class="label-field" style="float:left;">Image:</div>
					<div class="input_fields_wrap">
					<div class="input-box add-printer-image">
                       <input type="file" name="product_image[]" id="product_image_1" onchange="readURL(this);" >
                        <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image" required="true">
                    </div>
                  
                </div>
            </div>


              

                
                
                <div class="used-printers-heading">Used on Printer(s):</div>
<!--  <div class="select-all-search clearfix">
  <div class="pull-left"><a id="select" href="javascript:void(0)">Select all</a> &nbsp;|&nbsp; <a id="deselect" href="javascript:void(0)" >Deselect  all</a></div>
  <div class="pull-right"><input id="printer_search"  class='input-field' type="text" ><input id="search_printer" type="button" name="search" value="Search" class="btn"></div></div>  -->

  <div class="select-all-search clearfix">
  <div class="pull-left"><a id="select" href="javascript:void(0)">Select all</a> &nbsp;|&nbsp; <a id="deselect" href="javascript:void(0)" >Deselect  all</a></div>
  <div class="pull-right"><input id="search"  class='input-field' type="text" ><input id="printer_search" type="button" name="search" value="Search" class="btn"> <?php echo $this->Html->link('Add Printer',['action' => 'printer'],['class'=>'btn']); ?></div></div>               
                <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                    <tbody><tr>
                        <th width="10%" class="text-center">No.</th>
                        <th width="10%">Tag</th>
                        <th width="10%">Brand</th>
                        <th width="40%">Printer Name</th>
                        <th width="20%">Alias</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </tbody></table>
                
                <div class="used-printers" >               
                  <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                   <tbody id="alldata">

                    
                </tbody>
                </table>

        </div>
                
                <div class="form-buttons">
                    <input id="submit" type="submit" value="Save" class="btn submit"> <a class="btn btn-cancel" href="index">Cancel</a>
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