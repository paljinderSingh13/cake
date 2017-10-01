 <?php


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
    
}


  ?>


 <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="<?php echo $this->Url->build('/');?>images/icon-pencil.png" width="28" height="29" alt=""> Edit User</h2>
            </div>
            <div class='form'>
    
 <?=  $this->Form->create($product,['type'=>'file','id'=>'user-registration']); ?>
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
                    <?= $this->Form->input('product_name',['required'=>false,'class'=>'input-field','label'=>false]); ?>
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
                   
                         echo $this->Form->input('product_color', ['options'=>$color, 'label'=>false, 'empty'=>'Select  color','selected'=>'12', 'class'=>'input-field']); 
                                ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="label-field">Cartridge Type:</div>
                    <div class="input-box">
                         <?php 
                             echo $this->Form->input('product_catridge_type', ['options'=>$cartridge_type, 'label'=>false, 'empty'=>'Select Cartridge Type','selected'=>'12', 'class'=>'input-field']); 
                                ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="label-field">Est. Yield:</div>
                    <div class="input-box">
                     <?= $this->Form->input('product_est_yield',['class'=>'input-field','label'=>false]); ?>

                     <?php $est = array('1'=>1);echo $this->Form->input('product_est_yield1', ['options'=>$est_yield, 'label'=>false, 'empty'=>'Select Est. ','selected'=>'12', 'class'=>'input-field est-yield-select']); 
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

<?php

echo $this->Form->input('product_inventory_availability', ['options'=>$inventor_availability, 'label'=>false, 'empty'=>'Select Availability','selected'=>'12', 'class'=>'input-field ']); 
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
                        <?php 
echo $this->Form->input('product_compatability', ['options'=>$compatibility, 'label'=>false, 'empty'=>'Select Compatibility ','selected'=>'12', 'class'=>'input-field ']); 
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
                        <?php 
echo $this->Form->input('weight', ['options'=>$shipping_weight, 'label'=>false, 'empty'=>'Select Weight ','selected'=>'12', 'class'=>'input-field ']); 
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
                    <?php
                    $productImage =  $product->productimages;
                  
                    foreach($productImage as $pkey=>$pvalue){
                 echo $this->Html->image('product'.DS.$pvalue->image,["alt" => "No image","width"=>"90px","height"=>"90px" ]);
                }
                 
                    ?>
                    <div class="input-box add-printer-image" >
                        <input type="file" name="product_image[]" id="product_image" >
                        <img alt="your image" src="../../images/img-add-printer-image.gif" id="printer-image">  
                    </div>
               
               <?php
               
          //  echo "<pre>";
            //print_r($product);
            
               
               ?>
                </div>



                <div class="form-buttons">
                    <?= $this->Form->input('Submit',['div'=>false,'type'=>'submit','class'=>'btn']); ?>
            <a href="#" class="btn btn-cancel">Cancel</a>
                </div>
                
            </div>
</form>

            </div>

            </div>