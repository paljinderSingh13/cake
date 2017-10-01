<div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="images/icon-pencil.png" width="28" height="29" alt=""> Edit Banner</h2>
            </div>
            
            <div class="form">
             <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>
            <div class="form-row">
               <div class="label-field">Banner Image#1:</div>
               <div class="input-box add-printer-image">
               <input type="file" name="page_banner1" id="product_image" >
                <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
               </div>
            </div>
            <div class="form-row">
               <div class="label-field">Banner Image#2:</div>
               <div class="input-box add-printer-image">
               <input type="file" name="page_banner2" id="product_image" >
                <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
               </div>
            </div>
            <div class="form-row">
               <div class="label-field">Banner Image#3:</div>
               <div class="input-box add-printer-image">
               <input type="file" name="page_banner3" id="product_image" >
                <img alt="your image" src="/DBR/images/img-add-printer-image.gif" id="printer-image">
               </div>
            </div>
            	<div class="form-row">
                	<div class="label-field v-top">Banner Image#1:</div>
                    	<div class="banner-image-container">
                        	<div class="banner-image" id="banner-image1"></div>
                            <div class="banner-upload-button pull-right">
                            	<input type="file" id="banner-image1" onchange="readURL1(event)">
                            	<a href="#" class="btn">Change</a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                	<div class="label-field v-top">Banner Image#2:</div>
                    	<div class="banner-image-container">
                        	<div class="banner-image" id="banner-image2"></div>
                            <div class="banner-upload-button pull-right">
                            	<input type="file" id="banner-image2" onchange="readURL2(event)">
                            	<a href="#" class="btn">Change</a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                	<div class="label-field v-top">Banner Image#3:</div>
                    	<div class="banner-image-container">
                        	<div class="banner-image" id="banner-image3"></div>
                            <div class="banner-upload-button pull-right">
                            	<input type="file" id="banner-image3" onchange="readURL3(event)">
                            	<a href="#" class="btn">Change</a>
                            </div>
                        </div>
                    </div>
                    
                
                <div class="form-buttons">
                	<input type="submit" class="btn" value="Save"> <a href="#" class="btn btn-cancel">Cancel</a>
                </div>
                </form>
            </div>
            
        </div>