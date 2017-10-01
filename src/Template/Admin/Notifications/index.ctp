<?php 
 //print_r($notification->user);

// foreach ($notification->user as  $user) {
//         echo $user->id;
//         # code...
//       }
//       die;

//  echo "<pre>";
// foreach ($notification as  $value)
// {
//    print_r($value->usernotifications);

//    foreach ($value->usernotifications as  $val) {
//        # code...
//     echo $val->user_id;
//    }
// }
// die;
?>
<script type="text/javascript">
$(document).ready(function(){

        $('#checkAll').change(function(){
    if($(this).prop('checked')){
        $('tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', true);
        });
    }else{
        $('tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', false);
        });
    }
});
});
</script>
<style type="text/css">
.custom-checkbox{display:inline-block;}
</style>
 <div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img src="<?php echo $this->Url->build('/'); ?>images/icon-notification-head.png" alt="">Notifications</h2>
                <div class="pull-right">
              	<?php echo $this->Html->link('Send Notification',['action' => ''],['class'=>'btn']); ?>
                <?php echo $this->Html->link('Add Notification',['action' => 'add'],['class'=>'btn']); ?>
                </div>
            </div><br>
            

<table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th width="5%" class="text-center">No.</th>
                    <th width="18%" class="text-center"><div class="custom-checkbox"><input id="checkAll" type="checkbox" name="check_all" value=""><label></label></div></th>
                    <th width="27%">Message</th>
                    <th width="42%">Send To</th>
                    <th width="15%" class="text-center">Action</th>
                </tr>
                 <?php
                 $counter= 1 ;
$user_name ="";
foreach ($notification as  $notif)
{
   $user_name ="";
   foreach ($notif->usernotifications as  $val) {
      //$val->user_id;
      foreach ($notification->user as  $user) {
        if($user->id==$val->user_id)
        {
               $user_name .= $user->username.', ';
        }
       
      }
        
   }


?>
        

<tr>
                    <td class="text-center"><?= $counter; ?></td>
                    <td class="text-center"><div class="custom-checkbox"><input type="checkbox" name="check_all" value="<?= h($notif->id) ?>"><label></label></div></td>
                <td><?= h($notif->message) ?></td>
                <td><?= h($user_name) ?></td>
                
                 
                <td class="actions text-center">
                <?= $this->Html->link(__(''), ['action' => 'view', $notif->id],['class'=>'view','lagend'=>false]) ?>
              </td>
                    
                </tr>
   
                
     <?php $counter++;} ?>
            </table>
            
<div class="table-footer clearfix paginator">
            	<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} notifications'); ?> </p>
                
                <ul class="table-pagination">
						<?php  echo $this->Paginator->prev('< ' . __('previous')); ?>
                        <?php
                        echo $this->Paginator->numbers();
                        ?>
                        <?php  echo $this->Paginator->next(__('next') . ' >'); ?>
        </ul>
  </div>

            
            
        </div>











        </div>
