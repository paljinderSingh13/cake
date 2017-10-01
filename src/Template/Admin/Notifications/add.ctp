    
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




$(".submit").click(function(e)
    {

    checked = $("input[type=checkbox]:checked").length;

    if(!checked) {
    alert("You must check at least one User checkbox.");
    return false;
    }
});




      
        userData();
        $("#search").click(userSearch);
        });

    function userSearch()
    {  username = $("#username").val();
        $.ajax({
            url:'usersearch',
            dataType:'json',
            type:'POST',
            data:{'username':username},
            success:function(response)
            {
                console.log(response);
                var tr;
                $.each(response, function(index, val)
                {
                    tr +='<tr><td width="10%"><div class="custom-checkbox">';
                    tr +='<input name="user_id[]" value="'+val.id+'" type="checkbox"><label></label></div></td>';
                    tr +='<td>'+val.username+'</td></tr>';
                    
                    //console.log(val.username);

                })
                $("#userData").html(tr);

                console.log(response);
            }
        })
    }

    function userData()
    {
           
        $.ajax({
            url:'userdata',
            dataType:'json',
            type:'POST',
            success: function(response)
            {
                console.log(response);
                var tr;
                $.each(response, function(index, val)
                {
                    tr +='<tr><td width="10%"><div class="custom-checkbox">';
                    tr +='<input name="user_id[]" value="'+val.id+'" type="checkbox"><label></label></div></td>';
                    tr +='<td>'+val.username+'</td></tr>';
                    
                    //console.log(val.username);

                })
                $("#userData").html(tr);
				$('.used-printers').jScrollPane({
					showArrows:true,
					verticalDragMinHeight: 50,
					verticalDragMaxHeight: 50
					});
            }
        })
    }
</script>
<style>
.form-row .input-field{margin-right:10px; display:inline-block; vertical-align:middle; border-radius:4px;}
</style>
<div class="white-wrapper">
    <div class="page-head clearfix">
        <h2><img src="/DBR/images/icon-add.png" alt=""> Add Notification</h2>
    </div>

    <div class="form add-notification-wrapper">
        <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>

        <div class="form-row">
            <div class="label-field v-top">Message:</div>
            <div class="input-box">
             <?= $this->Form->input('message',['class'=>'input-field','label'=>false,'type'=>'textarea','rows'=>5,'cols'=>34]); ?>


             <!--  <textarea class="input-field"></textarea> -->
         </div>
     </div>

     <div class="form-row">
        <div class="label-field">Send To:</div>
        <div style="display:inline-block; width:70%; position:relative; vertical-align:top;" class="add-notification-table">
            <div class="notification-filter text-right"><input id="username" type="text" class="input-field" style="width:40%; height:36px;"  placeholder="User Name"> <input id="search" type="button"  value="Search" class="btn"></div>
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
    <input type="submit" class="btn submit" value="Save"> <a href="index" class="btn btn-cancel">Cancel</a>
</div>
</form> 
</div>

</div>


