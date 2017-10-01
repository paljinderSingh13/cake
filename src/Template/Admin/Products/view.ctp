<?php
// echo "<pre>";
// print_r($products['printer']);
 $printer = json_decode( json_encode($products['productprinters']),true); 

//die;
//        for($i=0; $i< count($products['productimages']); $i++)
//        {

//        }

// $pro_image =  $this->Html->image('product'.DS.$products['productimages'][0]->image,["alt" => "No image","width"=>"90px","height"=>"90px" ]);
?>
<script type="text/javascript">
$(function()
{
	$('.used-printers').jScrollPane({
		showArrows:true,
		verticalDragMinHeight: 50,
		verticalDragMaxHeight: 50
		});
});
</script>
<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="/DBR/images/icon-view.png" alt=""> View Product</h2>
            </div>
            
     <div class="form">
	<div class="form-row user-view-row">
            	<div class="label-field">Brand:</div>
                <div class="input-box">
                <?=  $brand; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
            	<div class="label-field">Product Name:</div>
                <div class="input-box">
                <?=  $products->product_name; ?>
                </div>
            </div>

	<div class="form-row user-view-row">
                <div class="label-field">Price per Unit Before GST (S$):</div>
                <div class="input-box">
                <?=  $products->product_price_before_gst; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Price per Unit Including GST (S$):</div>
                <div class="input-box">
                <?=  $products->product_price_including_gst; ?>
                </div>
            </div>
	 <div class="form-row user-view-row">
                <div class="label-field">Type:</div>
                <div class="input-box">
                <?=  $type; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Product Part No:</div>
                <div class="input-box">
                <?=  $products->product_part_num; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Color:</div>
                <div class="input-box">
                <?=  $color; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Catridge Type:</div>
                <div class="input-box">
                <?=  $catridgetype; ?>
                </div>
            </div>
	
             <div class="form-row user-view-row">
                <div class="label-field">Est. Yield:</div>
                <div class="input-box">
                <?=  $products->product_est_yield."  Pages"; ?>
                </div>
            </div>
             <div class="form-row user-view-row">
                <div class="label-field">Stock Qty:</div>
                <div class="input-box">
                <?=  $products->product_stock_qty; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Inventory Availability:</div>
                <div class="input-box">
                <?=  $inventoryava; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Alias:</div>
                <div class="input-box">
                <?=  $products->product_alias; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Compatibility:</div>
                <div class="input-box">
                <?=  $pcompatability; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Dimensions (L x W x H)::</div>
                <div class="input-box">
                <?=  $products->product_dimension_length.'CM '.$products->product_dimension_width.'CM '.$products->product_dimension_height. 'CM '; ?>
                </div>
            </div>
	<div class="form-row user-view-row">
                <div class="label-field">Shipping Weight:</div>
                <div class="input-box">
                <?=  $products->product_shipping_weight; ?>
                </div>
            </div>
	<div class="form-row user-view-row">
                <div class="label-field">Warranty:</div>
                <div class="input-box">
                <?=  $pwarranty; ?>
                </div>
            </div>
	<div class="form-row user-view-row">
                <div class="label-field">Usage:</div>
                <div class="input-box">
                <?=  @$pusage; ?>
                </div>
            </div>
	
	<div class="form-row user-view-row">
                <div class="label-field">Keywords (separated by commas):</div>
                <div class="input-box">
                <?=  $products->product_keywords." (max. 5 keywords)"; ?>
                </div>
            </div>
	<div class="form-row user-view-row">
                <div class="label-field">Description:</div>
                <div class="input-box">
                <?=  $products->product_description; ?>
                </div>
            </div>
	<!--<div class="form-row user-view-row">
                <div class="label-field">Minimum Order for Waiver of<br>Delivery Charges (S$):</div>
                <div class="input-box">
                <?=  $products->product_waiver_charges; ?>
                </div>
            </div>-->
            <div class="form-row user-view-row">
            <div class="label-field">Images:</div>
<?php
            for($i=0; $i< count($products['productimages']); $i++)
       { 

        $no = $i+1;
        echo '<div class="product-view-images">'.$this->Html->image('product'.DS.$products['productimages'][$i]->image,["alt" => "No image","width"=>"90px","height"=>"90px" ]).'</div>';

       }
?>
</div>

<div class="used-printers-heading">Used on Printer(s):</div>
                
                <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                    <tbody><tr>
                        <th width="10%" class="text-center">No.</th>
                        <th width="10%">Tag</th>
                        <th width="10%">&nbsp;Brand</th>
                        <th width="22%">&nbsp;Printer Name</th>
                        <th width="26%">Alias</th>
                       
                    </tr>
                </tbody></table>
                
                <div class="used-printers" >               
                  <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                   <tbody>
<?php $counts =1;
$brand='';

foreach ($products['printer'] as  $value) {
  foreach($products['setting'] as $setting){
   // 'color','brand','type','cartridge_type','est_yield','inventor _availability','compatibility','shipping_weight'

if($setting->id == $value['brand_id'] )
    {
         $brand = $setting->name;
    }
}

    $check ='<input type="checkbox" disabled="disabled" name="printer_id[]" value="'.h($value['id']).'">'; 

foreach ($printer as  $printerData) {
          
  if($printerData['printer_id']==$value['id'])
  {

$check ='<input type="checkbox" checked="checked" disabled="disabled" name="printer_id[]" value="'.h($value['id']).'">';
  } 
   }
    ?>
   <tr>
      <td width="10%" class="text-center"><?= h($counts) ?></td>
      <td width="10%"><div class="custom-checkbox"><?php echo $check; ?>
      <label></label></div></td>
      <td width="10%"><?= h($brand) ?></td>
      <td width="22%"><?= h($value['printer_name']) ?></td>
       <td width="25%"><?= h($value['alias']) ?></td>
      
<?php $counts++; 

}
?>
                    
                </tbody>
                </table>
         
        </div>




            
            <div class="view-buttons">
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $products->id],['class'=>'edit','label'=>false]) ?>
        <?= $this->Html->link(__('Delete'), ['action' => 'delete', $products->id],['class'=>'delete','lagend'=>false])   
            ?>


            </div>

            



            
            
            
            
                
               
            
    </div>
</div>
