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
 * Clase modelo para la tabla seccion
 *
 */
class  seccion extends TablaModel
{

    /**
    * Este metod sera llamado cuando se este por crear la tabla seccion
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
        $this->Colum('id_seccion')->INT(11)->PrimaryKey()->autoincrement()->NotNull();
        $this->Colum('grado_seccion')->ENUM('Primero','Segundo','Tercero','Cuarto','Quinto','Sesto')->DefaultNull();
        $this->Colum('char_seccion')->VARCHAR(1)->DefaultNull();
        $this->Colum('id_docente')->INT(11)->NotNull();
        // Claves foraneas de la tabla 
        $this->ForeingKey('id_docente')->References('docentes','id_docente');
    }

    /**
    * Este metod sera llamado cuando se inicialize la tabla seccion
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
        $this->Insert(3,"Primero","A",23781625);
    }
}
