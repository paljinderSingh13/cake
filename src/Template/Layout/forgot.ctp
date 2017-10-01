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
    <?= $this->Html->script(['jquery.min', 'custom-functions', 'html5shiv.min','respond.min']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

 <?= $this->Flash->render() ?>

<section class="login-wrapper forgot-password">
    <div class="login-logo"><img src="../../images/img-login-logo.png" alt="DBR Systems"></div>

  	
    <div class="back-to-login">
    	
         <?= $this->Html->link(__('Back to Login'), ['controller'=>'users' , 'action' => 'login'],['class' => 'logout']); ?>  
    </div>
    
    <div class="login-top"><img src="images/img-login-top.png" alt=""></div>
	
    <article class="login-box">
    	<div class="form-row">
        	<input type="text" placeholder="Email Address" class="input-filed">
        </div>
    </article>
    
    <div class="login-shadow"><img src="images/img-login-box-shadow.png"  alt=""></div>
    
    <div class="login-button">
    	<input type="submit" value="Submit">
    </div>
</section>

</body>
</html>
