<?php

//$pro_image =  $this->Html->image('product'.DS.$products['productimages'][0]->image,["alt" => "No image","width"=>"90px","height"=>"90px" ]);
$settingSetup = json_decode(json_encode($setting));
foreach($settingSetup as $ssvalue){
    if($ssvalue->id == $orders->order_shipping_method){
        $shipping = $ssvalue->name;
    }
     if($ssvalue->id == $orders->order_delivery_method){
        $delivery = $ssvalue->name;
    }
}

?>

<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="/DBR/images/icon-view.png" alt=""> View Sales</h2>
            </div>
            
     <div class="form">
     <div class="product-view">
	<div class="form-row user-view-row">
            	<div class="label-field">Order No.:</div>
                <div class="input-box">
                <?=  $orders->order_num; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
            	<div class="label-field">Order Date:</div>
                <div class="input-box">
                <?=  date('d M Y',strtotime($orders->order_date)); ?>
                </div>
            </div>

	<div class="form-row user-view-row">
                <div class="label-field">Customer Name:</div>
                <div class="input-box">
                <?=  $orders->order_username; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Status:</div>
                <div class="input-box">
                <?=  $orders->order_status; ?>
                </div>
            </div>
           <hr /> 
       	 
         <div class="product-list">
         <?php
                
                foreach($orders->productcarts as $jkey=>$jvalue){ ?>
         	<table width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td width="14%">Product Name:</td>
                    <td width="30%"><?php echo $jvalue->product->product_name;  ?></td>
                    <td width="5%">Qty:</td>
                    <td width="8%"><?php  echo $jvalue->quantity;  ?></td>
                    <td width="9%">Price (S$):</td>
                    <td width="5%">S$<?php  echo number_format($jvalue->quantity * $jvalue->unit_price, 2);  ?></td>
                </tr>
            </table>
            <?php } ?>
            </div>
                 
             <hr />
            
	 <div class="form-row user-view-row" style="padding-top:3%;">
                <div class="label-field">Shipping Weight:</div>
                <div class="input-box">
                <?=   $orders->order_shipping_weight." ".$shipping;  ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Delivery Method:</div>
                <div class="input-box">
                <?= $delivery; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Address Line1:<br>
(or company name):</div>
                <div class="input-box">
                <?=  $orders->order_address_line1; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Address Line2:<br>
(optional)</div>
                <div class="input-box">
                <?=  $orders->order_address_line2; ?>
                </div>
              </div>          
                                                                                                            
             <div class="form-row user-view-row">
                 <div class="label-field">Town/City:</div>
                 <div class="input-box">
                <?=  $orders->order_city."  Pages"; ?>
                </div>
            </div>
             <div class="form-row user-view-row">
                <div class="label-field">Postal Code:</div>
                <div class="input-box">
                <?=  $orders->order_postal_code; ?>
                </div>
            </div>
    
    <hr />
            <div class="form-row user-view-row" style="margin-top:4%;">
                <div class="label-field">Order SubTotal:</div>
                <div class="input-box">
                S$<?php  echo number_format($orders->order_sub_total, 2); ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Shipping Cost:</div>
                <div class="input-box">
                S$<?=  number_format($orders->order_shipping_cost, 2); ?>
                </div>
            </div>
 
	<div class="form-row user-view-row">
                <div class="label-field">Estimated Tax:</div>
                <div class="input-box">
                S$<?=  number_format($orders->order_estimated_tax, 2); ?>
                </div>
            </div>
	<div class="form-row user-view-row">
                <div class="label-field">Order Total: </div>
                <div class="input-box">
                S$<?=  number_format($orders->order_total, 2); ?>
                </div>
            </div>
	
            </div>
         
</div>            
    </div>
</div>
