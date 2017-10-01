<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="images/icon-pencil.png" width="28" height="29" alt=""> View Gifts</h2>
            </div>
            
     <div class="form">
            <div class="form-row user-view-row">
            	<div class="label-field">Gift Name:</div>
                <div class="input-box">
                <?=  $gifts->gift_name; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Description:</div>
                <div class="input-box">
                <?=  $gifts->description; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="label-field">Status:</div>
                <div class="input-box">
                <?=  $gifts->description; ?>
                </div>
            </div>
          <div class="form-row user-view-row">
                <div class="label-field">Image:</div>
                <div class="input-box">
                 <img alt="your image" src="/DBR/img/gift/<?php echo $gifts->image; ?>" id="printer-image">
             
                </div>
            </div>
            <div class="view-buttons">
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gifts->id],['class'=>'edit','label'=>false]) ?>
        <?= $this->Html->link(__('Delete'), ['action' => 'delete', $gifts->id],['class'=>'delete','lagend'=>false])   
            ?>


            </div>

            



            
            
            
            
                
               
            
    </div>
</div>
