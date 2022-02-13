<?php

class Env
{
    public static function get($var, $default = null)
    {
        return $_ENV[$var] ?? $default;
        
        // $env = [                                    // for non dockerized servers
        //     'APP_NAME' => 'PHP SERVER',
        //     'DB_CONNECTION' => 'mysql',
        //     'DB_HOST' => 'localhost',
        //     'DB_PORT' => '3306',
        //     'DB_DATABASE' => 'docker_tu',
        //     'DB_USERNAME' => 'root',
        //     'DB_PASSWORD' => 'root'
        // ];
        // return $env[$var] ?? $default;
    }
}