<?php
// echo "<pre>"; 
// pr($userdata);
// die;
// [id] => 42
//             [firstname] => f
//             [lastname] => 
//             [username] => user123
//             [emailid] => user123@gmail.com
//             [password] => $2y$10$FXjrEnwpsgJnxL9C0vhJsOjBWpfcsJA7abtnfJdY7Efn9eijYdxTC
//             [phone] => 2147483647
//             [image] => 
//             [role] => 2
//             [address_line1] => 
//             [address_line2] => 
//             [city] => 
//             [country] => 
//             [postal_code] => 
//             [signupdate] => 
//             [status] => 1


?>


<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img src="/DBR/images/icon-view.png" alt=""> View Sub-Admin</h2>
            </div>
           
     <div class="form">
            <div class="form-row user-view-row">
                <div class="label-field">Name:</div>
                <div class="input-box">
                <?=  $userdata->firstname; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field"> User Name:</div>
                <div class="input-box">
                <?=  $userdata->username; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Password:</div>
                <div class="input-box">
                <?=  md5($userdata->password); ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field"> Email Address:</div>
                <div class="input-box">
                <?=  $userdata->emailid; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field"> Contact No:</div>
                <div class="input-box">
                <?=  $userdata->phone; ?>
                </div>
            </div>


  <div class="used-printers-heading">Configure Access:</div>
  
  <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
   <tbody>
   <tr>
    <th width="10%" class="text-center">No.</th>
    <th width="30%">Access Type</th>
    <th width="55%">Allow</th>
   </tr>
  </tbody></table>


 <div class="used-printers">
    <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
    <tbody id="data">
    <tr>  
        <td width="10%" class="text-center">1 </td>
        <td width="30%">Add/Edit/Delete Product</td>
        <td width="55%">
        <div class="custom-checkbox">

       <?php
              if($userdata['permission']['permission_products']=='1') 
                {?>

        <input checked="checked"  name="permission_products" value="1" type="checkbox" >
        <?php }else{ ?> 
                    <input name="permission_products" value="1" type="checkbox" >
        <?php } ?> 


        <label></label></div></td>
    </tr>


<tr>  
        <td width="10%" class="text-center">2 </td>
        <td width="30%">Add/Edit/Delete Users</td>
        <td width="55%">
        <div class="custom-checkbox">

       <?php  if($userdata['permission']['permission_users']=='1') 
                {?>
        <input checked="checked" name="permission_users" value="1" type="checkbox" >
        <?php }else{ ?>
                    <input  name="permission_users" value="1" type="checkbox" >

             <?php } ?>


        <label></label></div></td>
    </tr>

<tr>  
        <td width="10%" class="text-center">3 </td>
        <td width="30%">Add/Edit/Delete Promo Codes</td>
        <td width="55%">
        <div class="custom-checkbox">

      <?php  if($userdata['permission']['permission_promo_codes']=='1') 
                {?>
        <input checked="checked" name="permission_promo_codes" value="1" type="checkbox" >
     <?php }else{ ?>
         <input name="permission_promo_codes" value="1" type="checkbox" >
<?php } ?>


        <label></label></div></td>
    </tr>

<tr>  
        <td width="10%" class="text-center">4 </td>
        <td width="30%">Add/Edit/Delete Static Pages</td>
        <td width="55%">
        <div class="custom-checkbox">

      <?php  if($userdata['permission']['permission_static_pages']=='1') 
                {?>
        <input  checked="checked" name="permission_static_pages" value="1" type="checkbox" >
         <?php }else{ ?> <input name="permission_static_pages" value="1" type="checkbox" >
         <?php } ?> 


        <label></label></div></td>
    </tr>

<tr>  
        <td width="10%" class="text-center">5 </td>
        <td width="30%">Add/Edit/Delete  Orders</td>
        <td width="55%">
        <div class="custom-checkbox">

    <?php  if($userdata['permission']['permission_orders']=='1') 
                {?>
                    <input checked="checked" name="permission_orders" value="1" type="checkbox" >
                    <?php }else{ ?>
                 <input name="permission_orders" value="1" type="checkbox" >
               <?php } ?>   


        <label></label></div></td>
    </tr>


 <tr>  
        <td width="10%" class="text-center">6 </td>
        <td width="30%">Add/Edit/Delete  Notification</td>
        <td width="55%">
        <div class="custom-checkbox">

    <?php  if($userdata['permission']['permisson_notification']=='1') 
                {?>
        <input  checked="checked" name="permisson_notification" value="1" type="checkbox" >
<?php }else{ ?>
            <input name="permisson_notification" value="1" type="checkbox" >
 <?php } ?>  


        <label></label></div></td>
    </tr>


<tr>  
        <td width="10%" class="text-center">7 </td>
        <td width="30%">Add/Edit/Delete  Sale</td>
        <td width="55%">
        <div class="custom-checkbox">

    <?php  if($userdata['permission']['permisson_sale']=='1') 
                 {?><input checked="checked"  name="permisson_sale" value="1" type="checkbox" >
        <?php }else{ ?>
        <input   name="permisson_sale" value="1" type="checkbox" >
        <?php } ?>  



        <label></label></div></td>
    </tr>

 </tbody></table>
  </div>

 
                
            </div>
             
   <div class="view-buttons">
        <?= $this->Html->link(__('Edit'), ['controller'=>'Users', 'action' => 'editsubadmin', $userdata->id],['class'=>'edit','label'=>false]) ?>
        <?= $this->Html->link(__('Delete'), ['controller'=>'Users', 'action' => 'deletesubadmin', $userdata->id],['class'=>'delete','lagend'=>false]) ?>  
            </div>
   
    </div>
    <script type="text/javascript">
    
$(function()
{
    $('.used-printers').jScrollPane({
        showArrows:true,
        verticalDragMinHeight: 50,
        verticalDragMaxHeight: 50
        });
});
</script>