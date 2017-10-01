<?php 
// echo "<pre>";
// $arry = json_decode(json_encode($subadmin), true);
// pr($arry);
// die;
// print_r($arry);
//pr($subadmin['permission']);
  

  //pr($subadmin['permission']['id']);

//json_encode($subadmin);
//$json =  json_decode(json_encode($subadmin));

//pr($json); 
// echo typeOf($subadmin);
// echo $subadmin['id'];
// echo '<br>';
 //$subadmin['permission']->id; die;
//die;
//  foreach ($subadmin->permisson as  $value) {
//      # code...
//     pr($value);
//  }
//  //pr($subadmin['id']);
//  pr($subadmin);
//  die;[id] => 7
           

?>
        <div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img src="<?php echo $this->Url->build('/');?>images/icon-pencil.png" width="28" height="29" alt=""> Edit Sub-Admin</h2>
            </div>
            <div class="form">
 <?=  $this->Form->create($subadmin,['type'=>'file','id'=>'user-registration']); ?>
                <div class="form-row">
                    <div class="label-field">Name:</div>
                    <div class="input-box">
                    <?= $this->Form->input('firstname',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="label-field">User Name:</div>
                    <div class="input-box">
                    <?= $this->Form->input('username',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="label-field">Password:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('password',['required'=>true,'type'=>'password','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                
                <div class="form-row">
                    <div class="label-field">Email Address:</div>
                    <div class="input-box">
                        <?= $this->Form->input('emailid',['type'=>'email','required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="label-field">Contact No:</div>
                    <div class="input-box">
                        <?= $this->Form->input('phone',['type'=>'text','required'=>true,'class'=>'integer input-field','label'=>false]); ?>
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
              if($subadmin['permission']['permission_products']=='1') 
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

       <?php  if($subadmin['permission']['permission_users']=='1') 
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

      <?php  if($subadmin['permission']['permission_promo_codes']=='1') 
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

      <?php  if($subadmin['permission']['permission_static_pages']=='1') 
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

    <?php  if($subadmin['permission']['permission_orders']=='1') 
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

    <?php  if($subadmin['permission']['permisson_notification']=='1') 
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

    <?php  if($subadmin['permission']['permisson_sale']=='1') 
                 {?><input checked="checked"  name="permisson_sale" value="1" type="checkbox" >
        <?php }else{ ?>
        <input   name="permisson_sale" value="1" type="checkbox" >
        <?php } ?>  



        <label></label></div></td>
    </tr>

 </tbody></table>
  </div>

 <div class="form-buttons">
                    <?= $this->Form->input('Submit',['type'=>'submit','class'=>'btn']); ?>
            <a href="<?= $this->Url->build('/admin/users/subAdmin', true);?>" class="btn btn-cancel">Cancel</a>
                </div>
                
            </div>
             
    <?= $this->Form->end() ?>
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























    <!-- <tr>  
        <td width="10%" class="text-center">1 </td>
        <td width="30%">Add/Edit/Delete Users</td>
        <td width="55%">
        <div class="custom-checkbox">

       <?php  if($subadmin['permission']['permission_users']=='1') 
                {?>
        <input checked="checked" name="permission_users" value="1" type="checkbox" ></td>
        <?php }else{ ?>
                    <input  name="permission_users" value="1" type="checkbox" >

             <?php } ?>


        <label></label></div></td>
    </tr>




  <div class="used-printers jspScrollable" style="overflow: hidden; padding: 0px; width: 1030px;" tabindex="0">

   <div class="jspContainer" style="width: 1030px; height: 440px;"><div class="jspPane" style="padding: 0px; width: 1014px; top: 0px;"><table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
    <tbody id="data">
    <tr>  
        <td>1 </td>
        <td>Add/Edit/Delete Product</td>

            

        <td><?php
              if($subadmin['permission']['permission_products']=='1') 
                {?>

        <input checked="checked"  name="permission_products" value="1" type="checkbox" ></td>
        <?php }else{ ?> 
                    <input name="permission_products" value="1" type="checkbox" >
        <?php } ?> 
</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Add/Edit/Delete Users</td>
        <td>
       <?php  if($subadmin['permission']['permission_users']=='1') 
                {?>
        <input checked="checked" name="permission_users" value="1" type="checkbox" ></td>
        <?php }else{ ?>
                    <input  name="permission_users" value="1" type="checkbox" >

             <?php } ?> </td>
    </tr>
    <tr>
        <td>3</td>
        <td>Add/Edit/Delete Promo Codes</td>
        <td>
                 <?php  if($subadmin['permission']['permission_promo_codes']=='1') 
                {?>
        <input checked="checked" name="permission_promo_codes" value="1" type="checkbox" >
     <?php }else{ ?>
         <input name="permission_promo_codes" value="1" type="checkbox" ></td>
<?php } ?> </td> 
    </tr>
    <tr>
        <td>4</td>

        <td>Add/Edit/Delete Static Pages</td>
        <td>
<?php  if($subadmin['permission']['permission_static_pages']=='1') 
                {?>
        <input  checked="checked" name="permission_static_pages" value="1" type="checkbox" ></td>
         <?php }else{ ?> <input name="permission_static_pages" value="1" type="checkbox" >
         <?php } ?> 
         </td>
    </tr>
    <tr>
        <td>5</td>
        <td>Add/Edit/Delete Orders </td>
        <td>
        <?php  if($subadmin['permission']['permission_orders']=='1') 
                {?>
                    <input checked="checked" name="permission_orders" value="1" type="checkbox" ></td>
                    <?php }else{ ?>
                 <input name="permission_orders" value="1" type="checkbox" >
               <?php } ?>   
                 </td>
                  
    </tr>
    <tr>
        <td>6</td>
        <td>Add/Edit/Delete Notification</td>
        <td>
         <?php  if($subadmin['permission']['permisson_notification']=='1') 
                {?>
        <input  checked="checked" name="permisson_notification" value="1" type="checkbox" >
<?php }else{ ?>
            <input name="permisson_notification" value="1" type="checkbox" >
 <?php } ?>  
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td>Add/Edit/Delete  Sale</td> 
        <td>
        <?php  if($subadmin['permission']['permisson_sale']=='1') 
                 {?><input checked="checked"  name="permisson_sale" value="1" type="checkbox" >
        <?php }else{ ?>
        <input   name="permisson_sale" value="1" type="checkbox" >
        <?php } ?>  

                    </td>
    </tr>
  
 </tbody></center></table></div><div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><a class="jspArrow jspArrowUp jspDisabled"></a><div class="jspTrack" style="height: 287px;"><div class="jspDrag" style="height: 50px; top: 0px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><a class="jspArrow jspArrowDown"></a><div class="jspCap jspCapBottom"></div></div></div></div>
                
                
                
            
                
                <div class="form-buttons">
                    <?= $this->Form->input('Submit',['type'=>'submit','class'=>'btn']); ?>
            <a href="#" class="btn btn-cancel">Cancel</a>
                </div>
                
            </div>
             
    <?= $this->Form->end() ?>
    </div> -->
