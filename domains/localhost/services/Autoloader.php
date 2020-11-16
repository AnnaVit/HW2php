<?php

namespace services;

class Autoloader
{

public function loadClass(string $classname)
{   
    
    
    $path = realpath($_SERVER['DOCUMENT_ROOT'] . "/{$classname}.php");
    
        if(file_exists($path)){
            require $path;
            return true;
        }else{
            return false;
        }

    }

public function hwLoadClass(string $classname)

{
    $path = realpath($_SERVER['DOCUMENT_ROOT'] . "/../{$classname}.php");
    
        if(file_exists($path)){
            require $path;
            return true;
        }else{
            return false;
        }

    }


}
