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
        return [
            'cedula_estu' => ['text', '', ['required' => true, 'pattern' => "^(\d{7,8})$", 'maxlength' => 8]],
            'nombres_estu' => ['text', '', ['required' => true]],
            'apellidos_estu' => ['text', '', ['required' => true]],
            'nacimiento_estu' => ['date', '', ['required' => true]],
            'sexo_estu' => ['select', '', ['required' => true, 'options' => $sexo]],
            'enfermedad_estu' => ['text', '', ['required' => false]],
            'discapacidad_estu' => ['text', '', ['required' => false]],
            'ingreso_estu' => ['date', '', ['required' => true]],
            'turno_estu' => ['Select', '', ['required' => true, 'options' => $turnos]],
            'grado_estu' => ['select', $seccion['grado_seccion'], ['required' => true, 'options' => $grados]],
            'seccion_estu' => ['text', $seccion['char_seccion'], ['required' => true, 'pattern' => "\S{1}"]],
            'id_repre' => ['text', '', ['required' => true, 'pattern' => "^(\d{7,8})$", 'maxlength' => 8]],
            'id_foto' => ['file', '', ['required' => false]],
        ];
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
        //echo 'hola<pre>', var_dump($this->_ValuesModel);
    }

}

class FormRepresentante extends FormModel
{

    public function campos()
    {

        return [
            'id_repre' => ['text', '', ['required' => true, 'pattern' => "^(\d{1,7}|\d{1,8})$", 'maxlength' => 8]],
            'nombres_repre' => ['text', '', ['required' => true]],
            'apellidos_repre' => ['text', '', ['required' => true]],
            'telefono_repre' => ['text', '', ValidTelf::CreateValid(['required' => true, 'placeholder' => '0400-1234-123'])],
        ];
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
        return [
            'id_docente' => ['text', '', ['required' => true, 'pattern' => "^(\d{1,7}|\d{1,8})$", 'maxlength' => 8]],
            'nombres_docente' => ['text', '', ['required' => true]],
            'apellidos_docente' => ['text', '', ['required' => true]],
            'sexo_docente' => ['select', '', ['required' => true, 'options' => $sexo]],
            'naci_docente' => ['date', '', ['required' => true]],
            'direccion' => ['text', '', ['required' => true]],
            'nomb_docente' => ['text', '', ['required' => true]],
            'pass' => ['password', '', ['required' => true]],
            'pass2' => ['password', '', ['required' => true]],
        ];
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
        return [
            'id_docente' => ['text', '', ['required' => FALSE, 'pattern' => "^(\d{1,7}|\d{1,8})$", 'maxlength' => 8]],
            'nombres_docente' => ['text', '', ['required' => true]],
            'apellidos_docente' => ['text', '', ['required' => true]],
            'sexo_docente' => ['select', '', ['required' => true, 'options' => $sexo]],
            'naci_docente' => ['date', '', ['required' => true]],
            'direccion' => ['text', '', ['required' => true]],
            'nomb_docente' => ['text', '', ['required' => true]],
        ];
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

        return [
            'pass' => ['password', '', ['required' => true]],
            'pass1' => ['password', '', ['required' => true]],
            'pass2' => ['password', '', ['required' => true]],
        ];
    }

    public function OnSubmit()
    {
        if ($this->valid && $this->pass1 != $this->pass2)
        {
            $this->valid = false;
        }
    }

}
