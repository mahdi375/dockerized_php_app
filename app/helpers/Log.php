<?php

class Log
{
    public static function write($message)
    {
        if(!is_string($message)) {
            $message = serialize($message);
        }

        $time = date("Y.d.m G:i:s");

        // $agent = $_SERVER['HTTP_USER_AGENT'];
        // exec('whoami', $output);
        // $user = $output[0];

        $log = "{$time} => {$message} \n";

        file_put_contents('../logs/request.log', $log, FILE_APPEND);
    }
}