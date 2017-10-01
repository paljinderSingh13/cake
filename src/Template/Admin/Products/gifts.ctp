
<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img width="28" height="29" alt="" src="/DBR/images/icon-pencil.png"> Add Gift</h2>
            </div>
            
    <div class="form">
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
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
                    <div class="label-field">Image:</div>
                    <div class="input-box add-printer-image">
                        <input type="file" onchange="readURL(this);">
                        <img alt="your image" src="images/img-add-printer-image.gif" id="printer-image">
                    </div>
                </div>
                
               
                
                
                
                <div class="form-buttons">
                    <input type="submit" value="Save" class="btn"> <a class="btn btn-cancel" href="#">Cancel</a>
                </div>
            </form> 
            </div>
            
        </div>