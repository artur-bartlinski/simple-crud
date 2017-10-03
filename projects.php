<?php
    session_start();
    include_once 'language.php';
    
    $lang = chooseLanguage();
    $title=TITLE_PROJECTS;
    $_SESSION['navigation']='projects.php';
    include_once 'header.php';
    
    if(isset($_GET['lang']))
        $lang = $_GET['lang'];
    else
        $lang='eng';
    
    $conn = new ConnectionDb();
    $blog = new ContentClass(null,null,null,null,$lang,null,$conn->getConnection());
    $rows = $blog->getProjects();
    
   
    
    foreach($rows as $row) {
        echo '<h1>' . $row['header'] . '</h1>';
        echo '<p>' . substr($row['content'],0,200) . '...<a href="';
                if (!isset($_GET['lang'])) 
                    echo 'content.php?id='.$row['c_id']; 
                else 
                    echo 'content.php?lang='.$lang.'&id='.$row['c_id'];
        echo '">' . READ_MORE . '</a></p>';
    }
    
    
?>
    

<?php 
    include_once 'footer.php';
?>