<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'DBR Systems';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('dbr-admin.css') ?>
    <?= $this->Html->script(['jquery.min', 'custom-functions', 'html5shiv.min','respond.min','jquery.jscrollpane.min','jquery.mousewheel','jquery-ui','jquery.colorbox']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>  
<section class="admin-wrapper">
	<div class="admin-header clearfix">
    	<p class="admin-logo"><a href="http://sgappstore.com/DBR/admin/dashboards"><img src="<?php echo $this->Url->build('/'); ?>images/img-admin-logo.png" alt=""></a></p>	
        <p class="admin-logout"><strong>
			<?php 
					if($this->request->Session()->read('Auth.User.id')>0){
			echo ucfirst($this->request->Session()->read('Auth.User.username'));
					}
			 ?>
		</strong> &nbsp;|&nbsp;
        <?= $this->Html->link(__('Logout'), ['controller'=>'users' , 'action' => 'logout'],['class' => 'logout']); ?>  
        </p>
    </div>
     
  <article class="content-wrapper">
   	 <?= $this->Flash->render() ?>
		<?php
			 echo $this->element('/Admin/nav-menu');
		?>
        <?= $this->fetch('content') ?>
  </article>
</section> 
</body>
</html>




    
