<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
</script>
 <style type="text/css">
 .small-filter .width {
    margin-right: 10px;
    width: 100%;
}
.page-filter .select, .page-filter .text{width:18%;}
.page-filter .select.btn-search{width:14%;}
 </style>
 <div class="white-wrapper">
    <div class="page-head clearfix">
        <h2><img src="<?php echo $this->Url->build('/'); ?>images/icon-sales.png" width="25" height="30" alt=""> Sales</h2>
        <div class="pull-right">
      
        
        </div>
    </div><br>
<?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
<div class="page-filter">
<div class="small-filter">
<div class="filter-text">Total Orders:  <span><?php echo $sales->countorders; ?></span></div>
<div class="filter-text">Total Sales: <span>$<?= h(number_format($sales->total, 2)) ?></span></div>	
     <div class="filter-text">for</div>


			 
		<?= $this->Form->input('from',['required'=>true,'class'=>'width  datepicker ','label'=>false,'placeholder'=>'Please select date','id'=>'from']); ?> 

		<span style="margin-right:1%;">to</span>


		<?= $this->Form->input('to',['required'=>true,'class'=>'width  datepicker ','label'=>false,'placeholder'=>'Please select date','id'=>'to']); ?> 

		
		<div class="input select btn-search">
		<input type="submit" class="btn pull-right" value="Search">
		</div>

</div>
</div>
 </form>  
    <table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th width="10%" class="text-center">Order No.</th>
            <th width="13%">Order Date</th>
            <th width="11%">Customer </th>
            <th width="15%" class="text-center">Order Subtotal</th>
            <th width="17%" class="text-center">Shipping Cost</th>
            <th width="10%" class="text-center">Tax</th>
            <th width="13% class="text-center"">Order Total</th>
            <th width="15%" class="text-center">Action</th>
        </tr>
        
<?php  foreach ($sales as  $value) { 

	?>
	

<tr>
  <td class="text-center"><?= h($value->order_num) ?></td>
                <td><?= h(date('jS F Y',strtotime($value->order_date))) ?></td> 
                <td><?= h($value->order_username) ?></td>
                <td class="text-center">$<?= h(number_format($value->order_sub_total,2)) ?></td>
                 <td class="text-center">$<?= h(number_format($value->order_shipping_cost,2)) ?></td>
                 <td class="text-center">$<?= h(number_format($value->order_estimated_tax,2)) ?></td>
                 
                 <td class="text-center">$<?= h(number_format($value->order_total,2)) ?></td>
                <td class="actions text-center">
                <?= $this->Html->link(__(''), ['action' => 'view', $value->id],['class'=>'view','lagend'=>false]) ?>

                
          
            </td>
                    
                </tr>

           <?php  } ?>
                </table>

  <div class="table-footer clearfix paginator">
<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} products'); ?> </p>
                
                <ul class="table-pagination">
  <?php  echo $this->Paginator->prev('< ' . __('previous')); ?>
                        <?php
                        echo $this->Paginator->numbers();
                        ?>
           <?php  echo $this->Paginator->next(__('next') . ' >'); ?>
        </ul>
  </div>






            </div>
