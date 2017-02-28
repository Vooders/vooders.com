<?php
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
    <?= $this->Html->css('foundation.css') ?>
    <?= $this->Html->css('foundation-rtl.css') ?>
    <?= $this->Html->css('foundation-flex.css') ?>
    <?= $this->Html->css('style.min.css') ?>

    <?= $this->Html->script('vendor/jquery.min') ?>
</head>
<body>
    <div id="react-container"></div>
    <div id="drop-down"></div>

    <?= $this->fetch('content') ?>

    <script src="/js/vendor/react/react.js"></script>
    <script src="/js/vendor/react/react-dom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.24/browser.min.js"></script>
</body>
</html>