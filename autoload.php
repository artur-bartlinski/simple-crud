<?php
    
    function firstAutoloader($className) {
        if(strpos($className, 'Connection') !== false) {
            require("model/" . $className . ".php");
            return true;
        }
        return false;
    }
    
    function secondAutoloader($className) {
        if(strpos($className, 'Class') !== false) {
            require("classes/" . $className . ".php");
            return true;
        }
        return false;
    }
    
    spl_autoload_register("firstAutoloader");
    spl_autoload_register("secondAutoloader");

?>
