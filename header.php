<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1><?php print HEADER_TEXT; ?></h1>
                <p>                    
                    <a href="<?php echo $_SESSION['navigation'].'?lang=eng'; 
                                if (isset($_GET['id'])) {
                                    if($_SESSION['lang0']=='eng')
                                        echo '&id=' .$_GET['id'];
                                    else
                                        echo '&id=' .$_SESSION['showIdSecond'];
                                }
                            ?>"><img src="img/eng.png" id="eng" alt="English"></a>
                    <a href="<?php echo $_SESSION['navigation'].'?lang=pl'; 
                                if (isset($_GET['id'])) {
                                    if($_SESSION['lang0']=='pl')
                                        echo '&id=' .$_GET['id'];
                                    else
                                        echo '&id=' .$_SESSION['showIdSecond'];
                                }
                            ?>"><img src="img/pl.png" alt="Polish" id="pl"></a>
                </p>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'index.php'; else echo 'index.php?lang='.$lang;?>"><?php print MENU_HOME; ?></a></li>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'contact.php'; else echo 'contact.php?lang='.$lang;?>"><?php print MENU_CONTACT; ?></a></li>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'tutorials.php'; else echo 'tutorials.php?lang='.$lang;?>"><?php print MENU_TUTORIALS; ?></a></li>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'blog.php'; else echo 'blog.php?lang='.$lang;?>"><?php print MENU_BLOG; ?></a></li>
                    <li><a href="<?php if (!isset($_GET['lang'])) echo 'projects.php'; else echo 'projects.php?lang='.$lang;?>"><?php print MENU_PROJECTS; ?></a></li>
                </ul>
            </div>
            <div id="content">