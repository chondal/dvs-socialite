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

debemos configurar todas las redes sociales que queramos con sus respectivas apis, luego poner las credenciales en el service.php, todo esto como explica la documentacion de laravel/socialite.

Luego tenemos que publicar los archivos de configuracion de dvs-socialite y ahi autorizar las redes sociales que vamos a utilizar.

para cargar los links de logeo vamos a tener que poner en la vista donde queremos verlo, lo siguiente:
```php
{{ DvsSocialite::loadLinks() }}
```


## Contribuciones
El paquete aun se encuentra en desarrollo.


## License
[MIT](https://choosealicense.com/licenses/mit/)
