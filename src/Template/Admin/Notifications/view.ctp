
<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="images/icon-pencil.png" width="28" height="29" alt=""> View Notification</h2>
            </div>
           
     <div class="form">
            <div class="form-row user-view-row">
            	<div class="label-field">Message:</div>
                <div class="input-box">
                <?=  $notification->message; ?>
                </div>
            </div>

<div class="form-row">
                    <div class="label-field">Send To:</div>
                    <div style="display:inline-block; width:70%; position:relative; vertical-align:top;" class="add-notification-table">
                        <div class="notification-filter text-right"></div>
                      <table cellpadding="0" cellspacing="0" width="20%" class="table-grid">
                            <tr>
                                
                                <th>User Name</th>
                            </tr>
                        </table>
                      
                      <div class="used-printers">
                         <table cellpadding="0" cellspacing="0" width="20%" class="table-grid">

                         <?php 
                    $user_name="";
             foreach ($notification->usernotifications as  $noti_user) {
    //print_r($noti_user->user_id);
    foreach ($notification->user as  $user) {
    if($noti_user->user_id == $user->id)
    {

       $user_name .='<tr><td class="text-center">'.$user->username.'</td></tr>';
    }
}}
?>






    
                      <tr>
                        
                        <td><?php echo $user_name; ?></td>
                            </tr>

   

                            
                        </table>
                        </div>
                    </div>
                
                </div>
 
            <div class="view-buttons">
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notification->id],['class'=>'edit','label'=>false]) ?>
        <?= $this->Html->link(__('Delete'), ['action' => 'delete', $notification->id],['class'=>'delete','lagend'=>false])   
            ?>


            </div>

            



            
            
            
            
                
               
            
    </div>
</div>
