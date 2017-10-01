 <script>
$("document").ready(function(){


  
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({	
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        }).datepicker("setDate", new Date())
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      }).datepicker("setDate", new Date())
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
 


  $(".submit").click(function(e)
    {

    checked = $("input[type=checkbox]:checked").length;

    if(!checked) {
    alert("You must check at least one product checkbox.");
    return false;
    }


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

  products();
$("#search_product").click(search_product);

/******************************************************Ajax on date change *****************************************************/
$(".promo_from").change(function(){
var fromdate = $(".promo_from").val();
var todate = $(".promo_to").val();
 $.ajax({
   type: "POST",
   dataType: "json",
   url: "searchproductbydate", 
   data:{'from':fromdate,'to':todate},
   success: function(data){
    alert(data);
   }
  });
});
 
/***************************************************************************************************************************************/


});

function search_product(){
 var pro = $("#prod_search").val();
 $.ajax({
   type: "POST",
   dataType: "json",
   url: "productsearch", //Relative or absolute path to response.php file
   data:{'pro_name':pro},
   success: function(data){

    var tr;
    var count = 1;
    if(data.product.length==0)
    {
     $("#data").html(" NO RECORD FOUND");
    }
   $.each(data.product,function(index,val)
   {
    console.log(val);
         $.each(data.setting,function(index,set)
        {
         if(set.id==val.brand_id)
          {
           brand_name = set.name;

          }
        })
       tr +='<tr><td width="10%" class="text-center">'+count+'</td>';
       tr +='<td width="10%"><div class="custom-checkbox"><input name="product_id[]" value="'+val.id+'" type="checkbox"><label></label></div></td>';
       tr +='<td width="10%">'+brand_name+'</td>';
       tr +='<td width="50%">'+val.product_name+'</td></tr>';     
   count++;
   })
   $("#data").html(tr);
   }
  });
}
  
function products(){
   $.ajax({
   type: "POST",
   dataType: "json",
   url: "getproducts", //Relative or absolute path to response.php file
   
   success: function(data) {
   //console.log(data);
   var tr;
   var count = 1;
   $.each(data.product,function(index,val)
   {
         $.each(data.setting,function(index,set)
        {
         if(set.id==val.brand_id)
          {
           brand_name = set.name;
          }
        })

       tr +='<tr><td width="10%" class="text-center">'+count+'</td>';
       tr +='<td width="10%"><div class="custom-checkbox"><input name="product_id[]" value="'+val.id+'" type="checkbox"><label></label></div></td>';
       tr +='<td width="10%">'+brand_name+'</td>';
       tr +='<td width="50%">'+val.product_name+'</td></tr>';

      
   count++;
   })

   $("#data").html(tr);
     $('.used-printers').jScrollPane({
		showArrows:true,
		verticalDragMinHeight: 50,
		verticalDragMaxHeight: 50
		});
   }
  });
}

 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#printer-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
 

<div class="white-wrapper">
 <div class="page-head clearfix">
  <h2><img width="28" height="29" alt="" src="/DBR/images/icon-add.png"> Add Promotion</h2>
 </div>

 <div class="form">
  <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
  <div class="form-row">
   <div class="label-field">Promotion:</div>
   <div class="input-box">
    <?= $this->Form->input('promotion',['required'=>true,'class'=>'input-field','label'=>false]); ?>
   </div>
  </div>

  <div class="form-row">
   <div class="label-field">From:</div>

   <div class="input-box"> 
    <?= $this->Form->input('promo_from',['required'=>true, 'id'=>'from' , 'class'=>'input-field  datepicker promo_from','label'=>false]); ?>
   </div>
  </div>


  <div class="form-row">
   <div class="label-field">To:</div>
   <div class="input-box">
    <?= $this->Form->input('promo_to',['required'=>true, 'id'=>'to' ,'class'=>'input-field datepicker promo_to','label'=>false]); ?>

   </div>

  </div>


  <div class="form-row"> 
   <div class="label-field">Promotion Amount :</div>
   <div class="input-box">
    <?= $this->Form->input('promotion_amt_percentage',['required'=>true,'class'=>'input-field small integer','label'=>false]); ?> %
   </div>
  </div>

  <div class="form-row">
   <div class="label-field">Description:</div>
   <div class="input-box">
    <?= $this->Form->input('promo_description',['required'=>true, 'class'=>'input-field','label'=>false,'type'=>'textarea','rows'=>5,'cols'=>34]); ?>
   </div>
  </div>
  <div class="form-row">
   <div class="label-field">Banner Image:</div>
   <div class="input-box add-printer-image">
   <input type="file" name="promotion_image[]" onchange="readURL(this);">
    <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
   </div>
  </div>
  <div class="used-printers-heading">Apply to Product(s):</div>
  <div class="select-all-search clearfix">
  <div class="pull-left"><a id="select" href="javascript:void(0)">Select all</a> &nbsp;|&nbsp; <a id="deselect" href="javascript:void(0)" >Deselect  all</a></div>
  <div class="pull-right"><input id="prod_search"  class='input-field' type="text" ><input id="search_product" type="button" name="search" value="Search" class="btn"></div></div>
  <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
   <tbody><tr>
    <th width="10%" class="text-center">No.</th>
    <th width="10%">Apply</th>
    <th width="10%">Brand</th>
    <th width="50%">Product Name</th>

   </tr>
  </tbody></table>

  <div class="used-printers">

<table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
    <tbody id="data">
     
    </tbody>
	</table>
	</div>

    <div class="form-buttons">
     <input type="submit" value="Save" class="btn submit">
      <?php echo $this->Html->link('Cancel',['action' => 'index'],['class'=>'btn btn-cancel']); ?>

     <!--  <a class="btn btn-cancel" href="#">Cancel</a> -->
    </div>
   </form>
  </div>
 </div>

</div>

</div>