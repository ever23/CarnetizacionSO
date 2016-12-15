<ol class="breadcrumb">
    <li ><a href="">Inicio</a></li>
    <li ><a href="estudiante/">Estudiantes</a></li>
    <li ><a href="estudiante/info?id_estu={$id_estu}">informacion</a></li>
    <li class="active">Carnet</li>
</ol>


<div class="container">
    <h1 class="text-center header2">Carnet Estudiantil
        <small><a href="{$dirPDf}" id="imprimir" target="_blank" class="glyphicon glyphicon-print btn btn-danger"></a></small> 
    </h1>
    <div  style="margin-left: auto;margin-right: auto;width: 490px;">
        <div id="carnet" style="border: 3px solid ; border-style: dashed; float: left; padding: 2px; width: 238px;">
            <img src="{$carnet}"  class="img-rounded">
        </div>
        <div id="carnet" style="border: 3px solid ; float: right; border-style: dashed;padding: 2px;  width: 238px;">
            <img src="{$backcarnet}"  class="img-rounded">
        </div>
    </div>

</div>