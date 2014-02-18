<<<<<<< HEAD
<?php
$path = 'assets/extensions/Xadmin/'
$headerBlock = <<<HDR
    <link rel="stylesheet" type="text/css" href="/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../demo.css">
    <script type="text/javascript" src="../../jquery.min.js"></script>
    <script type="text/javascript" src="../../jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../../locale/easyui-lang-ru.js"></script>
HDR;
=======
<?php
$path = 'assets/extensions/Xadmin/'
$headerBlock = <<<HDR
    <link rel="stylesheet" type="text/css" href="/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="../../themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../demo.css">
    <script type="text/javascript" src="../../jquery.min.js"></script>
    <script type="text/javascript" src="../../jquery.easyui.min.js"></script>
HDR;
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
$modx->regClientStartupHTMLBlock($headerBlock);