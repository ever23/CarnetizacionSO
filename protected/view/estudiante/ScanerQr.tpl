<script type="text/javascript" src="WebCodeCam-master/js/qrcodelib.js"></script>
<script type="text/javascript" src="WebCodeCam-master/js/WebCodeCam.js"></script>
<script type="text/javascript" src="src/js/ScanerQr.js"></script>
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
