<?php
//echo '<pre>';

foreach($data['brands'] as $value){

$brands[$value->id] = $value->name;
    
}
foreach($data['carts'] as $value){

$carts[$value->id] = $value->name;
    
}



?>


<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img width="28" height="29" alt="" src="/DBR/images/icon-pencil.png"> Add Product</h2>
            </div>
            
    <div class="form">
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
                <div class="form-row">
                    <div class="label-field">Brand:</div>
                        <div class="input-box">
                            <?php 
                             echo $this->Form->input('brand_id', ['options'=>$brands, 'label'=>false, 'empty'=>'Select Brand','selected'=>'12', 'class'=>'input-field']); 
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
                    <?= $this->Form->input('product_price_before_gst',['required'=>true,'class'=>'input-field','label'=>false]); ?>

                    </div>
                   
                    </div>
                
                
                <div class="form-row"> 
                    <div class="label-field">Price per Unit Including GST (S$):</div>
                    <div class="input-box">
                  <?= $this->Form->input('product_price_including_gst',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                </div>
                </div>

                
                <div class="form-row">
                    <div class="label-field">Type:</div>
                    <div class="input-box">
                    <?php
                    $type = array('1'=>1);
                         echo $this->Form->input('product_type', ['options'=>$type, 'label'=>false, 'empty'=>'Select  Type','selected'=>'12', 'class'=>'input-field']); 
                                ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Part No.:</div>
                    <div class="input-box">
                    <?= $this->Form->input('product_part_num',['class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Color:</div>
                    <div class="input-box">
                    <?php
                    $color = array('1'=>'red','2'=>'yellow');
                         echo $this->Form->input('product_color', ['options'=>$color, 'label'=>false, 'empty'=>'Select  color','selected'=>'12', 'class'=>'input-field']); 
                                ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Cartridge Type:</div>
                    <div class="input-box">
                         <?php 
                             echo $this->Form->input('product_catridge_type', ['options'=>$carts, 'label'=>false, 'empty'=>'Select Cartridge Type','selected'=>'12', 'class'=>'input-field']); 
                                ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Est. Yield:</div>
                    <div class="input-box">
                     <?= $this->Form->input('product_est_yield',['class'=>'input-field','label'=>false]); ?>

                     <?php $est = array('1'=>1);echo $this->Form->input('product_est_yield1', ['options'=>$est, 'label'=>false, 'empty'=>'Select Est. ','selected'=>'12', 'class'=>'input-field est-yield-select']); 
                                ?>

                    <!-- <select class="input-field est-yield-select"><option>Please Select</option></select>-->

                     </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Stock Qty:</div>
                    <div class="input-box">
                   <?= $this->Form->input('product_stock_qty',['class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Inventory Availability:</div>
                    <div class="input-box">

<?php $avail = array('1'=>'available','2'=> 'not available');
echo $this->Form->input('product_inventory_availability', ['options'=>$avail, 'label'=>false, 'empty'=>'Select Availability','selected'=>'12', 'class'=>'input-field ']); 
                                ?>
                                </div>
                </div>
                
                <div class="form-row"> 
                    <div class="label-field">Alias:</div>
                    <div class="input-box">
                    <?= $this->Form->input('product_alias',['class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Compatibility:</div>
                    <div class="input-box">
                        <?php $compat = array('1'=>1);
echo $this->Form->input('product_compatability', ['options'=>$compat, 'label'=>false, 'empty'=>'Select Compatibility ','selected'=>'12', 'class'=>'input-field ']); 
                                ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Dimensions (L x W x H):</div>
                    <div class="input-box dimensions">
                   <?= $this->Form->input('product_dimension_length',['class'=>'input-field small','label'=>false]); ?> cm x <?= $this->Form->input('product_dimension_width',['class'=>'input-field small','label'=>false]); ?> cm x <?= $this->Form->input('product_dimension_height',['class'=>'input-field small','label'=>false]); ?> cm </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Shipping Weight:</div>
                    <div class="input-box">
                     <?= $this->Form->input('product_shipping_weight',['class'=>'input-field small','label'=>false]); ?>
                        <?php $weight = array('1'=>1);
echo $this->Form->input('weight', ['options'=>$weight, 'label'=>false, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field ']); 
                                ?>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Warranty:</div>

                     
                    <div class="input-box">
                   <?= $this->Form->input('product_warranty',['class'=>'input-field','label'=>false]); ?>

                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Keywords (separated by commas):</div>
                    <div class="input-box">
                     <?= $this->Form->input('product_keywords',['class'=>'input-field','label'=>false]); ?>
                    </div> (max. 5 keywords)
                </div>
                
                <div class="form-row">
                    <div class="label-field">Image:</div>
                    <div class="input-box add-printer-image">
                        <input type="file" onchange="readURL(this);">
                        <img alt="your image" src="images/img-add-printer-image.gif" id="printer-image">
                    </div>
                </div>
                
                <div class="form-row text-right">
                    <input type="submit" class="btn" value="Add Printer">   
                </div>
                
                
                <div class="used-printers-heading">Used on Printer(s):</div>
                
                <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                    <tbody><tr>
                        <th width="10%" class="text-center">No.</th>
                        <th width="10%">Tag</th>
                        <th width="10%">Brand</th>
                        <th width="50%">Printer Name</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </tbody></table>
                
                <div class="used-printers jspScrollable" style="overflow: hidden; padding: 0px; width: 1030px;" tabindex="0">
                 
                <div class="jspContainer" style="width: 1030px; height: 307px;"><div class="jspPane" style="padding: 0px; width: 1014px; top: 0px;"><table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                    <tbody><tr>
                        <td width="10%" class="text-center">1.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td width="10%">Canon</td>
                        <td width="50%">PIXMA iP2770 / iP2772</td>
                        <td width="10%" class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">2.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">3.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">4.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">5.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-center">6.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td width="10%">Canon</td>
                        <td width="50%">PIXMA iP2770 / iP2772</td>
                        <td width="10%" class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">7.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">8.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">9.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">10.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                </tbody></table></div><div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><a class="jspArrow jspArrowUp jspDisabled"></a><div class="jspTrack" style="height: 287px;"><div class="jspDrag" style="height: 50px; top: 0px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><a class="jspArrow jspArrowDown"></a><div class="jspCap jspCapBottom"></div></div></div></div>
                
                <div class="form-buttons">
                    <input type="submit" value="Save" class="btn"> <a class="btn btn-cancel" href="#">Cancel</a>
                </div>
            </form> 
            </div>
            
        </div>