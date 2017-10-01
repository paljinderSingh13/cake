<?php 
//echo "<pre>";
//  foreach ($promotions as $promotion)
// { 
    
//     foreach ($promotion->productpromotions as $product) {
//       # code...

//       print_r($product->product['product_name']);
//     }
// }

// die;
?>

<?php echo $this->Html->script(['custom']); ?>
<style type="text/css">
.page-filter .select{width:15%;}
.page-filter .text{width:17%;}
</style>

 <div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img src="<?php echo $this->Url->build('/'); ?>images/icon-promotion.png" width="36" height="29" alt=""> PROMOTIONS</h2>
                <div class="pull-right">
              
                <?php echo $this->Html->link('Add Promotion',['action' => 'add'],['class'=>'btn']); ?>
                </div>
            </div><br>

<div class="page-filter text-right">
 
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>

<?= $this->Form->input('from',['required'=>false, 'id'=>'from' ,    'class'=>'width  datepicker ','label'=>false,'placeholder'=>'Please select date']); ?> 

 <span style="margin-right:1%;">to</span>


<?= $this->Form->input('to',['required'=>false, 'id'=>'to' ,  'class'=>'width  datepicker ','label'=>false,'placeholder'=>'Please select date']); ?> 


                   



<div class="input select">
<input type="text" class="width" name="promotion" placeholder="Promotion"> 
</div>
<div class="input select">
<input type="submit" class="btn pull-right" value="Search">
</div>
</form>
</div>

<table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th width="6%" class="text-center">No.</th>
                    <th width="17%">Promotions</th>
                     <th width="20%">Product </th>
                    <th width="12%">From</th>
                     <th width="12%">To</th>
                      <th width="10%" class="text-center">Duration</th>
                       <th width="10%" class="text-center">Promo Amt. </th>
                       
                    <th width="12%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;
	      if(count($promotions)>0){
                foreach ($promotions as $promotion)
{ 

$datetime1 = new DateTime($promotion->promo_from);
$datetime2 = new DateTime($promotion->promo_to);
$interval = $datetime1->diff($datetime2);
//echo $interval;
$durnation =  $interval->format('%R%a days');
$finaldate = str_replace("+"," ",$durnation);
$proName ="";
foreach ($promotion->productpromotions as $product) {
      # code...

      $proName .= $product->product['product_name'].', ';
    }

  ?>


        

<tr>
                    <td class="text-center"><?= $counter; ?></td>
                    <td><?= h($promotion->promotion) ?></td>
                <td><?= h($proName) ?></td>
                <td><?= h(date('jS F Y', strtotime($promotion->promo_from))) ?></td>
                 <td><?= h(date('jS F Y', strtotime($promotion->promo_to))) ?></td>
                 <td class="text-center"><?= h($finaldate) ?></td>
                 <td class="text-center"><?= h($promotion->promotion_amt_percentage) ?>%</td>
                 
                
                <td class="actions" class="text-center">
                <?= $this->Html->link(__(''), ['action' => 'view', $promotion->id],['class'=>'view','lagend'=>false]) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $promotion->id],['class'=>'edit','label'=>false]) ?>

                 <?= $this->Html->link(__(''), ['action' => 'delete', $promotion->id],['class'=>'delete','label'=>false]) ?>

                
          
            </td>
                    
                </tr>
 
                
     <?php $counter++;}}else{ ?>
     <td class="text-center" colspan="8"> No Promotion Record</td>
     <?php } ?>
            </table>
        
<div class="table-footer clearfix paginator">
<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} Promotions'); ?> </p>
                
                <ul class="table-pagination">
	<?php  echo $this->Paginator->prev('< ' . __('previous')); ?>
                        <?php
                        echo $this->Paginator->numbers();
                        ?>
                        <?php  echo $this->Paginator->next(__('next') . ' >'); ?>
        </ul>
  </div>
            


            
        </div>











        </div>
