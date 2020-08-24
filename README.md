# DVS-SOCIALITE

Implementacion del paquete socialite en proyectos DVS para implementar login con redes sociales.

## Instalacion

Primero debemos instalar laravel/socialite.

```bash
composer require laravel/socialite
```
Luego vamos a instalar el paquete dvs.
```bash
composer require chondal/dvs-socialite
```

## Como usarlo.

debemos configurar todas las redes sociales que queramos con sus respectivas apis, luego poner las credenciales en el service.php, todo esto como explica la documentacion de laravel/socialite poniendo las credenciales en el archivo services.php.

Publicar archivos del paquete con vendor:publish

dvs-socialite-config (recomendado)
dvs-socialite-views (opcional)
dvs-socialite-assets (opcional)


para cargar los links de logeo vamos a tener que poner en la vista donde queremos verlo, lo siguiente:
```php
{{ DvsSocialite::loadLinks() }}
```
para cargar los css de los botones, tenemos que poner en el header esto:
```php
{{ DvsSocialite::css() }}
```


## Información Extra
En caso de querer ejecutar tareas extras al loguear o registrar, se pueden crear los jobs SocialLoginJob y SocialRegisterJob en su aplicación y habilitar el llamado de los mismos en la configuracion del paquete, por defecto vienen con estado "false"

## Contribuciones
El paquete aun se encuentra en desarrollo.


## License
[MIT](https://choosealicense.com/licenses/mit/)
