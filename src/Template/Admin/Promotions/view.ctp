<?php  //echo "<pre>"; print_r($promotion);  die;?>
<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="images/icon-pencil.png" width="28" height="29" alt=""> View Product</h2>
            </div>
            
               
     <div class="form">
            <div class="form-row user-view-row">
            	<div class="label-field">Promotion:</div>
                <div class="input-box">
                <?=  $promotion['promotion']; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">From:</div>
                <div class="input-box">
                <?=  $promotion['promo_from']; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">To:</div>
                <div class="input-box">
                <?=  $promotion['promo_to']; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Promotion Amount:</div>
                <div class="input-box">
                <?=  $promotion['promotion_amt_percentage']; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Description:</div>
                <div class="input-box">
                <?=  $promotion['promo_description']; ?>
                </div>
            </div>
             <div class="form-row">
   <div class="label-field">Banner Image:</div>
   <div class="input-box add-printer-image">
 
    <img alt="your image" src="/DBR/img/promotion/<?php echo $promotion['promo_banner']; ?>" id="printer-image">
   </div>
  </div>

<table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
   <tbody><tr>
    <th width="10%" class="text-center">No.</th>
    <th width="10%">Apply</th>
    <th width="10%">Brand</th>
    <th width="50%">Product Name</th>
    
   </tr>
  </tbody></table>
  
  <div class="used-printers jspScrollable" style="overflow: hidden; padding: 0px; width: 1030px;" tabindex="0">
   
   <div class="jspContainer" style="width: 1030px; height: 307px;"><div class="jspPane" style="padding: 0px; width: 1014px; top: 0px;"><table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
    <tbody>
     <?php 

     $count=1;

     foreach($promotion['product'] as $val){
      foreach($promotion['setting'] as $value)
      {
       if($value['id'] == $val['brand_id'])
       {
        $brand_name =  $value['name'];
       }
      }
      $check ="";
      foreach ($promotion['productpromotions'] as $v)
      {

       if($v['product_id'] ==$val['id'])
       {
        
        $check ='<input class="case"  checked="checked" name="product_id[]" value="'.h($val['id']).'" type="checkbox">';
       
      
      ?>
      <tr>
       <td width="10%" class="text-center"><?= h($count) ?></td>
       <td width="10%"><div class="custom-checkbox"> <?php echo $check; ?> <label></label></div></td>
       <td width="10%"><?= h($brand_name) ?></td>
       <td width="50%"><?= h($val['product_name']) ?></td>
       
      </tr>
      <?php }
       
      } $count++;
     }

     ?>

     </tbody>
     </table>
     </div>
     </div>
     </div>
     

             
            <div class="view-buttons">
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promotion->id],['class'=>'edit','label'=>false]) ?>
        <?= $this->Html->link(__('Delete'), ['action' => 'delete', $promotion->id],['class'=>'delete','lagend'=>false])   
            ?>


            </div>

            



            
            
            
            
                
               
            
    </div>
</div>
