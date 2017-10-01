   <script type="text/javascript">
       $(function() {

        var dateToday = new Date(); 
    $("#datepicker").datepicker({ minDate: 0});
  });


   </script>  
   <style>
   #datepicker{background: #fff url("../../images/icon-cal.png") no-repeat scroll right 0;}


</style>

        <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="<?php echo $this->Url->build('/');?>images/icon-pencil.png" width="28" height="29" alt=""> Add User</h2>
            </div>
            <div class="form">
 <?=  $this->Form->create($user,['type'=>'file','id'=>'user-registration']); ?>
                <div class="form-row">
                	<div class="label-field">User Name:</div>
                    <div class="input-box">
                    <?= $this->Form->input('username',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Email Id:</div>
                    <div class="input-box">
                        <?= $this->Form->input('emailid',['type'=>'email','required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
                
                <div class="form-row">
                	<div class="label-field">Password:</div>
                    <div class="input-box">
                         <?=   $this->Form->input('password',['required'=>true,'type'=>'password','class'=>'input-field','label'=>false]); ?>
                    </div> 
                </div>
                
            <div class="form-row">
                	<div class="label-field">Sign Up Date:</div>
                    <div class="input-box">
                        <?= $this->Form->input('signupdate',['type'=>'text','required'=>true,'class'=>'input-field' , 'id'=>'datepicker' ,'label'=>false]); ?>
                    </div> 
                </div>
                <div class="form-buttons">
     <input type="submit" value="Save" class="btn">
      <?php echo $this->Html->link('Cancel',['action' => 'index'],['class'=>'btn btn-cancel']); ?>

     <!--  <a class="btn btn-cancel" href="#">Cancel</a> -->
    </div>
                
               
                
            </div>
             
    <?= $this->Form->end() ?>
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