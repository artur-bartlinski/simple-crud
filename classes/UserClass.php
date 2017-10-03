<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserClass
 *
 * @author Artur
 */
class UserClass {
    private $user_id;
    
    private $login;
    
    private $password;
    
    private $connection;
    
    function __construct($user_id,$login,$password,$connection) {
        $this->user_id = $user_id;
        $this->login = $login;
        $this->password = $password;
        $this->connection = $connection;
    }
    
    function getUserId() {
        return $this->user_id;
    }
    
    function getLogin() {
        return $this->login;
    }
    
    function getPassword() {
        return $this->password;
    }
    
    function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    
    function setLogin($login) {
       $this->login = $login; 
    }
    
    function setPassword($password) {
        $this->password = $password;
    }
    
    function userLogIn(){
        $query = "select u_id from users where username = '$this->login' and password = '$this->password'";
        
        $result = mysqli_query($this->connection, $query);
        
        $assoc = mysqli_fetch_assoc($result);
       
        $user_id = $assoc['u_id'];
        
        return $user_id;
                
        
    }
}

?>
