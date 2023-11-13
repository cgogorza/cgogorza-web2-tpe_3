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

Se utiliza el comando *GET*. Si los datos se obtuvieron correctamente se recibirá un mensaje (Status 200 OK).

2) Con el objetivo de visualizar una inscripción en particular se debe determinar el número de id
   de la inscripción correspondiente, que se determina en el atributo inscripcion_id. De esta manera, el endpoint correspondiente a la inscripción n° 15, quedaría escrito como:

   > localhost/web2/TPE_Tercera_Entrega/api/inscripciones/15
   
Se utiliza el comando GET. Si los datos se recibieron correctamente se recibirá un mensaje (Status 200 OK).
    
4) Para ordenar la presentación se utiliza el siguiente endpoint. En primer lugar, se determina cual es el parámetro que ordena **(?sort=)**. Abajo se ve como quedaría eligiendo el número de la inscripción, pero puede ordenarse usando cualquiera de los atributos de la base de datos. Posteriormente, se elije el orden que se desea **(orderBy)**. Puede ser ascendente (asc, como se puso abajo) o también (desc, descendente). Por otra parte, para paginar se debe informar el número de página inicial y final. En el ejemplo se indico mostrar desde página 1 a 3.

   > localhost/web2/TPE_Tercera_Entrega/api/inscripciones?sort=inscripcion_id&orderBy=asc&_page=1&_limit=3
   
Se utiliza el comando GET y los Query Params: sort y orderBy. Si los datos se obtuvieron correctamente se recibirá un mensaje (Status 200 OK). 

5) Para cambiar una inscripción se modifica alguno o todos de los siguientes espacios en formato de JSON en el body de Postman:

          "inscripcion_id": 21,
          "nombre": "Marcelo Leali",  
          "email": "marceloleali@gmail.com",  
          "objetivo": "Final",  
          "materia_id": 5,

Se utiliza el comando *PUT*. Si el cambio fue realizado correctamente se recibirá un mensaje (Status 200 OK):  
  
          "La inscripción con id= 21 ha sido modificada con éxito"

6) Con el objetivo de borrar una inscripción en particular se debe determinar el número de id de la inscrioción correspondiente, que se determina en el atributo inscripcion_id. De esta manera, el endpoint correspondiente a la inscripción n° 21, quedaría escrito como:  

   > localhost/web2/TPE_Tercera_Entrega/api/inscripciones/21

Se utiliza el comando *DELETE*. Si la inscripción fue borrada correctamente se recibirá un mensaje (Status 200 OK): 

         "Inscripción_id= 21 fue eliminada con éxito"

7) Para crear una inscripción se completan los siguientes espacios en el body de Postman:  

          "nombre": "",  
          "email": "",  
          "objetivo": "",  
          "materia_id": ,

Se utiliza el comando *POST*. Si la inscripción fue creada correctamente se recibirá un mensaje (Status 200 OK):  

         "La tarea fue insertada con el id = 45"

El id se determina automáticamente de acuerdo al orden que corresponda.

