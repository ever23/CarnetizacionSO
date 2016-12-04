<!doctype html>
<html>
    <head>
        {$this->GetContenHead()}
        <script  src='src/js/jquery-3.1.0.min.js' type='text/javascript'></script>
        <script  src='src/js/bootstrap.min.js' type='text/javascript'></script>
        <link  rel='stylesheet' href='src/css/bootstrap.min.css' media='screen'/>
        <link  rel='stylesheet' href='src/css/styles.css' media='screen'/>
        <!--[if lt IE 9]>
            <script src="src/js/html5.js"></script>
        <![endif]-->
        <!--[if IE]>
             <script src="src/js/html5shiv.js"></script>
        <![endif]-->
        <script type="text/javascript">
            $(window).on('load', function () {
                $('#cargando').fadeOut();
            });

        </script>
    </head>
    <body>
        <header class="navbar navbar-default  shadow" > 
            <img src="src/images/logo_unefa.png" class="pull-left" style="margin-left: 100px;">
            <img src="src/images/escuela.jpg" width="59" height="80" class="pull-right" style="margin-right: 100px;">
            <h1 class="text-center">Sistema de Carnetización Safe Off</h1> 
        </header>
        <div class=" main_conten">
            <div id="cargando"></div>
            <div class="container"> 
                {if $this->errores}
                    <small>
                        <div  class='alert text-center alert-danger' role='alert'>
                            <span  class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>
                            {$this->errores}</div></small>
                        {/if}
                        {if !empty($mensaje)}
                    <small>
                        <div  class='alert text-center alert-info' role='alert'>
                            <span  class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
                            {$mensaje}</div></small>
                        {/if}
                <!--  contenido proveniente de el controlador y los views  -->

                {$content}
            </div>
        </div> 
        <div class="page-header"></div>
        <footer style="margin: 0px; padding-left: 20px; padding-right: 25px;" class="text-center"> 
            <div class="row">
                <div class="col-md-4">
                    {if !empty($session)}
                        {if $session->IsUser()}
                            Hola {$session.nombres_docente} Deseas<br> 
                            <div class="btn-group">
                                <a href="docente/CambiarContrasena" class="btn btn-info">
                                    Cambia la contraseña
                                </a>
                                <a href="user/close" class="btn btn-danger">
                                    Cerrar session
                                </a>
                            </div>
                        {/if}
                    {/if}
                </div>
                <div class="col-md-4 text-center">
                    &COPY; Grupo Escolar Diego Bustilos.
                    Todos los derechos reservados (Grupo Unefa).
                    2016
                </div>
                <div class="col-md-4">


                </div>
            </div>
            <div class="text-center"></div>
        </footer>
    </body>
</html>


