

<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="images/icon-pencil.png" width="28" height="29" alt=""> View Page</h2>
            </div>
            
     <div class="form">
            <div class="form-row user-view-row">
                <div class="input-box">
                <?=  $pages->page_title; ?>
                </div>
            </div>
            <div class="form-row user-view-row">
                <div class="input-box">
                <?=  $pages->page_description;  ?>
                </div>
            </div>

            <div class="view-buttons">
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pages->id],['class'=>'edit','label'=>false]) ?>
        <?= $this->Html->link(__('Delete'), ['action' => 'delete', $pages->id],['class'=>'delete','lagend'=>false])   
            ?>

            </div>

            



            
            
            
            
                
               
            
    </div>
</div>
