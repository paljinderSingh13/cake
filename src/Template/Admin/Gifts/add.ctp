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

</script>
<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img alt="" src="/DBR/images/icon-add.png"> Add Gift</h2>
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
                    <div class="label-field v-top">Description:</div>
                    <div class="input-box add-gift-des">
                    <?
                    echo $this->Form->textarea('description', ['rows' => '5', 'cols' => '5','class'=>'input-field','label'=>false]);?>
                    </div>
                </div>
            
            
            <div class="form-row">
                    <div class="label-field">Gift Status:</div>
                        <div class="input-box radio-buttons">
                        <?= $this->Form->radio(
    'gift_status',
    [
        ['value' => '1', 'text' => '<span>Active</span>', 'style' => 'color:red;'],
        ['value' => '0', 'text' => '<span>InActive</span>', 'style' => 'color:blue;']
      
    ], ['escape' => false]
); ?>
                                      
                        </div>
                     </div> 
                
                <div class="form-row">
                    <div class="label-field">Image:</div>
                    <div class="input-box add-printer-image">
                        <input type="file" onchange="readURL(this);" name="gift_image" required="required">
                        <img alt="your image" src="../../images/img-add-printer-image.gif" id="printer-image">
                    </div>
                </div>
                
                <div class="form-buttons">
                    <input type="submit" value="Save" class="btn" name="button"> <a class="btn btn-cancel" href="index">Cancel</a>
                </div>
            </form> 
            </div>
            
        </div>