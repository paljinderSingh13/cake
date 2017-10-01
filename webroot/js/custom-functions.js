$(document).ready(function() {
	
	$( ".datepicker" ).datepicker();

	//________integer validation __________________//    

$(".integer").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
	
	$('.table-pagination li.active').wrapInner('<span></span>');
	
	$('.mobile-menu').click(function(){
		$('.nav').toggleClass('open');	
	})
	
	$('.message').delay(2000).fadeOut();

	$('.dashboard-table').jScrollPane({
        showArrows:true,
        verticalDragMinHeight: 50,
        verticalDragMaxHeight: 50
        });
	
	$('.table-grid').wrap('<div class="table-wrapper"></div>');

});  

function popup(type)
{    
    $("#name").val('');
   ntype = type.replace('_', ' ');
    $("#head").html(ntype);
    $("#types").val(type);
    $(".add-popup").colorbox({inline:true, width:'100%', maxWidth:500});
}
function removesetting(type)
{
   name =  $("#"+type).val();
var base_url = window.location.origin;
    $.ajax({
    url: base_url+'/DBR/admin/products/removesetting',
    type:"POST",
    dataType:"json",
    data:{'name':name , 'type': type},
    success: function(response)
    {
        $("#"+type).html('');
          $.each(response, function (key, value) {
        console.log(value.name);
        if(type=='brand' || type=='delivery_method' || type=='discount_type' )
        {  
        $("#"+type).append($("<option></option>").val(value.id).html(value.name));

        }
    else{
     $("#"+type).append($("<option></option>").val(value.name).html(value.name));
        }
     })
}})

}

function addsetting()
{
   type =  $("#types").val();
    if($("#name").val()!='')
    {
        name =  $("#name").val();
    }else{
        alert('name must be fill out!');
         return false;
    }
    var base_url = window.location.origin;

     $.ajax({
    url:base_url+'/DBR/admin/products/addsetting',
    type:"POST",
    dataType:"json",
    data:{'name':name , 'type': type},
    success: function(response)
    {
       // console.log(response);
$("#"+type).html('');
  $.each(response, function (key, value) {
console.log(value.name);

if(type=='brand' || type=='delivery_method' || type=='discount_type' )
        {  
        $("#"+type).append($("<option></option>").val(value.id).html(value.name));
$("#"+type).val(value.id);

        }
    else{
     $("#"+type).append($("<option></option>").val(value.name).html(value.name));
       $("#"+type).val(name);
        }


})

//$("#"+type).val(name);
$.colorbox.close();

    }
    })

}