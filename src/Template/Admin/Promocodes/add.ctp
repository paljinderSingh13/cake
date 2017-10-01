<?php foreach($promocode['setting'] as $value){
   // 'color','brand','type','cartridge_type','est_yield','inventor _availability','compatibility','shipping_weight'

    if($value->type =="usage" )
    {
        $usage[$value->id] = $value->name;
    }
    if($value->type =="discount_type" )
    {
        $discount_type[$value->id] = $value->name;
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
        if($value->type =="usage_promo" )
    {
        $usage_promo[$value->name] = $value->name;
    }
    
}
?>
<script>
$(document).ready(function(){
// $("#selectoption").change(function () {
//     var str = "";
//     $("#selectoption option:selected" ).each(function() {
//       str = $( this ).val();
//     if(str == 17){
//         $("#percentage").show();
//         $("#amount").hide();
//         $("#amt").attr("required",false);
//         $("#dis").attr("required",true);
//     }else if(str == 18){
//         $("#percentage").hide();
//         $("#amount").show();   
//         $("#dis").attr("required",false);
//         $("#amt").attr("required",true);
//        }
//     });
//   })
// }); 
</script>  

<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img alt="" src="/DBR/images/icon-add.png"> Add Promo Code</h2>
            </div>
            
    <div class="form">
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
               
                <div class="form-row">
                    <div class="label-field">Promo Code:</div>

                    <div class="input-box"> 
                    <?= $this->Form->input('promocode',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="label-field">Discount Type:</div>
                        <div class="input-box">
                        <?= $this->Form->input('amount',['placeholder'=>'Amount','required'=>false,'class'=>'integer input-field small','label'=>false,'id'=>'amt']); ?>

                            <?php echo $this->Form->input('discount_type', ['options'=>$discount_type, 'label'=>false, 'empty'=>'Select Discount Type', 'class'=>'input-field  est-yield-select integer','id'=>'selectoption']); 
                                ?>
                        </div>
                     </div>
                
                

                
                <!-- <div class="form-row" id="percentage" style="display:none;">
                    <div class="label-field">Discount %:</div>
                    <div class="input-box">
                    <?php  echo $this->Form->input('discount',['required'=>false,'class'=>'integer input-field', 'label'=>false,'id'=>'dis','maxlength'=>'2']); ?>

                    </div>
                   
                    </div> -->
                
                
                <div class="form-row"> 
                    <div class="label-field">Quantity :</div>
                    <div class="input-box">
                  <?= $this->Form->input('quantity',['required'=>true,'class'=>'integer input-field','label'=>false]); ?>
                </div>
                </div>

                <!-- <div class="form-row" id="amount" style="display:none;"> 
                    <div class="label-field">Amount (S$):</div>
                    <div class="input-box">
                  <?= $this->Form->input('amount',['required'=>false,'class'=>'integer input-field','label'=>false,'id'=>'amt']); ?>
                </div>
                </div> -->

                
                <div class="form-row">
                    <div class="label-field">Expiry Date:</div>
                    <div class="input-box">
                     <?= $this->Form->input('expiry_date',['required'=>true,'class'=>'input-field datepicker','label'=>false]); ?>
                    </div>
                </div>

                 <div class="form-row">
                    <div class="label-field">Usage Type:</div>
                    <div class="input-box">
                        <?php echo $this->Form->input('usage_type', ['options'=>$usage_promo, 'label'=>false, 'empty'=>'Select Usage ', 'class'=>'input-field ']); 
                                ?>
                    </div>
                </div> 
                    <div class="form-row">
                    <div class="label-field">Exceed Amount:</div>
                    <div class="input-box">
                    <?= $this->Form->input('excced_amount',['required'=>true,'class'=>'input-field ','label'=>false]); ?>
                        
                    </div>
                </div>

                
                 <div class="form-row">
                    <div class="label-field v-top">Description:</div>
                    <div class="input-box">
                     <?= $this->Form->input('description',['class'=>'input-field','label'=>false,'type'=>'textarea','rows'=>5,'cols'=>34]); ?>
                     
                    
                    </div>
                </div>   
                
               
                
                <div class="form-buttons">
                    <input type="submit" value="Save" class="btn"> <a class="btn btn-cancel" href="index">Cancel</a>
                </div>
            </form> 
            </div>
            
        </div>