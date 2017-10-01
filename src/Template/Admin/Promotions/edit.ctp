<?php //echo "<pre>";

//print_r($promotion['id']);
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
 $url = $this->request->host().'/'.$this->request->base;
// echo "<br>";
// echo $this->request->url;

// die;
 ?>
<input  id='promotion_id' value="<?= h($promotion['id']) ?>" type="hidden">


<SCRIPT language="javascript">



 $(function(){

  var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
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

   $('#selectall').click(function(){
    
            $('tbody tr td input[type="checkbox"]').each(function(){
                $(this).prop('checked', true);
            });
            
           });
    
    $('#deselectall').click(function(){
          $('tbody tr td input[type="checkbox"]').each(function(){
              $(this).prop('checked', false);
          });
      });


    //______________validation on Printer checkbox______//
    $(".submit").click(function(e)
    {

        checked = $("input[type=checkbox]:checked").length;

        if(!checked) {
        alert("You must check at least one product checkbox.");
        return false;
        }
    });

 // add multiple select / deselect functionality
 
 // if all checkbox are selected, check the selectall checkbox
 // and viceversa
 
});
</SCRIPT>
<script>
$("document").ready(function(){

  products();
$("#search_product").click(search_product);

});

function search_product()
{
//url = "http://localhost/DBR/admin/promotions/productsearch";
url ="http://sgappstore.com/DBR/admin/promotions/productsearch";

 var pro = $("#prod_search").val();
 promotion_id = $("#promotion_id").val();

 $.ajax({
   type: "POST",
   dataType: "json",
   url: url, //Relative or absolute path to response.php file
   data:{'pro_name':pro, 'edit':'yes','promotion_id':promotion_id},
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

         check ='<input class="case"  name="product_id[]" value="'+val.id+'" type="checkbox">';
         $.each(data.productpromotions,function(index,v)
    {
       if(v.product_id ==val.id)
       {
         check ='<input class="case" checked="checked" name="product_id[]" value="'+val.id+'" type="checkbox">';
        }
    })


       tr +='<tr><td width="10%" class="text-center">'+count+'</td>';
       tr +='<td width="10%"><div class="custom-checkbox">'+check+'<label></label></div></td>';
       tr +='<td width="10%">'+brand_name+'</td>';
       tr +='<td width="50%">'+val.product_name+'</td></tr>';

      
   count++;
   })

   $("#data").html(tr);
   }
  });

   }
  
function products(){
//url = "http://localhost/DBR/admin/promotions/getproducts";
url ="http://sgappstore.com/DBR/admin/promotions/getproducts";
  promotion_id = $("#promotion_id").val();
   $.ajax({
   type: "POST",
   dataType: "json",
   url: url, 
   data: {'promotion_id': promotion_id},
   success: function(data) {
  // console.log(data.productpromotions);
   
   var tr;
   var count = 1;
   var check;
   $.each(data.product,function(index,val)
   {
         $.each(data.setting,function(index,set)
        {
         if(set.id==val.brand_id)
          {
           brand_name = set.name;
          }
        })
check ='<input class="case"  name="product_id[]" value="'+val.id+'" type="checkbox">';
         $.each(data.productpromotions,function(index,v)
    {
       if(v.product_id ==val.id)
       {
         check ='<input class="case" checked="checked" name="product_id[]" value="'+val.id+'" type="checkbox">';
        }
    })

       tr +='<tr><td width="10%" class="text-center">'+count+'</td>';
       tr +='<td width="10%"><div class="custom-checkbox">'+check+'<label></label></div></td>';
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

<!--  <?php foreach($promotion['product'] as $val){
      foreach($promotion['setting'] as $value)
      {
       if($value['id'] == $val['brand_id'])
       {
        $brand_name =  $value['name'];
       }
      }
      $check ='<input class="case"  name="product_id[]" value="'.h($val['id']).'" type="checkbox">';
      foreach ($promotion['productpromotions'] as $v)
      {

       if($v['product_id'] ==$val['id'])
       {
        
        $check ='<input class="case"  checked="checked" name="product_id[]" value="'.h($val['id']).'" type="checkbox">';
       }
       
      }
      
      ?>
      <tr>
       <td width="10%" class="text-center"><?= h($count) ?></td>
       <td width="10%"><div class="custom-checkbox"> <?php echo $check; ?> <label></label></div></td>
       <td width="10%"><?= h($brand_name) ?></td>
       <td width="50%"><?= h($val['product_name']) ?></td>
       
      </tr>
      <?php  $count++;
     } ?> -->

<div class="white-wrapper">
 <div class="page-head clearfix">
  <h2><img src="<?php echo $this->Url->build('/');?>images/icon-pencil.png" width="28" height="29" alt=""> Edit Promotion</h2>
 </div>
 <div class='form'>
  
  <?=  $this->Form->create($promotion,['type'=>'file','id'=>'user-registration']); ?>
  <div class="form-row">
   <div class="label-field">Promotion:</div>
   <div class="input-box">
    <?= $this->Form->input('promotion',['required'=>true,'class'=>'input-field','label'=>false]); ?>
   </div>
  </div>
  
  <div class="form-row">
   <div class="label-field">From:</div>

   <div class="input-box"> 
    <?= $this->Form->input('promo_from',['type'=>'text', 'id'=>'from' , 'required'=>true,'class'=>'input-field datepicker','label'=>false]); ?>
   </div>
  </div>

  
  <div class="form-row">
   <div class="label-field">To:</div>
   <div class="input-box">
    <?= $this->Form->input('promo_to',['type'=>'text' ,'required'=>true, 'id'=>'to' ,'class'=>'input-field datepicker','label'=>false]); ?>

   </div>
   
  </div>
  
  
  <div class="form-row"> 
   <div class="label-field">Promotion Amount:</div>
   <div class="input-box">
    <?= $this->Form->input('promotion_amt_percentage',['type'=>'text' ,'required'=>true,'class'=>'input-field small integer','label'=>false]); ?> %
   </div>
  </div>

  
  
  
  <div class="form-row">
   <div class="label-field">Description:</div>
   <div class="input-box">
    <?= $this->Form->input('promo_description',[ 'required'=>true, 'class'=>'input-field','label'=>false, 'type'=>'textarea','rows'=>5,'cols'=>34]); ?>
   </div>
  </div>
<?php  if(empty($promotion['promo_banner'])){ ?>

 <div class="form-row">
   <div class="label-field">Banner Image:</div>
   <div class="input-box add-printer-image">
   <input type="file" name="promotion_image[]" onchange="readURL(this);">
    <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
   </div>
  </div>

<?php  } else{?>
  <div class="form-row">
   <div class="label-field">Banner Image:</div>
   <div class="input-box promotion-banner-image">
 
    <img alt="your image" src="/DBR/img/promotion/<?php echo $promotion['promo_banner']; ?>">
   </div>
  </div>
  <?php  } ?>

   <!--div class="form-row">
   <div class="label-field">Replace Image:</div>
   <div class="input-box add-printer-image">
   <input type="file" name="promotion_image[]" onchange="readURL(this);">
    <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
   </div>
  </div-->

  <div class="used-printers-heading">Apply to Product(s):</div>

  	<div class="select-all-search clearfix">
    <div class="pull-left"><a id="selectall" href="javascript:void(0)">Select all</a> &nbsp;|&nbsp; <a id="deselectall"  href="javascript:void(0)">De select  all</a> </div>
    <div class="pull-right"><input id="prod_search"class='input-field' type="text" ><input id="search_product" type="button" value="search" class="btn"></div>
    </div>
    
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
     
    </tbody></table></div>




    
    <div class="form-buttons">
     <?= $this->Form->input('Submit',['div'=>false,'type'=>'submit','class'=>'btn submit']); ?>
     <a href="#" class="btn btn-cancel">Cancel</a>
    </div>
    
   </div>
  </form>

 </div>

</div>