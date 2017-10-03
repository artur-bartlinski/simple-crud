<?php

    session_start();

    include_once '../autoload.php';
    include_once '../language.php';
    
    $lang = chooseLanguage();
    
    $_SESSION['navigation'] = "index.php";
    $title=TITLE_HOME;
    include_once 'header.php';

    
    if(isset($_POST['login']) && isset($_POST['password'])) {
        if(empty($_POST['login']))
            echo '<script>alert("Pole login jest puste!")
                document.location.href="index.php"</script>';
        elseif(empty($_POST['password']))
            echo '<script>alert("Pole haslo jest puste!")
                document.location.href="index.php"</script>';
        else {
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $connection = new ConnectionDb();
            $user = new UserClass(null,$login,$password,$connection->getConnection());
            
            $userLogIn = $user->userLogIn();
            
            if($userLogIn) {
                $_SESSION['user'] = $userLogIn;
                header('Location: http://myownwebsite.local/admin/index.php');
                echo "<h1>Witaj w panelu administracyjnym! Jesteś zalogowany jako <b>$login</b></h1>";
            } else {
                echo '<p>Login failed! Please check your username and password!</p>';
                
            }
                  
            
        }
    }
    if(!isset($_SESSION['user']))
        echo '<form name="admin" action="index.php" method="post">
            Login<input type="text" name="login"><br>
            Password<input type="password" name="password"><br>
            <input type="submit" name="submit" value="Log in"><br>    
            </form>';
    
    
include_once "footer.php";
    ?>



