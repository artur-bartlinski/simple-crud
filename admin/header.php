<?php
    
    
    if(isset($_GET['login'])) {
        unset($_SESSION['user']);
    }
        
    if(isset($_SESSION['user'])) {
		
	
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <script src="../ckeditor/ckeditor.js"></script>
        <script>
            window.onload = function(){
                CKEDITOR.replace('content1');
                CKEDITOR.replace('content2');
            };
        </script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1><?php print HEADER_TEXT; ?></h1>
                <p>                    
                    <a href="<?php echo $_SESSION['navigation'].'?lang=eng';
                                if(isset($_GET['content']))
                                        echo '&content=' . $_GET['content'];
                                if (isset($_GET['id'])) {
                                    if($lang=='eng')
                                        echo '&id=' .$_GET['id'];
                                    else
                                        echo '&id=' . $_SESSION['showIdSecond'];
                                }
                            ?>"><img src="../img/eng.png" id="eng" alt="English"></a>
                    <a href="<?php echo $_SESSION['navigation'].'?lang=pl'; 
                                if(isset($_GET['content']))
                                    echo '&content=' . $_GET['content'];
                                if (isset($_GET['id'])) {
                                    if($lang=='pl')
                                        echo '&id=' .$_GET['id'];
                                    else
                                        echo '&id=' . $_SESSION['showIdSecond'];
                                }
                            ?>"><img src="../img/pl.png" alt="Polish" id="pl"></a>
                </p>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'index.php'; else echo 'index.php?lang='.$lang;?>"><?php print MENU_HOME; ?></a></li>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'content.php?content=2'; else echo 'content.php?content=2&lang='.$lang;?>"><?php print MENU_TUTORIALS; ?></a></li>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'content.php?content=1'; else echo 'content.php?content=1&lang='.$lang;?>"><?php print MENU_BLOG; ?></a></li>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'content.php?content=3'; else echo 'content.php?content=3&lang='.$lang;?>"><?php print MENU_PROJECTS; ?></a></li>
                    <?php 
                        if(isset($_SESSION['user'])) {
                            echo '<li><a href="'; if (!isset($_GET['lang'])) echo 'index.php?login=false'; else echo 'index.php?login=false&lang='. $lang; print '">' .MENU_LOGOUT . '</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <div id="content">
                
<?php
    }
?>
