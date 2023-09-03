<?php

spl_autoload_register(
    function ($className) {
        $path = './' . str_replace('\\', '/', $className) . '.php';
        if (file_exists($path)) {
            require_once $path;
            if (class_exists($className)) {
                return true;
            } else {
                throw new Exception("Class '$className' not found on '$path'");
            }
        } else {
            throw new Exception("The file '$path' That contains the definition '$className' does not exist");
        }
    }
);