<?php

    session_start();

    include_once '../autoload.php';
    include_once '../language.php';
    
    $lang = chooseLanguage();
    
    $_SESSION['navigation'] = "add.php";
    
    $title = ADD_CONTENT;
    
    
    
    include_once 'header.php';
    
    
    if(!isset($_SESSION['user'])) {        
        header("Location: $hostname/admin/index.php");
    } elseif(isset($_POST['header']) && isset($_POST['content1'])) {
        if(empty($_POST['header']))
            echo '<script>alert("Pole header jest pust!")
                document.location.href="add.php"</script>';
        elseif(empty($_POST['content1']))
            echo '<script>alert("Pole content jest puse!")
                document.location.href="add.php"</script>';
        else {
            
            $connection = new ConnectionDb();
            $getMaxId = new ContentClass(null, null, null, null, null, null, $connection->getConnection());
            $maxId = $getMaxId->getMaxId();
            
            
            $id = $maxId+1;
            $header = $_POST['header'];
            $content1 = $_POST['content1'];
            $lang = $_POST['lang'];
            
            switch($_POST['ctype']){
                case 'blog':
                    $cType = 1;
                    break;
                case 'tutorial':
                    $cType = 2;
                    break;
                case 'project':
                    $cType = 3;
                    break;
            }
            
            $id_second = $maxId+2;
            
            $id2 = $maxId+2;
            $header2 = $_POST['header2'];
            $content2 = $_POST['content2'];
            $lang2 = $_POST['lang2'];
            $id_second2 = $maxId+1;
            
            $newContent = new ContentClass($id, $cType, $header, $content1, $lang, $id_second, $connection->getConnection());
            $newContent2 = new ContentClass($id2, $cType, $header2, $content2, $lang2, $id_second2, $connection->getConnection());
            
            $newContent->addContent();
            $newContent2->addContent();
            
            header("Location: $hostname/admin/content.php?content=$cType");
        }
        
    } else {
?>

<form action="add.php" method="post" name="add_content">
    <p><?php print FORM_CTYPE; ?><select name="ctype">
            <?php 
                if($_GET['content'] == 1)
                    echo '<option value="blog">Blogi</option>
                        <option value="tutorial">' . MENU_TUTORIALS . '</option>
                        <option value="project">' . MENU_PROJECTS . '</option>';
                
                if($_GET['content'] == 2)
                    echo '<option value="tutorial">' . MENU_TUTORIALS . '</option>
                        <option value="blog">Blogi</option>                        
                        <option value="project">' . MENU_PROJECTS . '</option>';
                
                if($_GET['content'] == 3)
                    echo '<option value="project">' . MENU_PROJECTS . '</option>
                        <option value="blog">Blogi</option>
                        <option value="tutorial">' . MENU_TUTORIALS . '</option>';
                    
                        
                ?>
            
            
                                 </select>
    </p>
    <img src="../img/pl.png" alt="Polish">
    <p><?php print FORM_HEADER; ?><input type="text" name="header"></p>
    <p><?php print FORM_CONTENT; ?><textarea row="10" cols="30" name="content1"></textarea></p>
    
    <p><input type="hidden" name="lang" value="pl"</p>
    <br>
    <br>
    <img src="../img/eng.png" alt="English">
    <p><?php print FORM_HEADER; ?><input type="text" name="header2"></p>
    <p><?php print FORM_CONTENT; ?><textarea row="10" cols="30" name="content2"></textarea></p>
    </p>
    <p><input type="hidden" name="lang2" value="eng"</p>
    <p><input type="submit" name="submit" value="<?php print FORM_ADD; ?>"</p>
    
</form>
    
<?php
        
        
    }
   
    

    
    
    
    
    
    include_once "footer.php";
?>




