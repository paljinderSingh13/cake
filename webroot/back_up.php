1 date format 
  $newDate = date('g:ia \o\n l jS F Y', strtotime($promotion->promo_to));
#out put 12:00am on Saturday 4th June 2016


2)


3 product backup 


public function notificationList()
{
if($this->request->is('post') && (!empty($this->request->data['user_id'])))
   {  
    $this->loadModel("Users");
    $this->loadModel("Notifications");

  $query = $this->Users
    ->find('all')
    ->contain(['Usernotifications'])     
    ->matching('Usernotifications')
    ->where([
      'Usernotifications.user_id' => $this->request->data['user_id']
      ]);

    $noti =  json_decode( json_encode($query),true);
    $noti_data= array();

    foreach ($noti as $value) {
    foreach ($value['usernotifications'] as $val)
      {
        $message =  $this->Notifications->find()->where(array('id'=>$val['notification_id']));
        $arr =  json_decode( json_encode($message),true);
        array_push($noti_data, $arr[0]);
      } 
  }

  $arrdetail['error'] = '0';
  $arrdetail = json_encode($noti_data);

}
else{
    $arrdetail['error'] = '1';
        $arrdetail['response'] = 'No Data Found';

}


$this->set([
        'message' => $arrdetail,
        '_serialize' => ['message']
        ]);

}

















public function test()
    {
        $this->loadModel('Products');
        $this->loadModel('Productpromotions');

    $query = $this->Products->find()->contain(['Productpromotions'=> function ($q) {
       return $q
          ->where(['Productpromotions.product_id' => 69]);
    }]);

    echo "<pre>";
foreach ($query as $value) {
   print_r($value);
}
    //print_r($query);

    die;

// $query = $articles->find()->contain([
//     'Comments' => function ($q) {
//        return $q
            
//             ->where(['Comments.approved' => true]);
//     }
// ]);


    }
 


$indexInfo['description'] = "Delivery Address  (post method) - Delivery Address ";
        $indexInfo['url'] = $dir."users/addDeliveryAdrs.json";
        $indexInfo['parameters'] = '
        user_id - user_id (Required) <br>
        fullname - fullname (Required)<br>
        address  - address (Required)<br>
        country  -  country (Required)<br>
        postalcode - postalcode (Required)<br>
        phone       - phone postalcode (Required)<br>';
        
        $indexInfo['output'] = '<b>Success</b><pre> 
        {
              "message": {
                "error": "0",
                "response": "Delivery detail add successfully",
                "deliveryDetail": [
                  {
                    "id": 11,
                    "user_id": 1,
                    "fullname": "testfullname111",
                    "address": "chd11",
                    "country": "ind11",
                    "postalcode": "1439911",
                    "phone": 9988811
                  }
                ]
              }
            }
        </pre><br>
        <b>Error</b><pre>[{"error":"1","response":"Parameters are missing"}]</pre>
        ';
        $indexarr[] = $indexInfo;

<?php $counts =1;
$brand='';
foreach ($product['printer'] as  $printer) {
    foreach($product['setting'] as $value){
   // 'color','brand','type','cartridge_type','est_yield','inventor _availability','compatibility','shipping_weight'

if($value->id == $printer->brand_id )
    {
         $brand = $value->name;
    }
}

  $check ='<input type="checkbox"  name="printer_id[]" value="'.h($printer->id).'">'; 


 foreach ($product['productprinters'] as  $value) {
  if($value['printer_id']==$printer->id)
  {
     $value['printer_id'];
     $check ='<input type="checkbox" checked="checked" name="printer_id[]" value="'.h($printer->id).'">';
  } 
    } 

    ?>
    <tr>
      <td width="10%" class="text-center"><?= h($counts) ?></td>
      <td width="10%"><div class="custom-checkbox"><?php echo $check; ?>
      <label></label></div></td>
      <td width="12%"><?= h($brand) ?></td>
      <td width="22%"><?= h($printer->printer_name) ?></td>
       <td width="25%"><?= h($printer->alias) ?></td>
      <td width="10%" class="actions text-center"><a class="edit" href="<?php echo $this->Url->build('/admin/products/editprinter/'.$printer->id);?>"></a> <a class="delete" href="deleteprinter/<?= h($printer->id) ?>"></a></td>
    </tr>

   
<?php  $counts++; 

}
?>





















<?php $counts =1;
$brand='';
foreach ($data['printer'] as  $printer) {
    foreach($data['setting'] as $value){
   // 'color','brand','type','cartridge_type','est_yield','inventor _availability','compatibility','shipping_weight'

if($value->id == $printer->brand_id )
    {
         $brand = $value->name;
    }
}
    ?>
    <tr>
                        <td width="10%" class="text-center"><?= h($counts) ?></td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox" name="printer_id[]" value="<?= h($printer->id) ?>"><label></label></div></td>
                        <td width="10%"><?= h($brand) ?></td>
                        <td width="50%"><?= h($printer->printer_name) ?></td>
                         <td width="50%"><?= h($printer->alias) ?></td>
                            <td class="actions"><center>
                
                <?= $this->Html->link(__(''), ['action' => 'editprinter', $printer->id],['class'=>'edit','label'=>false]) ?>

                 <?= $this->Html->link(__(''), ['action' => 'deleteprinter', $printer->id],['class'=>'delete','label'=>false]) ?>

                
          
            </center></td>

                        
                    </tr>

   
<?php $counts++; 

}
?>



<td width="10%" class="actions text-center"><a class="edit" href="editprinter/<?= h($printer->id) ?>"></a> <a class="delete" href="deleteprinter/<?= h($printer->id) ?>"></a></td>
 <?php 

                   foreach ($notification['user'] as  $value) {
                    ?>

                    <tr>
                        <td width="10%"><div class="custom-checkbox">
                            <input name="user_id[]" value="<?= h($value->id) ?>" type="checkbox"><label></label></div></td>
                            <td><?= h($value->username) ?></td>
                        </tr>


                        <?php ; 

                    }
                    ?>











  <div class="form-row">
   <div class="label-field">From:</div>

   <div class="input-box"> 
<?= $this->Form->input('product_name',['required'=>true,'class'=>'input-field  datepicker','label'=>false]); ?>   </div>
  </div>










<select name="brand" class="width">
                  <option value="">Brand</option>
                  <?php echo $brand; ?>
                </select>
                
                <select name="color" class="width">
                  <option value="">Color</option>
                  <?php echo $color;   ?>
                </select>
                
                <select name="cartridge" class="width">
                  <option value="">Cartridge</option>
                  <?php echo $cartridge_type; ?>
                </select>
                
                <select name="estyield" class="width">
                  <option value="">Est. Yield</option>
                  <?php echo $est_yield; ?>
                </select>


<?php 

     $count=1;
     foreach($data['product'] as $val){

      foreach($data['setting'] as $value)
      {
       if($value['id'] == $val['brand_id'])
       {
        $brand_name =  $value['name'];
       }
      }

      ?>
      <tr>
       <td width="10%" class="text-center"><?= h($count) ?></td>
       <td width="10%"><div class="custom-checkbox"><input name="product_id[]" value="<?= h($val['id']) ?>" type="checkbox"><label></label></div></td>
       <td width="10%"><?= h($brand_name) ?></td>
       <td width="50%"><?= h($val['product_name']) ?></td>

      </tr>
      <?php $count++;
     }

     ?>
     <tr>
      <td class="text-center">10.</td>
      <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
      <td>Canon</td>
      <td>PIXMA iP2770 / iP2772</td>
      <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
     </tr>




     <?php 

     $count=1;

     foreach($promotion['product'] as $val){
      foreach($promotion['setting'] as $value)
      {
       if($value['id'] == $val['brand_id'])
       {
        $brand_name =  $value['name'];
       }
      }
      $check ='<input class="case"  name="product_id[]" value="'.h($val['id']).'" type="checkbox">';
      foreach ($promotion['productpromotions'] as $v)
      {

       if($v['product_id'] ==$val['id'])
       {
        
        $check ='<input class="case"  checked="checked" name="product_id[]" value="'.h($val['id']).'" type="checkbox">';
       }
       
      }
      
      ?>
      <tr>
       <td width="10%" class="text-center"><?= h($count) ?></td>
       <td width="10%"><div class="custom-checkbox"> <?php echo $check; ?> <label></label></div></td>
       <td width="10%"><?= h($brand_name) ?></td>
       <td width="50%"><?= h($val['product_name']) ?></td>
       
      </tr>
      <?php  $count++;
     }

     ?>
     <tr>
      <td class="text-center">10.</td>
      <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
      <td>Canon</td>
      <td>PIXMA iP2770 / iP2772</td>
      <td class="actions text-center"><a class="edit" href="#"></a> <a class="delete" href="#"></a></td>
     </tr>