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
                	<div class="label-field">Email Id:</div>
                    <div class="input-box">
                        <?= $this->Form->input('emailid',['type'=>'email','required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
                            
            <div class="form-row">
                	<div class="label-field">Sign Up Date:</div>
                    <div class="input-box">
                        <?= $this->Form->input('signupdate',['type'=>'text', 'id'=>'datepicker' ,'required'=>true,'class'=>'input-field','label'=>false,'value'=> date('d M Y',strtotime($user->signupdate))]); ?>
                    </div> 
                </div>
                    <hr class="seprator">
                <div class="form-row">
                	<div class="label-field">First Name:</div>
                    <div class="input-box">
                    <?= $this->Form->input('firstname',['type'=>'text','required'=>false,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="label-field">Last Name:</div>
                    <div class="input-box">
                    <?= $this->Form->input('lastname',['type'=>'text','required'=>false,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-row">
                   <div class="label-field"> Image:</div>
                   <div class="input-box add-printer-image">
            <input type="file" name="image" id="product_image" onchange="readURL(this);">
                    <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
                   </div>
                  </div>

                  
                

                 <div class="form-row">
                	<div class="label-field">Address line1:<br>(or company name): </div>
                    <div class="input-box">
                         <?=   $this->Form->input('address_line1',['required'=>false,'type'=>'text','class'=>'input-field','label'=>false]); ?>
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
                         <?=   $this->Form->input('city',['required'=>false,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                                
                <!-- <div class="form-row">
                	<div class="label-field">Country:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('country',['required'=>false,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div> -->
                                                
                <div class="form-row">
                	<div class="label-field">Postal Code:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('postal_code',['required'=>false,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                
             <div class="form-row">
                	<div class="label-field">Phone Number:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('phone',['required'=>false,'type'=>'text','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                
                
                <div class="form-buttons">
                    <?= $this->Form->input('Submit',['div'=>false,'type'=>'submit','class'=>'btn']); ?>
			<a href="#" class="btn btn-cancel">Cancel</a>
                </div>
                
            </div>
             
    <?= $this->Form->end() ?>
    
        <div class="view-buttons">
        <?= $this->Html->link(__('Suspend User'), ['action' => 'suspenduser', $user->id],['class'=>'suspend','label'=>false]) ?>
       </div>
    </div>

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