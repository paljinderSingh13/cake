        <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="<?php echo $this->Url->build('/');?>images/icon-users.png" width="32" height="27" alt=""> Users</h2>
                
            </div>
            
            <div class="page-filter">
            <div class="small-filter">
            <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
                <input name="username" type="text" placeholder="User Name"  class="width">
                <input type="submit" value="Search" class="btn">
                   
                    <span class="seprator"></span>
                <? echo $this->Html->link('Add User',['action' => 'add'],['class'=>'btn']); ?>
                </div>
                </form>
            </div>
            
            <table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
            	<tr>
                	<th width="6%" class="text-center">No.</th>
                    <th width="10%">Username</th>
                    <th width="12%">Email</th>
                    <th width="12%">Sign Up Date</th>
                    <th width="10%">Orders</th>
                    <th width="10%">Feedback Given</th>
                    <th width="12%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;
                 foreach ($users as $user): ?>
                <tr>
                	<td class="text-center"><?= $counter; ?></td>
                    <td><?= h($user->username) ?></td>
                <td><?= h($user->emailid) ?></td>
                <td><?= date('d M Y',strtotime($user->signupdate)); ?></td>
                    <td>0</td>
                    <td></td>
                    <!-- <img src="<?php echo $this->Url->build('/');?>images/icon-blank-star.png" alt=""><img src="<?php echo $this->Url->build('/');?>images/icon-blank-star.png" alt=""><img src="<?php echo $this->Url->build('/');?>images/icon-blank-star.png" alt=""> <img src="<?php echo $this->Url->build('/');?>images/icon-blank-star.png" alt=""> <img src="<?php echo $this->Url->build('/');?>images/icon-blank-star.png" alt=""> -->
            <td class="actions"><center>
                <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class'=>'view','lagend'=>false]) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $user->id],['class'=>'edit','label'=>false]) ?>
                <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id],['class'=>'delete','label'=>false,'confirm' => __('Are you sure you want to delete this user?', $user->id)]) ?>
          
            </center></td>
                    
                </tr>
     <?php $counter++; endforeach; ?>
            </table>
            
    <div class="table-footer clearfix paginator">
            	<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} users'); ?> </p>
                
                <ul class="table-pagination">
						<?php  echo $this->Paginator->prev('< ' . __('previous')); ?>
                        <?php
                        echo $this->Paginator->numbers();
                        ?>
                        <?php  echo $this->Paginator->next(__('next') . ' >'); ?>
        </ul>
  </div>
            
             
            
            
        </div>