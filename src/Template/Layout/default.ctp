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

$cakeDescription = 'Vooders.com';

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

    <?= $this->Html->css('style.css') ?>
    <link rel="stylesheet" href="css/jquery.fileupload.css">
    <?= $this->Html->script('vendor/jquery.min') ?>
    <?= $this->Html->script('vendor/what-input.min') ?>
    <?= $this->Html->script('foundation') ?>
    <?= $this->Html->script('bootstrap') ?>
    
    <?= $this->Html->script('global') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    
    <?= $this->element('header') ?>
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <section class="container clearfix">
        
        <?= $this->fetch('content') ?>
        
    </section>
    <footer>
    </footer>
    <?= $this->Html->script('app') ?>
    <script src="js/vendor/jquery.ui.widget.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="js/jquery.fileupload.js"></script>
    <?= $this->Html->script('app-uploads') ?>
</body>
</html>
