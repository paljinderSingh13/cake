
<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img width="28" height="29" alt="" src="/DBR/images/icon-pencil.png"> Add Promotion</h2>
            </div>
            
    <div class="form">
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
                <div class="form-row">
                    <div class="label-field">Promotion:</div>
                        <div class="input-box">
                        <?= $this->Form->input('promotion',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                            
                             
                        </div>
                     </div>
                
                <div class="form-row">
                    <div class="label-field">From:</div>

                    <div class="input-box"> 
                    <?= $this->Form->input('promo_from',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>

                
                <div class="form-row">
                    <div class="label-field">To:</div>
                    <div class="input-box">
                    <?= $this->Form->input('promo_to',['required'=>true,'class'=>'input-field','label'=>false]); ?>

                    </div>
                   
                    </div>
                
                
                <div class="form-row"> 
                    <div class="label-field">Promotion Amount:</div>
                    <div class="input-box">
                  <?= $this->Form->input('promotion_amt_percentage',['required'=>true,'class'=>'input-field','label'=>false]); ?>
                </div>
                </div>

                
                
                
                <div class="form-row">
                    <div class="label-field">Description:</div>
                    <div class="input-box">
                    <?= $this->Form->input('promo_description',['class'=>'input-field','label'=>false]); ?>
                    </div>
                </div>
                
              
                <div class="form-row">
                    <div class="label-field">Image:</div>
                    <div class="input-box add-printer-image">
                        <input type="file" onchange="readURL(this);">
                        <img alt="your image" src="images/img-add-printer-image.gif" id="printer-image">
                    </div>
                </div>
                
                <div class="form-row text-right">
                    <input type="submit" class="btn" value="Add Printer">   
                </div>
                
                
                <div class="used-printers-heading">Used on Printer(s):</div>
                
                <table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                    <tbody><tr>
                        <th width="10%" class="text-center">No.</th>
                        <th width="10%">Tag</th>
                        <th width="10%">Brand</th>
                        <th width="50%">Printer Name</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </tbody></table>
                
                <div class="used-printers jspScrollable" style="overflow: hidden; padding: 0px; width: 1030px;" tabindex="0">
                 
                <div class="jspContainer" style="width: 1030px; height: 307px;"><div class="jspPane" style="padding: 0px; width: 1014px; top: 0px;"><table cellspacing="0" cellpadding="0" width="100%" class="table-grid">
                    <tbody><tr>
                        <td width="10%" class="text-center">1.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td width="10%">Canon</td>
                        <td width="50%">PIXMA iP2770 / iP2772</td>
                        <td width="10%" class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">2.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">3.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">4.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">5.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td width="10%" class="text-center">6.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td width="10%">Canon</td>
                        <td width="50%">PIXMA iP2770 / iP2772</td>
                        <td width="10%" class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">7.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">8.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">9.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="text-center">10.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
                    </tr>
                </tbody></table></div><div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><a class="jspArrow jspArrowUp jspDisabled"></a><div class="jspTrack" style="height: 287px;"><div class="jspDrag" style="height: 50px; top: 0px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><a class="jspArrow jspArrowDown"></a><div class="jspCap jspCapBottom"></div></div></div></div>
                
                <div class="form-buttons">
                    <input type="submit" value="Save" class="btn"> <a class="btn btn-cancel" href="#">Cancel</a>
                </div>
            </form> 
            </div>
            
        </div>