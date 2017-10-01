 
 <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="<?php echo $this->Url->build('/');?>images/icon-pencil.png" width="28" height="29" alt=""> Edit User</h2>
            </div>
            <div class='form'>
    
 <?=  $this->Form->create($gift,['type'=>'file','id'=>'user-registration']); ?>
                    
    <div class="form-row">
                    <div class="label-field">Gift Name:</div>
                        <div class="input-box">
                        <?= $this->Form->input('gift_name',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                            
                             
                        </div>
                     </div>
                <div class="form-row">
                    <div class="label-field">Description:</div>
                    <div class="input-box">
                    <?= $this->Form->input('description',['class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                <div class="form-row">
            <div class="label-field">Status:</div>
            <div class="input-box">
            <input type="radio" name="status" value="1" ><label>Active</label>
             <input type="radio" name="status" value="0" ><label>InActive</label>
               <!--  <?php echo $this->Form->radio(
    'status',
    [
        ['value' => 1, 'text' => 'Active', 'style' => 'color:red;'],
        ['value' => 0, 'text' => 'InActive', 'style' => 'color:blue;'],
    
    ]
); ?> -->
            </div>
           
        </div>

                <div class="form-row">
   <div class="label-field">Banner Image:</div>
   <div class="input-box add-printer-image">
 
    <img alt="your image" src="/DBR/img/gift/<?php echo $gift['image']; ?>" id="printer-image">
   </div>
  </div>

   <div class="form-row">
   <div class="label-field">Replace Image:</div>
   <div class="input-box add-printer-image">
   <input type="file" name="image"  >
    <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
   </div>
  </div>


                    
                <div class="form-buttons">
                    <?= $this->Form->input('Submit',['div'=>false,'type'=>'submit','class'=>'btn']); ?>
            <a href="#" class="btn btn-cancel">Cancel</a>
                </div>
                
            </div>
</form>

            </div>

            </div>