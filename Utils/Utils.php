<?php

namespace Utils;

class Utils{
    
    public static function deleteSession($name) {
        if(isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }


    public static function isAdmin() {
        if(!isset($_SESSION['admin'])) {
            header('Location: '. $_ENV['base_url']);

        }else{
            return true;
        }
    }


    public static function isIdentity() {
        if(!isset($_SESSION['identity'])) {
            header('Location: '.base_url);

        }else{
            return true;
        }
    }



}