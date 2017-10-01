<?php
// echo "<pre>";
// print_r(json_decode( json_encode($promocodes),true));
// echo 1213;
// foreach ($promocodes as  $value) {
//   pr($value);
// }
// die;

  $brand="";
  $type="";
  $color="";
  $cartridge_type="";
  $est_yield="";
 foreach($promocodes->setting as $value)
{

 if($value->type =="usage" )
    {
        $usage[$value->id] = $value->name;
    }
if($value->type =="brand" )
    {
        $brands[$value->id] = $value->name;
    }
if($value->type =="type" )
    {
    $types[$value->id] = $value->name;
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
                <h2><img src="<?php echo $this->Url->build('/'); ?>images/icon-promotion.png" alt=""> Promo Codes</h2>
                <div class="pull-right">
              
                <?php echo $this->Html->link('Add Promo Code',['action' => 'add'],['class'=>'btn']); ?>
                </div>
            </div><br>
            

<table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th width="6%" class="text-center">No.</th>
                    <th width="10%">Promo Code</th>
                    <th width="12%" class="text-center">Discount Type</th>
                    <th width="12%" class="text-center">Discount Amt.</th>
                    <th width="10%">Expiry</th>
                     <th width="10%" class="text-center">Qty</th>
                      <th width="10%" class="text-center">Amt (S$)</th>
                       <th width="10%" class="text-center">Usage Type </th>
                     <th width="12%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;
                    $sr_no=($this->request->params['paging']['Promocodes']['page']-1) * $this->request->params['paging']['Promocodes']['perPage'];
                    $sr_no = $sr_no+1;
                foreach ($promocodes as $promocode){ 

    foreach($promocodes->setting as $value)
{
  
  if($value->id == $promocode->discount_type)
    {
        $discount_type = $value->name;
    }
 
}

?>
        

<tr>
                    <td class="text-center"><?= $sr_no++; ?></td>
                    <td><?= h($promocode->promocode) ?></td>
                <td class="text-center"><?= h($discount_type) ?></td>
                <td class="text-center"><?= h($promocode->amount) ?></td>
                 <td><?= h($promocode->expiry_date) ?></td>
                 <td class="text-center"><?= h($promocode->quantity) ?></td>
                 <td class="text-center"><?= h($promocode->excced_amount) ?></td>
                 <td class="text-center"><?= h($promocode->usage_type) ?></td>
                 
                <td class="actions text-center">
                <?= $this->Html->link(__(''), ['action' => 'view', $promocode->id],['class'=>'view','lagend'=>false]) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $promocode->id],['class'=>'edit','label'=>false]) ?>

                 <?= $this->Html->link(__(''), ['action' => 'delete', $promocode->id],['class'=>'delete','label'=>false]) ?>

                
          
          </td>
                    
                </tr>
   
                
     <?php $counter++;} ?>
            </table>

            
<div class="table-footer clearfix paginator">
            	<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} Promo Codes'); ?> </p>
                
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
