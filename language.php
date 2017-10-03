<?php

    include_once 'autoload.php';
    
    $hostname = "http://myownwebsite.local";
    
    function chooseLanguage() {
        if(isset($_GET['lang']))
            $lang=$_GET['lang'];
        else 
            $lang='eng';

        switch($lang)
        {
            case 'pl':
                include_once 'lang/pl.php';
                break;
            case 'eng':
                include_once 'lang/eng.php';
                break;
        }
        
        return $lang;
    }
