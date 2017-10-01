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

//_______________pop up ADD Setting  ____________//

function addsetting()
{
$.ajax({
    url:'addsetting',
    type:"POST",
    dataType:"json",
    data:{'name':'name' , 'type': 'type'},
success: function(response)
    {

    }
})

}
//_______________End Add Setting ________________//
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
                            <?php echo $this->Form->input('brand_id', ['options'=>$brands, 'required'=>true,'label'=>false, 'empty'=>'Select Brand','selected'=>'12', 'class'=>'input-field']); 
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
                  echo $this->Form->input('product_type', ['options'=>$type, 'required'=>true,'label'=>false, 'empty'=>'Select  Type','selected'=>'12', 'class'=>'input-field']); 
                                ?>
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
                         echo $this->Form->input('product_color', ['options'=>$color, 'required'=>true,'label'=>false, 'empty'=>'Select  color','selected'=>'12', 'class'=>'input-field']); 
                                ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Cartridge Type:</div>
                    <div class="input-box">
                         <?php 

                             echo $this->Form->input('product_catridge_type', ['options'=>$cartridge_type, 'label'=>false, 'empty'=>'Select Cartridge Type','selected'=>'12','required'=>true, 'class'=>'input-field']); 
                                ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Est. Yield:</div>
                    <div class="input-box">
                     <?= $this->Form->input('product_est_yield',['class'=>'input-field small integer','label'=>false,'required'=>true]); ?>

                     <?php 
                    echo $this->Form->input('product_est_yield1', ['options'=>$est_yield, 'label'=>false,'required'=>true, 'empty'=>'Select Est. ','selected'=>'12', 'class'=>'input-field est-yield-select']); 
                                ?>

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
echo $this->Form->input('product_inventory_availability', ['options'=>$inventor_availability, 'label'=>false,'required'=>true, 'empty'=>'Select Availability','selected'=>'12', 'class'=>'input-field ']); 
                                ?>
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
echo $this->Form->input('product_compatability', ['options'=>$compatibility, 'label'=>false, 'empty'=>'Select Compatibility ','selected'=>'12', 'class'=>'input-field','required'=>true]); 
                                ?>
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
echo $this->Form->input('product_shipping_weight_unit', ['options'=>$shipping_weight, 'label'=>false, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field  est-yield-select integer','required'=>true]); 
                                ?>
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
echo $this->Form->input('product_usage', ['options'=>$usage, 'required'=>true,'label'=>false, 'empty'=>'Select Usage ','selected'=>'12', 'class'=>'input-field ']); 
                                ?>
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
