<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Ignored Files
    |--------------------------------------------------------------------------
    |
    | Maneuver will check .gitignore for ignore files, but you can conveniently
    | add here additional files to be ignored.
    |
    */
    'ignored' => array(),

    /*
    |--------------------------------------------------------------------------
    | Default server
    |--------------------------------------------------------------------------
    |
    | Default server to deploy to when running 'deploy' without any arguments.
    | If this options isn't set, deployment will be run to all servers.
    |
    */
    'default' => 'production',

    /*
    |--------------------------------------------------------------------------
    | Connections List
    |--------------------------------------------------------------------------
    |
    | Servers available for deployment. Specify one or more connections, such
    | as: 'deployment', 'production', 'stating'; each with its own credentials.
    |
    */

    'connections' => array(

        'development' => array(
            'host'      => 'yourdevserver.com',
            'username'  => 'user',
            'password'  => 'myawesomepass',
            'path'      => '/path/to/server/',
            'port'      => 21,
            'passive'   => true
        ),

        'production' => array(
            'host'      => 'auto-ecole-porchet.ch',
            'username'  => 'sys_auto-eco',
            'password'  => 'jigi7phes0ze6va',
            'path'      => '/web/eleves/',
            'port'      => 21,
            'passive'   => true
        ),

    ),

);