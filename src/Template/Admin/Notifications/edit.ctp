<input id="id" type="hidden" value="<?= h($notification->id) ?>" >
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

        userData();
        $("#search").click(userSearch);
        });

    function userSearch()
    {  
        username = $("#username").val();
        id = $("#id").val();
        $.ajax({
            url:'http://localhost/DBR/admin/notifications/usersearch',
            dataType:'json',
            type:'POST',
            data:{'username':username, 'id':id},
            success:function(response)
            {
                 console.log(response);
                var tr;
                $.each(response, function(index, val)
                {
                    check ='<input name="user_id[]" value="'+val.id+'" type="checkbox">';
                       $.each(response.user_notif, function(index, userid)
                            {
                                    if(userid.user_id==val.id)
                                    {
                                    check ='<input checked="checked" name="user_id[]" value="'+val.id+'" type="checkbox">';
                                    }
                            }) 
                    tr +='<tr><td width="10%"><div class="custom-checkbox">';
                    tr +=check+'<label></label></div></td>';
                    tr +='<td>'+val.username+'</td></tr>';
                    
                    //console.log(val.username);

                })
                $("#userData").html(tr);

                // console.log(response);
            }
        })
    }

    function userData()
    {
          id = $("#id").val();
          //alert(id);
        $.ajax({
            url:'http://localhost/DBR/admin/notifications/userdata',
            dataType:'json',
            type:'POST',
            data:{'type':'edit','id':id},
            success: function(response)
            {
                console.log(response);
                var tr="";
                $.each(response, function(index, val)
                {  
                    console.log(val.username);
                    if(val.username==="undefined")
                    { }
                else{
                    check ='<input name="user_id[]" value="'+val.id+'" type="checkbox">';
             
            $.each(response.user_notif, function(index, userid)
                {       
                        if(userid.user_id==val.id)
                        {
                        check ='<input checked="checked" name="user_id[]" value="'+val.id+'" type="checkbox">';
                        }
                }) 

                    tr +='<tr><td width="10%"><div class="custom-checkbox">';
                    tr +=check+'<label></label></div></td>';
                    tr +='<td>'+val.username+'</td></tr>';
                    
                  }  //console.log(val.username);

                })
                $("#userData").html(tr);
            }
        })
    }
</script>
<div class="white-wrapper">
            <div class="page-head clearfix">
                <h2><img src="images/icon-pencil.png" width="28" height="29" alt=""> Add Notification</h2>
            </div>
            
            <div class="form add-notification-wrapper">
            <?=  $this->Form->create($notification,['type'=>'file','id'=>'user-registration']); ?>

                <div class="form-row">
                    <div class="label-field">Message:</div>
                    <div class="input-box">
                         <?= $this->Form->input('message',['class'=>'','label'=>false,'type'=>'textarea','rows'=>5,'cols'=>34]); ?>
                   

                  
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="label-field">Send To:</div>
                    <div style="display:inline-block; width:70%; position:relative; vertical-align:top;" class="add-notification-table">
                        <div class="notification-filter text-right">
                        <input id="username" type="text" class="input-field" style="width:40%; height:38px;" placeholder="User Name"> <input id="search" type="button" value="Search" class="btn"></div>
                      <table cellpadding="0" cellspacing="0" width="100%" class="table-grid">
                            <tr>
                                <th width="10%"><div class="custom-checkbox"><input id="checkAll" type="checkbox"><label></label></div></th>
                                <th>User Name</th>
                            </tr>
                        </table>
                      
                      <div class="used-printers">
                         <table cellpadding="0" cellspacing="0" width="100%" class="table-grid">
                        <tbody id="userData">
   
                        </tbody> 
                        </table>
                        </div>
                    </div>
                
                </div>
              
                
                <div class="form-buttons">
                    <input type="submit" class="btn" value="Save"> <a href="#" class="btn btn-cancel">Cancel</a>
                </div>
                </form> 
            </div>
            
        </div>



