        <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="<?php echo $this->Url->build('/');?>images/icon-sub-admin.png" alt=""> Sub-Admin</h2>
               
            </div>
            
            <div class="page-filter">
            	<div class="small-filter">
            <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
               <input type="text" placeholder="User Name"  name="username" class="width">
				<input type="submit" value="Search" class="btn">
               
                <span class="seprator"></span>
                <? echo $this->Html->link('Add Sub Admin',['action' => 'subAdminAdd'],['class'=>'btn']); ?>
                </div>
                 </form>
            </div>
            
            <table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
            	<tr>
                	<th width="6%" class="text-center">No.</th>
                    <th width="10%">Name</th>
                    <th width="10%">Username</th>
                    <th width="12%">Email</th>
                    <th width="12%">Contact No.</th>
                    <th width="12%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;
                 foreach ($users as $user): ?>
                <tr>
                	<td class="text-center"><?= $counter; ?></td>
                    <td><?= h($user->firstname." ".$user->lastname); ?></td>
                    <td><?= h($user->username) ?></td>
                <td><?= h($user->emailid) ?></td>
               
                    <td><?= h($user->phone); ?></td>
            <td class="actions"><center>
                <?= $this->Html->link(__(''), ['action' => 'viewsubadmin', $user->id],['class'=>'view','lagend'=>false]) ?>
                <?= $this->Html->link(__(''), ['action' => 'editsubadmin', $user->id],['class'=>'edit','label'=>false]) ?>
                <?= $this->Form->postLink(__(''), ['controller'=>'Users' , 'action' => 'deletesubadmin', $user->id],['class'=>'delete','label'=>false,'confirm' => __('Are you sure you want to delete this user?', $user->id)]) ?>
          
            </center></td>
                    
                </tr>
     <?php $counter++; endforeach; ?>
            </table>
   <div class="table-footer clearfix paginator">
            	<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} sub admin users'); ?> </p>
                
                <ul class="table-pagination">
						<?php  echo $this->Paginator->prev('< ' . __('previous')); ?>
                        <?php
                        echo $this->Paginator->numbers();
                        ?>
                        <?php  echo $this->Paginator->next(__('next') . ' >'); ?>
        </ul>
  </div>

            
        </div>