<?php require 'Buffer/Buffer.php'; ?>
<?php define('ROOT', dirname(__FILE__)); ?>
<?php $Buffer = new Buffer('../HotHotHotMVC/tmp',1); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/scriptHot.js"></script>
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Documentation</title>

</head>
    <body class="documentation">
    <?php View::show('base/header'); ?>
        <section class="docpage">
            <?php $Buffer->inc('../HotHotHotMVC/View/FAQ.php'); ?>
            <?php
            //if(!$variable = $Buffer->readBuffer('variable.txt')){
              //  $variable = "test cache";
                //$Buffer->writeBuffer('variable.txt', $variable);
            //}
            ?>


            <p><?//= $variable; ?></p>
        </section>
    <?php View::show('base/footer'); ?>
    </body>

</html>