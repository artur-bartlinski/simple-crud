<?php
    
    session_start();
    
    include_once 'language.php';
    
    $lang = chooseLanguage();
    $title = TITLE_HOME;
    $_SESSION['navigation']='index.php';
    include_once 'header.php';

            
                
    echo INDEX_WELCOME;
                
            
 
    include_once 'footer.php';
?>
            

            
