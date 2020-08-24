<?php

return [

    'path_user_model' => '\App\User',

    // activar jobs (hace falta crearlos)
    'job_success_login' => false,
    'job_success_register' => false,

    // registrar usuario si no se encuentra en la base?
    'register' => true,

    // rutas segun resultado logueo
    'url_success' => '/',
    'url_error' => '/login',

    // redes sociales habilitadas
    'socialsNetworks' => [
        'twitter',
        'google',
        'facebook',
        'github',
    ],

];
