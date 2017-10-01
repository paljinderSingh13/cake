          
<script type="text/javascript">

          //______________validation on Printer checkbox______//
$(function(){
   
    $("#username").val('');
    $("#password").val('');

    $(".submit").click(function(e)
    {

        checked = $("input[type=checkbox]:checked").length;

        if(!checked) {
        alert("You must check at least one permisson checkbox.");
        return false;
        }
    });
});
</script>

        <div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img src="<?php echo $this->Url->build('/');?>images/icon-add.png" alt=""> Add Sub Admin</h2>
            </div>
            <div class="form">
 <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
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
                        <?= $this->Form->input('phone',['type'=>'text','required'=>true,'class'=>'input-field integer','label'=>false]); ?>
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
        <td width="55%"><div class="custom-checkbox"><input name="permission_products" value="1" type="checkbox" ><label></label></div></td>
    </tr>
    <tr>
        <td width="10%" class="text-center">2</td>
        <td width="30%">Add/Edit/Delete Users</td>
        <td width="55%"><div class="custom-checkbox"><input name="permission_users" value="1" type="checkbox" ><label></label></div></td>
    </tr>
    <tr>
        <td width="10%" class="text-center">3</td>
        <td width="30%">Add/Edit/Delete Promo Codes</td>
        <td width="55%"><div class="custom-checkbox"><input name="permission_promo_codes" value="1" type="checkbox" ><label></label></div></td>
    </tr>
    <tr>
        <td width="10%" class="text-center">4</td>
        <td width="30%">Add/Edit/Delete Static Pages</td>
        <td width="55%"><div class="custom-checkbox"><input name="permission_static_pages" value="1" type="checkbox" ><label></label></div></td>
    </tr>
    <tr>
        <td width="10%" class="text-center">5</td>
        <td width="30%">Add/Edit/Delete Orders </td>
        <td width="55%"><div class="custom-checkbox"><input name="permission_orders" value="1" type="checkbox" ><label></label></div></td>
    </tr>
    <tr>
        <td width="10%" class="text-center">6</td>
        <td width="30%">Add/Edit/Delete Notification</td>
        <td width="55%"><div class="custom-checkbox"><input name="permisson_notification" value="1" type="checkbox" ><label></label></div></td>
    </tr>
    <tr>
        <td width="10%" class="text-center">7</td>
        <td width="30%">Add/Edit/Delete  Sale</td>
        <td width="55%"><div class="custom-checkbox"><input name="permisson_sale" value="1" type="checkbox" ><label></label></div></td>
    </tr>
  


    
    

     
    </tbody></table>
  </div>
                
                
                
            
                
                <div class="form-buttons">
                <?= $this->Form->input('Submit',['type'=>'submit','class'=>'btn submit']); ?>
            <a href="subAdmin" class="btn btn-cancel">Cancel</a>
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