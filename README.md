# web2-tpe_3

# Trabajo: Búsqueda de compañero de estudio
(proyecto en desarrollo)

   ## Autores: Claudia Gogorza y Franco Almenta

##  Datos de Contacto:  ##
Claudia Gogorza (DNI: 17468843)  
e-mail: claudiagogorza65@gmail.com  
Franco Almenta (DNI: 46009840)  
e-mail: Francoalmenta@gmail.com  
## Resumen del Proyecto: ##  
El objetivo de este proyecto consiste en la realización de una Base de Datos que permita almacenar 
los registros de los alumnos de la carrera TUDAI que estén buscando un compañero para estudiar.  
A continuación se enumeran los diferentes endpoints con los que se acceden a las diferentes utilidades de la base de datos: 
1) El endpoint que se debe utilizar para poder visualizar la lista de **Inscripciones** es:  
   > localhost/web2/TPE_Tercera_Entrega/api/inscripciones

2) Con el objetivo de visualizar una inscripción en particular se debe determinar el número de id
   de la inscrioción correspondiente, que se determina en el atributo inscripcion_id. De esta manera, el endpoint correspondiente a la inscripción n° 15, quedaría escrito como:
   > localhost/web2/TPE_Tercera_Entrega/api/inscripciones/15
3) Para ordenar la presentación se utiliza el siguiente endpoint. En primer lugar, se determina cual es el parámetro que ordena **(?sort=)**. Abajo se ve como quedaría eligiendo
   el número de la inscripción, pero puede ordenarse usando cualquiera de los atributos de la base de datos. Posteriormente, se elije el orden que se desea. Puede ser ascendente (asc, como se puso abajo) o también (desc, descendente):
   > localhost/web2/TPE_Tercera_Entrega/api/inscripciones/?sort=inscripcion_id&orderBy=asc
