<?php

namespace app\services;

class Autoloader
{

    public $expansion = '.php';

    public function loadClass(string $classname)
    {   
        $path =  realpath(
            (str_replace('app\\', ROOT_DIR, $classname)) 
            . $this->expansion);

            if(file_exists($path)){
                require $path;
                return true;
            }else{
                return false;
            }

        }



}
