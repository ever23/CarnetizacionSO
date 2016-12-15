<?php
/* Smarty version 3.1.30, created on 2016-12-13 11:54:42
  from "E:\www\CarnetizacionSO\protected\view\estudiante\ScanerQr.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584fd3727eb6c7_77478673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd259b1587385491659e1df19f84ca18d61ebee5' => 
    array (
      0 => 'E:\\www\\CarnetizacionSO\\protected\\view\\estudiante\\ScanerQr.tpl',
      1 => 1481626478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_584fd3727eb6c7_77478673 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="WebCodeCam-master/js/qrcodelib.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="WebCodeCam-master/js/WebCodeCam.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="src/js/ScanerQr.js"><?php echo '</script'; ?>
>
<link  rel='stylesheet' href='src/css/ScanerQr.css' media='screen'/>
<ol class="breadcrumb">
    <li ><a href="">Inicio</a></li>
    <li class="active">Verificar Carnet</li>
</ol>
<div class="container">
    <h1 class="text-center header2">
        Verificar Carnet</h1>
    <div id="QR-Code" class="container" style="width:100%">
        <div class="panel panel-primary">
            <div class="panel-heading" style="display: inline-block;width: 100%;">
                <h4 style="width:50%;float:left;">Escaner</h4>
                <div style="width:50%;float:right;margin-top: 5px;margin-bottom: 5px;text-align: right;">
                    <select id="cameraId" class="form-control" style="display: inline-block;width: auto;"></select>
                    <span id="cameraPlay" class="glyphicon glyphicon-play-circle btn btn-success"></span>
                </div>
            </div>
            <div class="panel-body row">
                <div class="col-md-6" style="text-align: center;">
                    <div class="well" style="position: relative;display: inline-block;">

                        <canvas id="laser-canvas" style="position: absolute;display: none;" width="300" height="240"></canvas>
                        <canvas id="qr-canvas" width="300" height="240"></canvas>
                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        <div id="laser"></div>
                    </div>

                </div>
                <div class="col-md-6" style="text-align: center;">
                    <div id="result" class="thumbnail">
                        <div class="well" style="position: relative;display: inline-block;">
                            <img id="scanned-img" src="" style="width: 280px"height="240">
                        </div>

                    </div>
                </div>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
    <div >
        <h2 class="text-center">Estudiante</h2>
        <div id="estu">

        </div>
    </div>

</div>
<?php }
}
