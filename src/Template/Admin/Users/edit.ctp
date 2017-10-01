 

 <script type="text/javascript">
       $(function() {

        var dateToday = new Date(); 
             $("#datepicker").datepicker({minDate: 0});
        });


   </script>  
        <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="<?php echo $this->Url->build('/');?>images/icon-pencil.png" width="28" height="29" alt=""> Edit User</h2>
            </div>
            <div class='form'>
              
 <?=  $this->Form->create($user,['type'=>'file','id'=>'user-registration']); ?>
 
                <div class="form-row">
                	<div class="label-field">User Name:</div>
                    <div class="input-box">
                    <?= $this->Form->input('username',['required'=>false,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Email Address:</div>
                    <div class="input-box">
                        <?= $this->Form->input('emailid',['type'=>'email','required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
                            
            <div class="form-row">
                	<div class="label-field">Sign Up Date:</div>
                    <div class="input-box">
                        <?= $this->Form->input('signupdate',['type'=>'text', 'id'=>'datepicker' ,'required'=>true,'class'=>'input-field datepicker','label'=>false,'value'=> date('d M Y',strtotime($user->signupdate))]); ?>
                    </div> 
                </div>
                    <hr class="seprator">
                <div class="form-row">
                	<div class="label-field">First Name:</div>
                    <div class="input-box">
                    <?= $this->Form->input('firstname',['type'=>'text','required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="label-field">Last Name:</div>
                    <div class="input-box">
                    <?= $this->Form->input('lastname',['type'=>'text','required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <!-- <div class="form-row">
                   <div class="label-field"> Image:</div>
                   <div class="input-box add-printer-image">
            <input type="file" name="image" id="product_image" onchange="readURL(this);">
                    <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
                   </div>
                  </div> -->
                

                 <div class="form-row">
                	<div class="label-field">Address line1:<br>(or company name): </div>
                    <div class="input-box">
                         <?=   $this->Form->input('address_line1',['required'=>true,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                           
                           
                <div class="form-row">
                	<div class="label-field">Address line2:<br>(optional)</div>
                    <div class="input-box">
                         <?=   $this->Form->input('address_line2',['required'=>false,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                
                <div class="form-row">
                	<div class="label-field">Town/City:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('city',['required'=>true,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                                
                <!-- <div class="form-row">
                	<div class="label-field">Country:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('country',['required'=>true,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div> -->
                                                
                <div class="form-row">
                	<div class="label-field">Postal Code:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('postal_code',['required'=>true,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                
             <div class="form-row">
                	<div class="label-field">Phone No.:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('phone',['required'=>true,'type'=>'text','class'=>'input-field integer','label'=>false]); ?>
                    </div> 
                </div>
                <div class="used-printers-heading">Past Purchasers:</div>
                
                <table cellpadding="0" cellspacing="0" width="100%" class="table-grid">
                	<tr>
                	<th width="8%" class="text-center">Order No.</th>
                    <th width="10%">Order Date</th>
                    <th width="12%">Product Name</th>
                    <th width="12%">Qty</th>
                    <th width="10%">Price</th>
                    <th width="10%">Status</th>
                    <th width="12%" class="text-center">Action</th>
                </tr>
                </table>
                
                <div class="used-printers">
               	 <table cellpadding="0" cellspacing="0" width="100%" class="table-grid">
             <?php
             if(count($user->orders)>0){
             foreach($user->orders as $ukey=>$usvalue) { ?>
            <tr>
                <td class="text-center"><?php echo $usvalue->order_num; ?></td>
                <td class="text-center"><?php echo date('d M Y',strtotime($usvalue->order_date)); ?> </td>
                
                <?php
                if($usvalue->productcarts>0){
                foreach($usvalue->productcarts as $pckey=>$pcvalue){
                    ?>
              <tr>  
                <td><?php echo $pcvalue->product->product_name; ?></td> 
                <td><?php echo $pcvalue->quantity; ?> </td>
                <td><?php echo $pcvalue->unit_price; ?> </trd>
               </tr> 
                    <?php }}else{ ?>
                 <tr>
                    <td>  <?php echo "empty cart";?></td>
                  </tr>
                 <?php } ?>
                 
                <td class="text-center"><?php echo $usvalue->order_status; ?> </td>
                <td class="text-center actions">
             <?= $this->Html->link(__(''), ['action' => 'view',$usvalue->id],['class'=>'view','lagend'=>false]) ?>
                </td>
             </tr>  
            <?php
                    }
             }else{ ?>
             <tr>
                    <td class="text-center" width="100%">No Record Found</td>
             </tr>
             <?php } ?>
                </table>
                </div>
                
                <div class="form-buttons">
                    <?= $this->Form->input('Submit',['div'=>false,'type'=>'submit','class'=>'btn']); ?>
			<a href="<?= $this->Url->build('/admin/users/index', true);?>" class="btn btn-cancel">Cancel</a>
                </div>
                
            </div>
             
    <?= $this->Form->end() ?>
    <?php 
        if($user->status==0)
        { ?>
          <div class="view-buttons">
        <?php //$n = array('id'=>$user->id , 'type'=>'suspend'); ?>
        <?= $this->Html->link(__('Un-Suspend '), ['action' => 'suspenduser', $user->id , 'u'],['class'=>'suspend','label'=>false]) ?>
       </div>
    </div>

       <?php }else{?>
        <div class="view-buttons">
        <?= $this->Html->link(__('Suspend'), ['action' => 'suspenduser', $user->id , 's'],['class'=>'suspend','label'=>false]) ?>
       </div>
    </div>

    <?php } ?>



      <script src="js/jquery.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/jquery.jscrollpane.min.js"></script>  
        <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#printer-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
	
	
$(function()
{
	$('.used-printers').jScrollPane({
		showArrows:true,
		verticalDragMinHeight: 50,
		verticalDragMaxHeight: 50
		});
});
</script>