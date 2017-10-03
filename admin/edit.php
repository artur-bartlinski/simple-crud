<?php

    session_start();

    include_once '../autoload.php';
    include_once '../language.php';
    
    $lang = chooseLanguage();
    
    $_SESSION['navigation'] = "edit.php";
    
    $title = EDIT_CONTENT;
    
    $bool = false;
    if(isset($_GET['id'])) {
        $bool = true;
        $id = $_GET['id'];
        $lang = $_GET['lang'];
        $connection = new ConnectionDb();
        $object = new ContentClass($id, null, null, null, $lang, null, $connection->getConnection());
        
        $all = $object->showContent();
        $_SESSION['showIdSecond'] = $object->showIdSecond();
        
        
        if($lang == 'pl') {
            
            
            foreach($all as $row) {
                $header = $row['header'];
                $content = $row['content'];
                $id_second =  $row['id_second'];
            }
            $object2 = new ContentClass($id_second, null, null, null, null, null, $connection->getConnection());
            $all2 = $object2->showContent();
            foreach($all2 as $row) {
                $header2 = $row['header'];
                $content2 = $row['content'];
            }
        } else {
            foreach($all as $row) {
                $header2 = $row['header'];
                $content2 = $row['content'];
                $id_second =  $row['id_second'];
            }
            $object2 = new ContentClass($id_second, null, null, null, null, null, $connection->getConnection());
            $all2 = $object2->showContent();
            foreach($all2 as $row) {
                $header = $row['header'];
                $content = $row['content'];
            }
        }
    }
    
    include_once 'header.php';
    
    
    if(isset($_GET['content']))
        $cType = $_GET['content'];
    
    if(!isset($_SESSION['user'])) {        
        header('Location: http://myownwebsite.local/admin/index.php');
    } elseif(isset($_POST['header']) && isset($_POST['content'])) {
        if(empty($_POST['header']))
            echo '<script>alert("Pole header jest pust!")
                document.location.href="content.php?lang=' . $lang . '&content=' . $cType .'"</script>';
        elseif(empty($_POST['content']))
            echo '<script>alert("Pole content jest puse!")
                document.location.href="content.php?lang=' . $lang . '&content=' . $cType . '"</script>';
        else {
            
            
            
            
            $connection = new ConnectionDb();
            
            $id = $_POST['id'];
            $header = $_POST['header'];
            $content = $_POST['content'];
            
            $id2 = $_POST['id2'];
            $header2 = $_POST['header2'];
            $content2 = $_POST['content2'];
            
            $newContent = new ContentClass($id, null, $header, $content, null, null, $connection->getConnection());
            $newContent2 = new ContentClass($id2, null, $header2, $content2, null, null, $connection->getConnection());
            
            $newContent->editContent();
            $newContent2->editContent();
            
            header("Location: http://myownwebsite.local/admin/content.php?content=$cType");
        }
    } elseif($bool) {
        
        
        
        
        
        
        
            
            
?>

<form action="edit.php?content=<?php echo $cType; ?>" method="post" name="add_content">
    
    <img src="../img/pl.png" alt="Polish">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <p><?php print FORM_HEADER; ?><input type="text" name="header" value="<?php echo $header; ?>"></p>
    <p><?php print FORM_CONTENT; ?><textarea class="ckeditor" row="10" cols="30" name="content"><?php echo $content; ?></textarea></p>
    
    <br>
    <br>
    <img src="../img/eng.png" alt="English">
    <input type="hidden" name="id2" value="<?php echo $id_second; ?>">
    <p><?php print FORM_HEADER; ?><input type="text" name="header2" value="<?php echo $header2; ?>"></p>
    <p><?php print FORM_CONTENT; ?><textarea class="ckeditor" row="10" cols="30" name="content2"><?php echo $content2; ?></textarea></p>
    <p><input type="submit" name="submit" value="<?php print FORM_ADD; ?>"</p>
    
    
</form>
    
<?php
        
        
    } else
        header("Location: http://mywebsite.local/admin/content.php?content=$cType");
    
    
    include_once "footer.php";
?>




