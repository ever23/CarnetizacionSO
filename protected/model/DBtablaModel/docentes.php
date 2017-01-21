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
 * Clase modelo para la tabla docentes
 *
 */
class  docentes extends TablaModel
{

    /**
    * Este metod sera llamado cuando se este por crear la tabla docentes
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
        $this->Colum('id_docente')->INT(11)->PrimaryKey()->NotNull();
        $this->Colum('nombres_docente')->VARCHAR(100)->DefaultNull();
        $this->Colum('apellidos_docente')->VARCHAR(100)->DefaultNull();
        $this->Colum('naci_docente')->DATE()->DefaultNull();
        $this->Colum('sexo_docente')->ENUM('masculinio','Femenino')->DefaultNull();
        $this->Colum('direccion')->TEXT()->DefaultNull();
        $this->Colum('nomb_docente')->VARCHAR(45)->DefaultNull();
        $this->Colum('hash_docente')->VARCHAR(255)->DefaultNull();
        $this->Colum('type_user')->ENUM('docente','root')->NotNull()->DefaultValue('docente');
    }

    /**
    * Este metod sera llamado cuando se inicialize la tabla docentes
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
        $this->Insert(23781625,"root","root","2016-11-26","masculinio"," ","root","\$2y\$09\$V9WuDBR.utyeFRjArdekauBUE.2wjt1P3F4yA840P4v6A/O6nFayy","root");
    }
}
