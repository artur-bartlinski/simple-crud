<?php

    include_once 'language.php';
    
    $lang = chooseLanguage();
    $title=TITLE_CONTACT;
    $_SESSION['navigation']='contact.php';
    include_once 'header.php';
    
    
    
    if(isset($_POST['name'])){
        if(empty($_POST['name']))
        {
          echo '<script>alert("Pole name jest puste");
              document.location.href="contact.php";</script>'; 
        }elseif(empty($_POST['email'])) {
          echo '<script>alert("Pole e-mail jest puste!");
              document.location.href="contact.php";</script>';      
        } elseif(empty($_POST['message'])) {
            echo '<script>alert("Pole message jest puste!");
              document.location.href="contact.php";</script>'; 
        } else{
            $email = $_POST['email'];
            $message = $_POST['message'];
            $receiver='abartlinski@gmail.com';        
            $header='From:' . $email;

            if(mail($receiver, 'Question',$message))
                    echo '<script>alert("Wiadomość została wysłana");
                        document.location.href="contact.php";</script>';

        }
    }
    
?>

            <div id="content">
                <form name="contact" action="contact.php" method="post">
                    <p>Name:<input type="text" name="name"></p>
                    <p>E-mail address:<input type="text" name="email"></p>
                    <p>Message:<textarea rows="10" cols="30" name="message"></textarea></p>
                    <p><input type="submit" value="Send" name="submit"></p>
                    
                </form>
            </div>

<?php
    
    


    include_once "footer.php";
?>