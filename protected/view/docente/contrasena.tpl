<ol class="breadcrumb">
    <li><a href="">Inicio</a></li>

    <li class="active">Cambiar contraseña</li>
</ol>

<div class="container">
    <h1 class="header2 text-center">Cambiar Contraseña</h1>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            {form->Form class="form-control"}
            <ul>

                <li class="FormRow">
                    <label>Contraseña Anterior </label>
                    {form->Input name="pass"}
                </li>

                <li class="FormRow">
                    <label>Contraseña Nueva </label>
                    {form->Input name="pass1"}
                </li>
                <li class="FormRow">
                    <label>Repita la contraseña </label>
                    {form->Input name="pass2"}
                </li>


                <li class="FormRow text-center">{form->ButtonSubmit class="btn btn-success" value="<spam class='glyphicon glyphicon-send'></spam>Guardar"}</li>
            </ul>

            {/form->Form}


        </div>
        <div class="col-md-1 "></div>
    </div>



</div>