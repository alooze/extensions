<?php
$path = 'assets/extensions/Xadmin/assets';
$headerBlock = <<<HDR
    <link rel="stylesheet" type="text/css" href="{$path}/js/themes/gray/easyui.css">
    <link rel="stylesheet" type="text/css" href="{$path}/js/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="{$path}/js/demo/demo.css">
    <script type="text/javascript" src="{$path}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{$path}/js/jquery.easyui.min.js"></script>
HDR;
$modx->regClientStartupHTMLBlock($headerBlock);