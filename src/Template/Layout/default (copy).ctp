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
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('dbr-admin.css') ?>
    <?= $this->Html->css('dbr-styles.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->script(['jquery.min', 'custom-functions', 'html5shiv.min','respond.min']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                
                <?php if($this->request->session()->read('Auth.User.id')>0){ ?>
                <li><?php echo $this->Html->link(
                             'Logout',
                        '/admin/users/logout',
                      ['class' => 'button']
                    );  ?></li>                                                                                                                                                                                                                                                                                                                      </a></li>
                <?php }else{ ?>
                 <li><?php echo $this->Html->link(
                        'Login',
                        '/admin/users/login',
                        ['class' => 'button']
                    );  ?></li>
                <li><?php echo $this->Html->link(
                        'Register',
                        '/admin/users/registration',
                       ['class' => 'button']
                     );  ?> </li>   
                <?php } ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
