# Sistema de Carnetizacion Para Escuela 
### Proyecto para la universidad 
Inscripcion de estudiantes, docentes y Representantes 
toma fotos con web cam y genera el carnet en una imagen o pdf con codigo Qr de seguridad 
tambien incluye un analizador de codigos Qr con la webcam para verfificar el carnet


## instalacion 
clona el repositorio y lego ejecuta en la consola y posicionate en el directorio donde clonaste y ejecuta
```sh
composer install --prefer-dist
```
El usuario y contraseña por defecto para el login del sistema es 

Usuario: root
Contraseña: 123456

## Migrar base de datos
El sistema funciona perfectamente con Sqlite, mysql, y posgresql anque por defecto esta con sqlite 
si desea cambiar de tipo de base de datos solo modifica el archivo [configuracion.php](protected/configuracion.php "configuracion") 
en la linea 11 solo cambia el include a Mysqli.php, posgres.php o Sqlite.php segun el tipo de base de datos que desees
una ves modificado  ejecuta en la consola 
```sh
php protected/Mvc.php Migracion:DatabaseFromModel
```
Nota: si elegiste  Mysqli.php o posgres.php tienes que crear antes de ejecutar el comando una base de datos con el nombre carnetizacionso

y listo 