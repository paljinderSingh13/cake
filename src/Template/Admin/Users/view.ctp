<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="images/icon-pencil.png" width="28" height="29" alt=""> View User</h2>
            </div>
            
            <div class="form">
                
    <div class="form-row user-view-row">
                	<div class="label-field">User Name:</div>
                    <div class="input-box">
                    <?=  $users->username; ?>
                    </div>
                </div>
                
                <div class="form-row user-view-row">
                	<div class="label-field">Email Id:</div>
                    <div class="input-box">
                        <?= $users->emailid; ?>
                    </div>
                </div>
                
                            
            <div class="form-row user-view-row">
                	<div class="label-field">Sign Up Date:</div>
                    <div class="input-box">
                        <?= date('d M Y',strtotime($users->signupdate)); ?>
                    </div> 
                </div>
                    <hr class="seprator">
                    
 
 <div class="form-row user-view-row">
                	<div class="label-field">Full Name:</div>
                    <div class="input-box">
                    <?= $users->firstname." ".$users->lastname; ?>
                    </div>
                </div>
                

                 <div class="form-row user-view-row">
                	<div class="label-field">Address line1:<br>(or company name): </div>
                    <div class="input-box">
                         <?=  $users->address_line1; ?>
                    </div> 
                </div>
                           
                           
                <div class="form-row user-view-row">
                	<div class="label-field">Address line2:<br>(optional)</div>
                    <div class="input-box">
                         <?=  $users->address_line2; ?>
                    </div> 
                </div>
                
                <div class="form-row user-view-row">
                	<div class="label-field">Town/City:</div>
                    <div class="input-box">
                         <?=   $users->city;  ?>
                    </div> 
                </div>
                                
                <div class="form-row user-view-row">
                	<div class="label-field">Country:</div>
                    <div class="input-box">
                    <?= $users->country;?>    
                    </div> 
                </div>
                                                
                <div class="form-row user-view-row">
                	<div class="label-field">Postal Code:</div>
                    <div class="input-box">
                        <?= $users->postal_code; ?>
                         </div> 
                </div>
                
             <div class="form-row user-view-row">
                	<div class="label-field">Phone Number:</div>
                    <div class="input-box">
                         <?= $users->phone; ?>
                </div> 
                </div>
                
                <div class="used-printers-heading">Past Purchasers:</div>
                
                <table cellpadding="0" cellspacing="0" width="100%" class="table-grid">
                	<tr>
                	<th width="8%" class="text-center">Order No.</th>
                    <th width="10%">Order Date</th>
                    <th width="12%">Product Name</th>
                    <th width="12%">Qty</th>
                    <th width="10%">Price</th>
                    <th width="10%">Status</th>
                    <th width="12%" class="text-center">Action</th>
                </tr>
                </table>
                
                <div class="used-printers">
               	 <table cellpadding="0" cellspacing="0" width="100%" class="table-grid">
                	<tr>
                    	<td class="text-center" width="100%">No Record Found</td>
         
                    </tr>
                </table>
                </div>
                
            </div>
            
            <div class="view-buttons">
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $users->id],['class'=>'edit','label'=>false]) ?>
        <?= $this->Html->link(__('Delete'), ['action' => 'delete', $users->id],['class'=>'delete','lagend'=>false]) ?>  
            </div>
            
        </div>
