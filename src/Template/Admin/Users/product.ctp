        <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="images/icon-pencil.png" width="28" height="29" alt=""> Add Printer</h2>
            </div>
            
            <div class="form">
            	<div class="form-row">
                	<div class="label-field">Brand:</div>
                    <div class="input-box"><select class="input-field"><option>Please Select</option></select></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Product Name:</div>
                    <div class="input-box"><input type="text" class="input-field"></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Price per Unit Before GST (S$):</div>
                    <div class="input-box"><input type="text" class="input-field"></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Price per Unit Including GST (S$):</div>
                    <div class="input-box"><input type="text" class="input-field"></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Type:</div>
                    <div class="input-box"><select class="input-field"><option>Please Select</option></select></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Part No.:</div>
                    <div class="input-box"><input type="text" class="input-field"></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Color:</div>
                    <div class="input-box"><select class="input-field"><option>Please Select</option></select></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Cartridge Type:</div>
                    <div class="input-box"><select class="input-field"><option>Please Select</option></select></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Est. Yield:</div>
                    <div class="input-box"><input type="text" class="input-field small"> <select class="input-field est-yield-select"><option>Please Select</option></select></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Stock Qty:</div>
                    <div class="input-box"><input type="text" class="input-field"></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Inventory Availability:</div>
                    <div class="input-box"><select class="input-field"><option>Please Select</option></select></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Alias:</div>
                    <div class="input-box"><input type="text" class="input-field"></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Compatibility:</div>
                    <div class="input-box"><select class="input-field"><option>Please Select</option></select></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Dimensions (L x W x H):</div>
                    <div class="input-box dimensions"><input type="text" class="input-field small"> cm x <input type="text" class="input-field small"> cm x <input type="text" class="input-field small"> cm </div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Shipping Weight:</div>
                    <div class="input-box"><input type="text" class="input-field small"> <select class="input-field est-yield-select"><option>Please Select</option></select></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Warranty:</div>
                    <div class="input-box"><input type="text" class="input-field"></div>
                </div>
                
                <div class="form-row">
                	<div class="label-field">Keywords (separated by commas):</div>
                    <div class="input-box"><input type="text" class="input-field"></div> (max. 5 keywords)
                </div>
                
                <div class="form-row">
                	<div class="label-field">Image:</div>
                    <div class="input-box add-printer-image">
                    	<input type='file' onchange="readURL(this);" />
        				<img id="printer-image" src="images/img-add-printer-image.gif" alt="your image" />
                    </div>
                </div>
                
                <div class="form-row text-right">
                	<input type="submit" value="Add Printer" class="btn">	
                </div>
                
                
                <div class="used-printers-heading">Used on Printer(s):</div>
                
                <table cellpadding="0" cellspacing="0" width="100%" class="table-grid">
                	<tr>
                    	<th class="text-center" width="10%">No.</th>
                        <th width="10%">Tag</th>
                        <th width="10%">Brand</th>
                        <th width="50%">Printer Name</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </table>
                
                <div class="used-printers">
               	 <table cellpadding="0" cellspacing="0" width="100%" class="table-grid">
                	<tr>
                    	<td class="text-center" width="10%">1.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td width="10%">Canon</td>
                        <td width="50%">PIXMA iP2770 / iP2772</td>
                        <td width="10%" class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center">2.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center">3.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center">4.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center">5.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center" width="10%">6.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td width="10%">Canon</td>
                        <td width="50%">PIXMA iP2770 / iP2772</td>
                        <td width="10%" class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center">7.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center">8.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center">9.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                    <tr>
                    	<td class="text-center">10.</td>
                        <td width="10%"><div class="custom-checkbox"><input type="checkbox"><label></label></div></td>
                        <td>Canon</td>
                        <td>PIXMA iP2770 / iP2772</td>
                        <td class="actions text-center"><a href="#" class="edit"></a> <a href="#" class="delete"></a></td>
                    </tr>
                </table>
                </div>
                
                <div class="form-buttons">
                	<input type="submit" class="btn" value="Save">
			<a href="#" class="btn btn-cancel">Cancel</a>
                </div>
                
            </div>
            
        </div>
      <script src="js/jquery.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/jquery.jscrollpane.min.js"></script>  
        <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#printer-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
	
	
$(function()
{
	$('.used-printers').jScrollPane({
		showArrows:true,
		verticalDragMinHeight: 50,
		verticalDragMaxHeight: 50
		});
});
</script>