
# Prueba Técnica Mundo

Prueba de conocimientos técnicos en Laravel y React, con MySQL.



## Instalación
Primero, hay que instalar la aplicación desde este github.

```bash
  git pull "el-link-a-este-repositorio"
```
Encontrarás dos carpetas, backend y frontend, separadas para el mejor manejo del proyecto.


## Despliegue

Para correr este proyecto, primero hay que configurar las variables de ambiente, y después hay que generar la base de datos.

### Variables de entorno

Para correr este proyecto, en la carpeta de backend ubicar el archivo .env, y buscar y editar las siguientes líneas:

```code
    DB_CONNECTION=mysql
    DB_HOST=""
    DB_PORT=""
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
```
...donde debes editar tus datos de conexión a la BDD que deseas utilizar.

### Generar Base de datos MySQL con Laravel

Posteriormente, debes abrir consola en esta misma carpeta y escribir las siguientes líneas de código de forma consecutiva:

```bash
  php artisan migrate
  php artisan db:seed
```
### Despliegue Backend Laravel

Con esto, podrás levantar la api con el siguiente comando en consola:

```bash
  php artisan serve
```

...y la aplicación estará corriendo en http://localhost:8000/api/
Si quieres acceder a los dispositivos de inmediato con Postman o Insomnia, puedes acceder al: http://localhost:8000/api/dispositivos

### Despliegue Aplicación React

Después de tener el backend listo, hay que asegurarse de tener lo necesario para correr la aplicación. Para acceder, debes hacerlo por consola y escribir:

```bash
  cd /backend/react-app
```

Y posteriormente, una vez dentro de la carpeta, en consola escribir lo siguiente para instalar las dependencias necesarias:

```bash
  npm install
```

Una vez que se hayan instalado las dependencias, puedes comenzar la aplicación, con el backend también corriendo de fondo. Lo puedes hacer de la siguiente forma:

```bash
  npm run dev
```

Y podrás acceder a la aplicación a través de http://localhost:5173/, o a través del puerto configurado por tu parte.


Eso es todo, nos vemos en la próxima.

