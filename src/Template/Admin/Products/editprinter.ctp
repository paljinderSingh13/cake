<script>
$("document").ready(function(){
 $("#data").html(tr);
     $('.used-printers').jScrollPane({
		showArrows:true,
		verticalDragMinHeight: 50,
		verticalDragMaxHeight: 50
  });
});    
</script>
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
                <h2><img width="28" height="29" alt="" src="/DBR/images/icon-pencil.png"> Edit Printer</h2>
            </div>
            
    <div class="form">
        <?=  $this->Form->create($data,['type'=>'file','id'=>'user-registration']); ?>
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
                        <img alt="your image" src="../../../images/img-add-printer-image.gif" id="printer-image">
                <?php
 $img =  $data->printerimages;
   foreach ($img as $value) {
      echo $this->Html->image('printer'.DS.$value['image'],["alt" => "No image","width"=>"90px","height"=>"90px" ]);
   }?>
   
                    
                    </div>
                </div>
                
                <div class="form-buttons">
                    <input type="submit" value="Save" class="btn">
																				
																				<a class="btn btn-cancel" href="http://sgappstore.com/DBR/admin/products/index">Cancel</a>
                </div>

           
            <?php echo $this->Form->end(); ?>
												</div>
  

            </div>
            
        </div>


