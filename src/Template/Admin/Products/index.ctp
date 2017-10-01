<style>
  .small{
    height: 38px!important;
    width: 126px!important;
  }

</style>
<?php
  $brand="";
  $type="";
  $color="";
  $cartridge_type="";
  $est_yield="";
 foreach($products->setting as $value)
{
//  if($value->type =="usage" )
//     {
//         $usage[$value->id] = $value->name;
//     }
// if($value->type =="brand" )
//     {
//          $brand .='<option value="'.$value->id.'">'.$value->name.'</option>';
//     }
// if($value->type =="type" )
//     {
//       $type .='<option value="'.$value->id.'">'.$value->name.'</option>';
//     }
// if($value->type =="color" )
//     {
//            $color .='<option value="'.$value->id.'">'.$value->name.'</option>';
//     }
// if($value->type =="cartridge_type" )
//     {
//         $cartridge_type .='<option value="'.$value->id.'">'.$value->name.'</option>';
//     }
// if($value->type =="est_yield" )
//     {
//        $est_yield .='<option value="'.$value->id.'">'.$value->name.'</option>';
//     }



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
                <h2><img src="<?php echo $this->Url->build('/'); ?>images/icon-print-heading.png" width="31" height="27" alt=""> Products</h2>
                <div class="pull-right">
              
                <?php echo $this->Html->link('Add Product',['action' => 'add'],['class'=>'btn']); ?>
                </div>
            </div><br>
            <div class="page-filter">
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
            <?php
                  echo $this->Form->input('type', ['options'=>$types, 'label'=>false, 'empty'=>'Type','selected'=>'12', 'class'=>'width']); 
                                
               echo $this->Form->input('brand', ['options'=>$brands, 'div'=>false, 'label'=>false, 'empty'=>'Brand','selected'=>'12', 'class'=>'width']); 
                                
               echo $this->Form->input('color', ['options'=>$color, 'label'=>false, 'empty'=>'color','selected'=>'12', 'class'=>'width']);


echo $this->Form->input('cartridge', ['options'=>$cartridge_type, 'label'=>false, 'empty'=>'Cartridge','selected'=>'12', 'class'=>'width']);

// echo $this->Form->input('estyield', ['options'=>$est_yield, 'label'=>false, 'empty'=>'Est. Yield','selected'=>'12', 'class'=>'width']);

echo $this->Form->input('product_est_yield',['class'=>'input-field width integer','label'=>false, 'placeholder' =>'Est. Yield (Pages)' ]); 


?>
                              
 <!-- <div class="input select">
       <input type="text" class="width small" name="product_est_yield" placeholder="no. of pages"> 
  </div>         -->       
                
  <div class="input select">
       <input type="text" class="width" name="product_name" placeholder="Product Name"> 
  </div>
  <div class="input select">
                <input type="submit" class="btn pull-right" value="Search">
  </div>
                </form>
            </div>

<table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th width="5%" class="text-center">No.</th>
                    <th width="8%">Type</th>
                    <th width="8%">Brand</th>
                    <th width="19%">Product Name</th>
                    <th width="12%">Part No</th>
                     <th width="9%">Color</th>
                      <th width="9%">Cartridge</th>
                       <th width="11%">Est. yield </th>
                        <th width="8%" class="text-center">Stock Qty </th>
                    <th width="12%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;
                foreach ($products as $product)
{ 

    foreach($products->setting as $value)
{
  if($value->id == $product->brand_id)
  {
      $brand_name =  $value->name;
  }
  if($value->id == $product->product_type)
  {
      $product_type =  $value->name;
  }
  if($value->id == $product->product_color)
  {
      $product_color =  $value->name;
  }
   if($value->id == $product->product_catridge_type)
  {
      $product_catridge_type =  $value->name;
  }
  if($value->id == $product->product_est_yield1)
    {
        $est_yield = $value->name;
    }
 
}

?>
        

<tr>
                    <td class="text-center"><?= $counter; ?></td>
                    <td><?= h($product->product_type) ?></td>
                <td><?= h($brand_name) ?></td>
                <td><?= h($product->product_name) ?></td>
                 <td><?= h($product->product_part_num) ?></td>
                 <td><?= h($product->product_color) ?></td>
                 <td><?= h($product->product_catridge_type) ?></td>
                 <td ><?= h($product->product_est_yield) ?> Pages</td>
                 <td class="text-center"><?= h($product->product_stock_qty) ?></td>
                <td class="actions">
                <?= $this->Html->link(__(''), ['action' => 'view', $product->id],['class'=>'view','lagend'=>false]) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $product->id],['class'=>'edit','label'=>false]) ?>

                 <?= $this->Html->link(__(''), ['action' => 'delete', $product->id],['class'=>'delete','label'=>false]) ?>

                
          
            </td>
                    
                </tr>
   
                
     <?php $counter++;} ?>
            </table>
            
            <!-- <div class="table-footer clearfix paginator">
                <p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} Product'); ?> </p>
                <div class="pagination">
                    <li class="current"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </div>
            </div> 
            
                <div class="paginator">

        <ul class="pagination">
            <?  echo $this->Paginator->prev('< ' . __('previous')) ?>
            <?  echo $this->Paginator->numbers() ?>
            <?  echo $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p></p>
    </div>-->
            
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











        </div>
