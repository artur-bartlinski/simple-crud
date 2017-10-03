<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnectionDb
 *
 * @author Artur
 */
class ConnectionDb {
    
    private $host;
    
    private $userName;
    
    private $password;
    
    private $dbName;
    
    private $connection;
    
    
    function __construct() {
        $this->host = "localhost";
        $this->userName = "redaktor";
        $this->password = "tajnehaslo";
        $this->dbName = "mywebsite";
        
        
    }
    
    function __destruct() {
        mysqli_close($this->connection);
    }
    
    function getHost() {
        return $this->host;
    }
    
    function getUserName() {
        return $this->userName;
    }
    
    function getPassword() {
        return $this->password;
    }
    
    function getDbName() {
        return $this->dbName;
    }
    
    function setCharset() {
        $query = "set names 'utf8'";
        mysqli_query($this->connection,$query);
    }
    
    function getConnection() {
        $this->connection = mysqli_connect($this->getHost(),$this->getUserName(),$this->getPassword(),$this->getDbName());
        
        $this->setCharset();
        
        if(mysqli_connect_error())
            echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
        else
            return $this->connection;
    }    
}

?>
