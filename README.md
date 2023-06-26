# CA Conv - Dineo
Crear interfaz usuario html/js/css donde el usuario puede ver su información financiera y editar sus datos de usuario.
Backend en Symfony 6. 

# Entornos
- PHP 8.3
- Symfony 6.3.
- Docker

# Instalación
Linux:
```
cd docker
./install.sh
./docker-up.sh
```
Windows:
```
cd docker
install.bat
docker-up.sh
```
- Instala todo lo necesario para funcionar, incluido fixtures de datos mínimos para poder comprobar toda la funcionalidad de la App, incluyendo usuario admin, con password 12345678.
Se instala tanto para dev, como para test.
El segundo comando levanta tanto frontend, como backend.
```
make install
make serve
```

# Tests unitarios
(dentro de docker)
`php ./vendor/bin/phpunit`

# Comprobar aplicación
Muestra frontend y backend en Symfony
`http://127.0.0.1:8082/`

Muestra frontend en apache.
`http://127.0.0.1:80/`

# Observaciones
Para llevar a cabo los requisitos demandados, se ha creado un backend + frontend en symfony, para mostrar el modo de funcionamiento con Symfony en frontend y backend, mediante Twig y formularios nativos de Symfony.
Sin embargo, para cumplir con la arquitectura hexagonal, donde backend y frontend han de estar en servicios separados dentro del mismo stack, se ha creado en html/Jquery/Css un SPA que hace llamadas autenticadas a la API de Symfony, de forma que se muestran los datos financieros del usuario, así como el formulario de edición de datos de perfil.
Se ha optado por realizar este SPA en código puro, en lugar de usar React, porque considero que demostrar entender los principios de SPA y de lógica de llamadas a APIs en backend (con toda su problemática como CORS, auythenticación, propagación tokens, orden de llamadas iniciales (bootstrap), etc.), demuestra de mejor manera la comprensión de cualquier framework como React o Angular.

Se ha implementado mediante el bundle easyadmin un backoffice para la gestión CRUD de las entidades, esto solo es accesible por el usuario con rol de administrador.
Al instalar la App, siguiendo los pasos mencionados anteriormente, se ha creado el usuario admin con password 12345678, que permitirá el acceso a este backoffice de administración.
`http://127.0.0.1:8082/admin/`

Sobre los principios SOLID y testings, en los requisitos de esta App no se encuentra mucha lógica de negocio para el dominio de la aplicación, como podría haber sido el algoritmo que determina el producto a recomendar al cliente. Por ello, no se ha podido demostrar mucho en este aspecto, tanto en el código como en los tests.

No se ha requerido, pero sería importante también el uso de Swagger para documentar las APIs.
Igualmente sería importante usar phpstan y cs-fixed
