<?php

    session_start();
    include_once 'language.php';
    
    $lang = chooseLanguage();
    $title = TITLE_CONTENT;
    $_SESSION['navigation']='content.php';
    
    $bool = false;
    if(isset($_GET['id'])) {
        $bool=true;
        $id = $_GET['id'];
        
        $conn = new ConnectionDb();
        $content = new ContentClass($id,null,null,null,$lang,null,$conn->getConnection());
        $rows = $content->showContent();
        $_SESSION['showIdSecond'] = $content->showIdSecond();
        $_SESSION['lang0'] = $content->getLang();
    }
    
    
    
    include_once 'header.php';
    
    if($bool) {        
        
        foreach($rows as $row) {
            echo '<h1>' . $row['header'] . '</h1>';
            echo '<p>' . $row['content'] . '</p>';
        }
        
    } else {
        $id = null;
        echo 'Nie wybrano żadnego artykułu!';
    }

    
 
       
    include_once 'footer.php';
    
?>