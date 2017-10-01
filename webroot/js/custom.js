$( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true
         
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true
        
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );

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
     $("#"+type).append($("<option></option>").val(value.name).html(value.name));
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
$("#"+type).append($("<option></option>").val(value.name).html(value.name));

})

$("#"+type).val(name);
$.colorbox.close();

    }
    })

}
