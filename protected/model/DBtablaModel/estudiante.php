<?php 

 /*
 * Copyright (C) 2017 Enyerber Franco
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace Cc\Mvc\TablaModel;

use Cc\Mvc\TablaModel;
 /*
 * Clase modelo para la tabla estudiante
 *
 */
class  estudiante extends TablaModel
{

    /**
    * Este metod sera llamado cuando se este por crear la tabla estudiante
    * Ejemplo del codigo 
    * <code>
    * <?php //Ejemplo del codigo 
    * $this->Colum('mi_campo')->PrimaryKey(); // UN CAMPO PARA LA TABLA
    * $this->Colum('mi_otro_campo')->VARCHAR(50); // OTRO CAMPO PARA LA TABLA
    * $this->ForeingKey('mi_campo')->References('mi_otra_tabla')->OnUpdate('CASCADE'); // UNA CLAVE FORANEA  
    * ?>
    * </code>
    */
    public function Create()
    {
        // Columnas de la tabla 
        $this->Colum('id_estu')->INT(11)->PrimaryKey()->autoincrement()->NotNull();
        $this->Colum('cedula_estu')->INT(11)->DefaultNull();
        $this->Colum('nombres_estu')->VARCHAR(50)->DefaultNull();
        $this->Colum('apellidos_estu')->VARCHAR(50)->DefaultNull();
        $this->Colum('nacimiento_estu')->DATE()->DefaultNull();
        $this->Colum('sexo_estu')->ENUM('masculinio','Femenino')->DefaultNull();
        $this->Colum('enfermedad_estu')->VARCHAR(250)->DefaultNull();
        $this->Colum('discapacidad_estu')->VARCHAR(1250)->DefaultNull();
        $this->Colum('ingreso_estu')->DATE()->DefaultNull();
        $this->Colum('id_repre')->INT(11)->NotNull();
        $this->Colum('id_foto')->INT(11)->NotNull();
        $this->Colum('id_seccion')->INT(11)->NotNull();
        $this->Colum('turno_estu')->ENUM('Mañana','Tarde')->DefaultNull();
        // Claves foraneas de la tabla 
        $this->ForeingKey('id_foto')->References('fotos','id_foto');
        $this->ForeingKey('id_repre')->References('representante','id_repre');
        $this->ForeingKey('id_seccion')->References('seccion','id_seccion');
    }

    /**
    * Este metod sera llamado cuando se inicialize la tabla estudiante
    * Ejemplo del codigo 
    * <code>
    * <?php //Ejemplo del codigo
    * $this->Insert('hola1','hola2');//insertando usando el formato de parametros
    * $this->Insert(['hola1','hola2']);//insertando usando el formato arrays simples
    * $this->Insert(['campo1'=>'hola1','campo2'=>'hola2']);//insertando usando el formato arrays asociativos o diccionario
    * ?>
    * </code>
    */
    public function Initialized()
    {
        $this->Insert(14,34253453,"guigiugiug","uigugu","2016-11-29","Femenino",NULL,NULL,"2016-11-29",56587587,17,3,"Mañana");
    }
}
