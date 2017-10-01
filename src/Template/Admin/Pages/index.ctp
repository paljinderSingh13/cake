<?php //echo "<pre>"; print_r($users); die; ?>

        <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="<?php echo $this->Url->build('/');?>images/icon-print-heading.png" width="31" height="27" alt="">Static Pages </h2>
                <div class="pull-right">
              <!-- <? echo $this->Html->link('Add Banner',['action' => 'addbanner'],['class'=>'btn']); ?> -->

                <? echo $this->Html->link('Add Page',['action' => 'add'],['class'=>'btn']); ?>
                </div>
            </div>
            
            <div class="page-filter">
                <input type="text" placeholder="User Name"  class="width">
                <input type="submit" value="Search" class="btn pull-right">
            </div>
            
            <table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
            	<tr>
                	<th width="6%" class="text-center">No.</th>
                    <th width="10%">Page</th>
                    <th width="30%">Content</th>
                    <th width="12%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;

                 foreach ($pages as $pvalue){ 
                if($pvalue->banner_status ==1)
                    { ?>
                <tr>
                    <td class="text-center"><?= $counter; ?></td>
                    
                    <td>Banner</td>
                    <td><img width="50" alt="your image" src="/DBR/img/banner/<?= h($pvalue->page_banner1) ?>" id="printer-image"> 
                <img width="50" alt="your image" src="/DBR/img/banner/<?= h($pvalue->page_banner2) ?>" id="printer-image">
                <img width="50" alt="your image" src="/DBR/img/banner/<?= h($pvalue->page_banner3) ?>" id="printer-image">

                    </td>
            <td class="actions"><center>
                <?= $this->Html->link(__(''), ['action' => 'viewbanner', $pvalue->id],['class'=>'view','lagend'=>false]) ?>
                <?= $this->Html->link(__(''), ['action' => 'editbanner', $pvalue->id],['class'=>'edit','label'=>false]) ?>
                <?= $this->Form->postLink(__(''), ['action' => 'deletebanner', $pvalue->id],['class'=>'delete','label'=>false,'confirm' => __('Are you sure you want to delete this user?', $pvalue->id)]) ?>
          
            </center></td>
                    
                </tr>

                         <?php   }else{
                    ?>
                <tr>
                	<td class="text-center"><?= $counter; ?></td>
                    
                    <td><?= h($pvalue->page_title) ?></td>
                    <td><?= h($pvalue->page_description) ?></td>
            <td class="actions"><center>
                <?= $this->Html->link(__(''), ['action' => 'view', $pvalue->id],['class'=>'view','lagend'=>false]) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $pvalue->id],['class'=>'edit','label'=>false]) ?>
                <?= $this->Form->postLink(__(''), ['action' => 'delete', $pvalue->id],['class'=>'delete','label'=>false,'confirm' => __('Are you sure you want to delete this user?', $pvalue->id)]) ?>
          
            </center></td>
                    
                </tr>
     <?php } $counter++; } ?>
            </table>
            
            <!-- <div class="table-footer clearfix paginator">
            	<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} pages'); ?> </p>
                <div class="pagination">
                	<li class="current"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </div>
            </div> -->
            
              <!--  <div class="paginator">
        <ul class="pagination">
            <?  $this->Paginator->prev('< ' . __('previous')) ?>
            <?  $this->Paginator->numbers() ?>
            <?  $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p></p>
    </div>-->
            
            
        </div>