
 <div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img src="<?php echo $this->Url->build('/'); ?>images/icon-print-heading.png" width="31" height="27" alt="">Gifts</h2>
                <div class="pull-right">
              
                <?php echo $this->Html->link('Add Gifts',['action' => 'add'],['class'=>'btn']); ?>
                </div>
            </div><br>

<table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th width="6%" class="text-center">No.</th>
                    <th width="10%">Gift Name</th>
                    <th width="12%">Description</th>
                    
                    <th width="12%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;
                foreach ($gifts as $gift)
{ ?>
        

<tr>
                    <td class="text-center"><?= $counter; ?></td>
                    <td><?= h($gift->gift_name) ?></td>
                <td><?= h($gift->description) ?></td>
              
                <td class="actions"><center>
                <?= $this->Html->link(__(''), ['action' => 'view', $gift->id],['class'=>'view','lagend'=>false]) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $gift->id],['class'=>'edit','label'=>false]) ?>

                 <?= $this->Html->link(__(''), ['action' => 'delete', $gift->id],['class'=>'delete','label'=>false]) ?>

                
          
            </center></td>
                    
                </tr>
     
                
     <?php $counter++;} ?>
            </table>
            
            <div class="table-footer clearfix paginator">
                <p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} Gift'); ?> </p>
                <div class="pagination">
                    <li class="current"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </div>
            </div>
            
               <div class="paginator">
        <ul class="pagination">
            <? echo $this->Paginator->prev('< ' . __('previous')) ?>
            <? echo $this->Paginator->numbers() ?>
            <? echo $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p></p>
    </div>
            
            
        </div>











        </div>
