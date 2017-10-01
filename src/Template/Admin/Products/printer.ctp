<?php 
foreach($data['setting'] as $value){
   // 'color','brand','type','cartridge_type','est_yield','inventor _availability','compatibility','shipping_weight'
if($value->type =="brand" )
    {
        $brands[$value->id] = $value->name;
}
    }
?>
<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img width="28" height="29" alt="" src="/DBR/images/icon-pencil.png"> Add Printer</h2>
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
                    <div class="label-field">Printer Name:</div>

                    <div class="input-box"> 
                    <?= $this->Form->input('printer_name',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>

                
                <div class="form-row">
                    <div class="label-field">Alias:</div>
                    <div class="input-box">
                    <?= $this->Form->input('alias',['required'=>true,'class'=>'input-field','label'=>false]); ?>

                    </div>
                   
                    </div>
                
                
                <div class="form-row"> 
                    <div class="label-field">Printer Image:</div>
                    <div class="input-box add-printer-image">
                  <input type="file" name="printer_image[]" id="product_image" >
                        <img alt="your image" src="../../images/img-add-printer-image.gif" id="printer-image">
                </div>
                </div>

                <div class="form-buttons">
                    <input type="submit" value="Save" class="btn"> <a class="btn btn-cancel" href="index">Cancel</a>
                </div>

                 </form> 
                
                
           
            </div>
            
        </div>