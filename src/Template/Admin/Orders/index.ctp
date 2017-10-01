<?php if(!empty($sparam))
 {?>

<script type="text/javascript">
  $(function(){
      param = $("#sparam").val();

$("#order-status").val(param);
  });

</script>
<?php
  echo '<input id="sparam" type="hidden" value="'.$sparam.'" >';
 } 


echo $this->Html->script(['custom']); 
$brand="";
  $type="";
  $color="";
  $cartridge_type="";
  $est_yield="";
 //$setting =json_decode( json_encode($orders->setting), true);
 $orders =  json_decode( json_encode($orders), true);

$order_status= array('pending'=>'Pending','approved'=>'Approved','processing'=>'Processing', 'intransit'=>'In-Transit', 'delivered'=>'Delivered','completed'=>'Completed','canceled'=>'Canceled');

foreach($productlist  as $plvalue){
$pl[$plvalue['id']] = $plvalue['product_name'];
}
foreach($userlist  as $ulvalue){
$ul[$ulvalue['id']] = $ulvalue['username'];
}
?>
<style type="text/css">
.page-filter .text:nth-child(4){width:12%;}
placeholder{color:#BCBCBC !important;}
</style>
 <div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img src="<?php echo $this->Url->build('/'); ?>images/icon-sales.png" width="31" height="27" alt=""> Orders</h2>
                <div class="pull-right">
              
                <?php echo $this->Html->link('Add Order',['controller'=>'orders','action' => 'add'],['class'=>'btn']); ?>
                </div>
            </div><br>
            <div class="page-filter">
        <?=  $this->Form->create('',['type'=>'file','id'=>'order-registration']); ?>
            <?php
              echo $this->Form->input('order_date_from', ['type'=>'text','id'=>'from','label'=>false, 'empty'=>'', 'placeholder'=>'DD/MM/YYYY','class'=>'width  datepicker']);
              echo "to ";                  
               echo $this->Form->input('order_date_to', ['type'=>'text','id'=>'to', 'div'=>false, 'label'=>false, 'placeholder'=>'DD/MM/YYYY', 'class'=>'width  datepicker']); 
                                
               echo $this->Form->input('order_num', ['type'=>'text','label'=>false, 'placeholder'=>'Order No.', 'class'=>'width']);  


echo $this->Form->input('order_user_id', ['options'=>$ul, 'label'=>false, 'empty'=>'Customer','selected'=>'12', 'class'=>'width']);

echo $this->Form->input('order_product_name', ['options'=>$pl, 'label'=>false, 'empty'=>'Product Name','selected'=>'12', 'class'=>'width']);

echo $this->Form->input('order_status', ['options'=>$order_status, 'label'=>false, 'empty'=>'Status' ,'class'=>'width']);
?>
                              
                
                

  <div class="input select">
                <input type="submit" class="btn pull-right" value="Search">
  </div>
                </form>
            </div>

<table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th width="8%" class="text-center">Order No.</th>
                    <th width="10%">Order Date</th>
                    <th width="10%">Customer</th>
                    <th width="18%">Product Name</th>
                    <th width="5%">Qty</th>
                    <th width="9%">Price (S$)</th>
                    <th width="12%" class="text-center">Status</th>
                    <th width="12%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;
 foreach ($orders as $order)
{
?>
        

<tr>
                
    <td><?= "#".$order['order_num'] ?></td>
    <td><?= date('d M Y',strtotime($order['order_date'])); ?></td>
     <td><?php
      if(isset($order['order_username']) && $order['order_username']!=''){
      echo $order['order_username'];
      }else{
  echo @$order['order_recipient'];
     }
      ?>
      </td>
       <td>
          <ul>
              <?php foreach($order['productcarts'] as $vv) { ?>
                      <li>  <?= h($vv['pname']) ?> </li>
              <?php }  ?>
          </ul>

      </td>
      <td>
      <ul>  <?php foreach($order['productcarts'] as $vv) { ?>
                      <li>  <?= h($vv['quantity']) ?> </li>
              <?php }  ?>
          </ul>
        </td>
      <td class="text-right">
           <ul>
              <?php $b =0;
              $b = h(number_format($order['order_total'],2));
             
             foreach($order['productcarts'] as $vv) {   ?>
                     <li>  $<?php  echo h(number_format($vv['total_price'],2)); ?> </li>  
              <?php }  ?>
               <li> 
              <?php  $counter = count($order['productcarts']);
                    if($counter>1){ ?> 
              <strong>Total: $<?php echo $b; ?></strong>
              <?php } ?>
              </li>
          </ul>

      </td>
      <td class="text-center"><?php echo $order['order_status']; ?></td>
      <td class="actions">
          <?= $this->Html->link(__(''), ['action' => 'view', $order['id']],['class'=>'view','lagend'=>false]) ?>
          <?= $this->Html->link(__(''), ['action' => 'edit', $order['id']],['class'=>'edit','label'=>false]) ?>

           <?= $this->Html->link(__(''), ['action' => 'delete', $order['id']],['class'=>'delete','label'=>false]) ?>

         </td>
                    
                </tr>
   
                
     <?php $counter++;} ?>
            </table>
            
  <div class="table-footer clearfix paginator">
<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} orders'); ?> </p>
                
                <ul class="table-pagination">
	<?php  echo $this->Paginator->prev('< ' . __('previous')); ?>
                        <?php
                        echo $this->Paginator->numbers();
                        ?>
           <?php  echo $this->Paginator->next(__('next') . ' >'); ?>
        </ul>
  </div>
            
            
        </div>
        
