<?php

    session_start();

    include_once '../autoload.php';
    include_once '../language.php';
    
    $lang = chooseLanguage();
    
    $_SESSION['navigation'] = "content.php";
    
    if(isset($_GET['content'])) {
        $id_content = $_GET['content'];
        switch($id_content) {
            case 1:
                $title = "Blog";
                break;
            case 2:
                $title = TITLE_TUTORIALS;
                break;
            case 3:
                $title = TITLE_PROJECTS;
                break;
            default:
                echo '<p>Nie wybrano żadnej zawartości!</p>';
                break;
           
        }
    }
    
    include_once 'header.php';
    
    
    if(!isset($_SESSION['user']))        
        header('Location: http://myownwebsite.local/admin/index.php');
    
?>

    <p><a href="<?php echo 'add.php?content=' . $id_content . '&lang=' . $lang; ?>"><?php print ADD_CONTENT; ?></a></p>
    
    
    
    

<?php
    
    
    
    $connection = new ConnectionDb();
    
    if(isset($_GET['action']) && $_GET['action'] === 'delete') {
        
        $c_id = $_GET['id'];
        $content2 = new ContentClass($c_id, $id_content, null, null, $lang, null, $connection->getConnection());
        
        $content2->deleteContent();
    }
    
    $content = new ContentClass(null, $id_content, null, null, $lang, null, $connection->getConnection());
    
    $all = $content->getAll();
    
    foreach($all as $row) {
        echo '<p>' . $row['c_id'] . ' ' . $row['header'] . ' <a href="edit.php?lang=' . $lang . '&content=' . $id_content . '&id=' . $row['c_id'] . '">' . EDIT . '</a> <a href="content.php?lang=' . $lang . '&content=' . $id_content . '&action=delete&id=' . $row['c_id'] . '">' . DELETE . '</a></p>';
    }

    
    
    
    
    
    include_once "footer.php";
?>




