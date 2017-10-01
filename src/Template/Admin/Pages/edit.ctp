    <?php echo $this->Html->script('tinymce/tinymce.min.js');?>
<script type="text/javascript">
	tinyMCE.init({
         height : "250",
         width:"300",
		mode : "textareas",		
        theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
    
    
        <div class="white-wrapper">
        	<div class="page-head clearfix">
            	<h2><img src="<?php echo $this->Url->build('/');?>images/icon-pencil.png" width="28" height="29" alt=""> Edit Page</h2>
            </div>
            <div class="form">
			
 <?=  $this->Form->create($page,['type'=>'file','id'=>'addition-page']); ?>
                <div class="form-row">
                	<div class="label-field" style="float:left;"></div>
                    <div class="input-box">
                    <?= $this->Form->input('page_title',['class'=>'input-field','label'=>false,'value'=>$page->page_title,'readonly' => 'readonly']); ?>
                   </div>
                </div>
                
                <div class="form-row">
      <?php echo $this->Form->input('page_status',array('label'=>false,'type'=>'hidden','value'=>1)); ?>      
 <?php echo $this->Form->input('page_description',array('label'=>false,'type'=>'textarea','class'=>'ckeditor')); ?>
                   
                </div>
                 
                <div class="form-buttons">
                    <?= $this->Form->input('Save',['type'=>'submit','class'=>'btn']); ?>
			<a href="<?php //echo $this->build->url('/pages/index');?>" class="btn btn-cancel">Cancel</a>
                </div>
                
            </div>
             
    <?= $this->Form->end() ?>
    </div>
        </div>
      