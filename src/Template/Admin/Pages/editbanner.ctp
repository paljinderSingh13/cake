 <?php //print_r($banner); die; ?>
  <div class="white-wrapper">
<div class="form">
            	<div class="form-row">
     <?=  $this->Form->create('',['type'=>'file','id'=>'user-registration']); ?>

                	<div class="label-field v-top">Banner Image#1:</div>
                    	<div class="banner-image-container">
                        	<div class="banner-image" id="banner-image1">
                             <img style="width:100%;" alt="your image" src="/DBR/img/banner/<?= h($banner->page_banner1) ?>" id="printer-image"> 

                            </div>
                            <div class="banner-upload-button pull-right">
        <input type="file" name="page_banner1" id="banner-image1" onchange="readURL1(event)">
                            	<a href="#" class="btn">Change</a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                	<div class="label-field v-top">Banner Image#2:</div>
                    	<div class="banner-image-container">
                        	<div class="banner-image" id="banner-image2">
                             <img style="width:100%;" alt="your image" src="/DBR/img/banner/<?= h($banner->page_banner2) ?>" id="printer-image">  
                            

                            </div>
                            <div class="banner-upload-button pull-right">
                            	<input type="file" name="page_banner2" id="banner-image2" onchange="readURL2(event)">
                            	<a href="#" class="btn">Change</a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                	<div class="label-field v-top">Banner Image#3:</div>
                    	<div class="banner-image-container">
                        	<div class="banner-image" id="banner-image3">
                             
                              <img style="width:100%;" alt="your image" src="/DBR/img/banner/<?= h($banner->page_banner3) ?>" id="printer-image">    
                            </div>
                            <div class="banner-upload-button pull-right">
                            	<input type="file" name="page_banner3" id="banner-image3" onchange="readURL3(event)">
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