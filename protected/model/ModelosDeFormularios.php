<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cc\Mvc;

use Cc\Mvc;

class FormEstudiante extends FormModel
{

    public function campos()
    {
        $estudiante = Mvc::App()->DataBase()->Tab('estudiante');
        $secciones = Mvc::App()->DataBase()->Tab('seccion');
        $turnos = $estudiante->GetValuesEnum('turno_estu');
        $secciones->Select("id_docente='" . Mvc::App()->Session['id_docente'] . "'");
        $seccion = ['grado_seccion' => '', 'char_seccion' => ''];
        if ($secciones->num_rows == 1)
        {
            $seccion = $secciones->fetch();
        }
        $grados = $secciones->GetValuesEnum('grado_seccion');

        // $grados = $estudiante->GetValuesEnum('grado_estu');
        $sexo = $estudiante->GetValuesEnum('sexo_estu');
        $this->text('cedula_estu')->Validator("required|maxlength:8|pattern:^(\d{7,8})$");
        $this->text('nombres_estu')->Validator("required");
        $this->text('apellidos_estu')->Validator("required");
        $this->date('nacimiento_estu')->Validator("required");
        $this->text('sexo_estu')->Validator("required")->type('select')->in_options($sexo);
        $this->text('enfermedad_estu');
        $this->text('discapacidad_estu');
        $this->date('ingreso_estu')->Validator("required");
        $this->text('turno_estu')->Validator("required")->type('select')->in_options($turnos);
        $this->text('grado_estu')->Validator("required")->type('select')->DefaultValue($seccion['grado_seccion'])->in_options($grados);
        $this->text('seccion_estu')->Validator("required|pattern:\S{1}")->DefaultValue($seccion['char_seccion']);
        $this->text('id_repre')->Validator("required|pattern:^(\d{7,8})$|maxlength:8");
        $this->file('id_foto');
    }

    public function OnSubmit()
    {
        $this->id_estu = 'NULL';
        $this->id_docente = Mvc::App()->Session['id_docente'];
        if (trim($this->discapacidad_estu) == '')
        {
            unset($this->discapacidad_estu);
        }
        if (trim($this->enfermedad_estu) == '')
        {
            unset($this->enfermedad_estu);
        }
        //$form['id_docente']
        // echo 'hola<pre>', var_dump($this->_ValuesModel);
    }

}

class FormRepresentante extends FormModel
{

    public function campos()
    {
        $this->text('id_repre')->Validator("required|maxlength:8")->pattern("^(\d{1,7}|\d{1,8})$");
        $this->text('nombres_repre')->Validator("required");
        $this->text('apellidos_repre')->Validator("required");
        $this->tel('telefono_repre')->Validator("required|placeholder:0400-1234-123");
    }

    public function OnSubmit()
    {
        
    }

}

class FormDocente extends FormModel
{

    public function campos()
    {
        $docentes = Mvc::App()->DataBase()->Tab('docentes');
        $sexo = $docentes->GetValuesEnum('sexo_docente');
        $this->text('id_docente')->Validator("required|maxlength:8")->pattern("^(\d{1,7}|\d{1,8})$");
        $this->text('nombres_docente')->Validator("required");
        $this->text('apellidos_docente')->Validator("required");
        $this->text('sexo_docente')->Validator("required")->type('select')->in_options($sexo);
        $this->date('naci_docente')->Validator("required");
        $this->text('direccion')->Validator("required");
        $this->text('nomb_docente')->Validator("required");
        $this->text('pass')->Validator("required")->type('password');
        $this->text('pass2')->Validator("required")->type('password');
    }

    public function OnSubmit()
    {
        if ($this->valid && $this->pass != $this->pass2)
        {
            $this->valid = false;
        }
        $this->hash_docente = $this->pass;
        unset($this->pass2, $this->pass);
    }

}

class FormDocenteEditar extends FormModel
{

    public function campos()
    {
        $docentes = Mvc::App()->DataBase()->Tab('docentes');
        $sexo = $docentes->GetValuesEnum('sexo_docente');
        $this->text('id_docente')->Validator("maxlength:8")->pattern("^(\d{1,7}|\d{1,8})$");
        $this->text('nombres_docente')->Validator("required");
        $this->text('apellidos_docente')->Validator("required");
        $this->text('sexo_docente')->Validator("required")->type('select')->in_options($sexo);
        $this->date('naci_docente')->Validator("required");
        $this->text('direccion')->Validator("required");
        $this->text('nomb_docente')->Validator("required");
    }

    public function OnSubmit()
    {
        unset($this->id_docente);
    }

}

class FormDocenteEditarContrasena extends FormModel
{

    public function campos()
    {
        $this->text('pass')->Validator("required")->type('password');
        $this->text('pass1')->Validator("required")->type('password');
        $this->text('pass2')->Validator("required")->type('password');
    }

    public function OnSubmit()
    {
        if ($this->valid && $this->pass1 != $this->pass2)
        {
            $this->valid = false;
        }
    }

}
