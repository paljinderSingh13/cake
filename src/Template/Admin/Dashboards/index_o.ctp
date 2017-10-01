

                <div class="white-wrapper">
                   <div class="dashboard-welcome-box">Welcome.  You have <span><?php echo$dash->ordercount; ?></span> new orders, <span><?php echo $dash->usercount; ?></span> new sign ups, <span><?php echo $dash->ordercompletecount; ?></span> completed and <span><?php echo $dash->ordercancelcount; ?></span> cancelled orders.  You made  <span>S$<?php echo $dash->total_sale; ?></span>  in sales today.</div>

                   <div class="dashboard-content">
                    <div class="row">
                       <div class="col-md-6">
                           <h2><img src="images/icon-new-orders.png" width="25" height="30" alt=""> New Orders</h2>
       <table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
           <tr>
               <th width="8%">Date</th>
               <th width="7%">Order #</th>
               <th width="15%">Product Name</th>
               <th width="10%">Customer</th>
               <th width="3%" class="text-center">Qty</th>
               <th width="4%">Price</th>
           </tr>

          <!--  <tr>
               <td colspan="6" style="padding:0;"> -->
                  

                    <?php foreach ($dash as  $value) {

                    echo ' <tr>
               <td colspan="6" style="padding:0;"><table width="100%" cellpadding="0" cellspacing="0" class="dashboard-subtable">';
                        $pname ="";
                        $uid ="";
                        $qty ="";
                        $t_prc="";
                         $total = 0;
                      foreach ($value->productcarts as  $pcart) {
                          $total = $pcart->total_price + $total;
                                    $pname .='<li>'.$pcart->product->product_name.'</li>';
                                    $uid .='<li>'.$value->order_username.'</li>';
                                    $qty .='<li>'.$pcart->quantity.'</li>';
                                    $t_prc .='<li>S$'.number_format($pcart->total_price,2).'</li>';

                                } 
# code... echo $value->id;      ?>
                        <tr class="white">
                            <td width="8%"><?php echo date('Y-m-d', strtotime($value->order_date)) ?></td>
                            <td width="7%">#<?php echo $value->order_num; ?></td>
                            <td width="15%"><ul>
                                <?php
                               echo $pname; 
                                ?>

                            </ul>

                        </td>
                        <td width="10%">

                            <ul>
                                <?php
                                echo $uid;
                                
                                ?>

                            </ul>


                        </td>
                        <td width="3%" class="text-center">
                            <ul>
                                <?php
                                echo $qty;
                                ?>

                            </ul>

                            </td>
                            <td width="4%">
                                <ul>
                                    <?php
                                    echo $t_prc;
                                    ?>
                                </ul>
                            </td>
                        </tr>
                        <tr><td></td><td></td><td></td><td></td><td>Total</td><td>S$<?php echo number_format($total,2); ?></td></tr>


                          </table>
                           </td>
               </tr>
                        <?php   }   ?>
            	
            
        </td>
    </tr>
    
    
</table>
                    <div class="text-right">
                    	<a href="<?= $this->Url->build('/admin/orders/index/pending', true);?>" class="view-more">View More </a>
                    </div>
                </div>
                <div class="col-md-6">
                	<h2><img src="images/icon-user-signups.png" width="27" height="30" alt=""> Latest Sign Ups</h2>
                    <table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                       <th width="17%">Sign Up Date</th>
                       <th width="17%">User Name</th>
                       <th width="15%">Email</th>
                   </tr>
                   <?php foreach ($dash->user as  $usr) {

                       
                         echo'<tr>
                       <td>'.$usr->signupdate.'</td>
                       <td>'.$usr->username.'</td>
                       <td>'.$usr->emailid.'</td>
                   </tr>';
                        # code...
                      }
                      ?>
                   

               </table>
               <div class="text-right">
                   <a href="<?= $this->Url->build('/admin/users/index', true); ?>" class="view-more">View More</a>
               </div>
           </div>
       </div>

       <div class="row">
           <div class="col-md-6">
               <h2><img src="images/icon-complete-orders.png" width="29" height="30" alt=""> Completed Orders</h2>
               <table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                   <th width="8%">Date</th>
                   <th width="7%">Order #</th>
                   <th width="15%">Product Name</th>
                   <th width="10%">Customer</th>
                   <th width="3%" class="text-center">Qty</th>
                   <th width="4%">Price</th>
               </tr>

 <?php foreach ($dash->compelete as  $value) {
                       $pname ="";
                        $uid ="";
                        $qty ="";
                        $t_prc="";
                         $total=0;
                      foreach ($value->productcarts as  $pcart) {
                         $total = $pcart->total_price + $total;
                                    $pname .='<li>'.$pcart->product->product_name.'</li>';
                                    $uid .='<li>'.$value->order_username.'</li>';
                                    $qty .='<li>'.$pcart->quantity.'</li>';
                                    $t_prc .='<li>S$'.number_format($pcart->total_price,2).'</li>';

                                } 
# code... echo $value->id;      ?>
                        <tr class="white">
                            <td width="8%"><?php echo date('Y-m-d', strtotime($value->order_date)) ?></td>
                            <td width="7%">#<?php echo $value->order_num; ?></td>
                            <td width="15%"><ul>
                                <?php
                               echo $pname; 
                                ?>

                            </ul>

                        </td>
                        <td width="10%">

                            <ul>
                                <?php
                                echo $uid;
                                
                                ?>

                            </ul>


                        </td>
                        <td width="3%" class="text-center">
                            <ul>
                                <?php
                                echo $qty;
                                ?>

                            </ul>

                            </td>
                            <td width="4%">
                                <ul>
                                    <?php
                                    echo $t_prc;
                                    ?>
                                </ul>
                            </td>
                        </tr>
 
<tr><td></td><td></td><td></td><td></td><td>Total</td><td>S$<?php echo number_format($total,2); ?></td></tr>

                        <?php   }   ?>




 <!-- <tr>
                <td>22/07/16</td>
                <td>#2201</td>
                <td>Canon PG 810 Black Ink cartridge</td>
                <td>Ronald Lim</td>
                <td class="text-center">4</td>
                <td>S$29.90</td>
            </tr> -->
        </table>
        <div class="text-right">
           <a href="<?= $this->Url->build('/admin/orders/index/completed', true);?>" class="view-more">View More</a>
       </div>
   </div>
   <div class="col-md-6">
       <h2><img src="images/icon-cancel-orders.png" width="28" height="32" alt=""> Canceled  Orders</h2>
       <table class="table-grid" cellpadding="0" cellspacing="0" width="100%">
          <tr>
           <th width="8%">Date</th>
           <th width="7%">Order #</th>
           <th width="15%">Product Name</th>
           <th width="10%">Customer</th>
           <th width="3%" class="text-center">Qty</th>
           <th width="4%">Price</th>
       </tr>

<?php foreach ($dash->canceled as  $value) {
                       $pname ="";
                        $uid ="";
                        $qty ="";
                        $t_prc="";

                        $total =0;
                      foreach ($value->productcarts as  $pcart) {
                       $total = $pcart->total_price + $total;
                                    $pname .='<li>'.$pcart->product->product_name.'</li>';
                                    $uid .='<li>'.$value->order_username.'</li>';
                                    $qty .='<li>'.$pcart->quantity.'</li>';
                                    $t_prc .='<li>S$'.number_format($pcart->total_price,2).'</li>';

                                } 

# code... echo $value->id;      ?>
                        <tr class="white">
                            <td width="8%"><?php echo date('Y-m-d', strtotime($value->order_date)) ?></td>
                            <td width="7%">#<?php echo $value->order_num; ?></td>
                            <td width="15%"><ul>
                                <?php
                               echo $pname; 
                                ?>

                            </ul>

                        </td>
                        <td width="10%">

                            <ul>
                                <?php
                                echo $uid;
                                
                                ?>

                            </ul>


                        </td>
                        <td width="3%" class="text-center">
                            <ul>
                                <?php
                                echo $qty;
                                ?>

                            </ul>

                            </td>
                            <td width="4%">
                                <ul>
                                    <?php
                                    echo $t_prc;

                                    ?>
                                </ul>
                            </td>
                        </tr>
<tr><td></td><td></td><td></td><td></td><td>Total</td><td>S$<?php echo number_format($total,2); ?></td></tr>
                         
                        <?php   }   ?>

   
</table>
<div class="text-right">
   <a href="<?= $this->Url->build('/admin/orders/index/canceled', true);?>" class="view-more">View More</a>
</div>
</div>
</div>                

</div>

</div>