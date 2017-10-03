<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TextClass
 *
 * @author Artur
 */
class ContentClass {
    
    private $id;
    private $cType;
    private $header;
    private $content;
    private $lang;
    private $id_second;
    private $connection;
    
    function __construct($id,$cType,$header,$content,$lang,$id_second,$connection) {
        $this->id = $id;
        $this->cType = $cType;
        $this->header = $header;
        $this->content = $content;
        $this->id_second = $id_second;
        $this->connection = $connection;
        
        $this->setLang($lang);
        
    }
    
    function getId() {
        return $this->id;
    }
    
    function getCType() {
        return $this->cType;
    }
    
    function getHeader() {
        return $this->header;
    }
    
    function getContent() {
        return $this->content;
    }
    
    function getLang() {
        if($this->lang == 1)
            return 'eng';
        else
            return 'pl';
    }
    
    function getIdSecond() {
        return $this->id_second;
    }
    
    function getDbConnection() {
        return $this->connection;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setCType($cType) {
        $this->cType = $cType;
    }
    
    function setHeader($header) {
        $this->header = $header;
    }
    
    function setContent($content) {
        $this->content = $content;
    }
    
    function setLang($lang) {
        
        if($lang == 'eng')
            $this->lang = 1;
        else
            $this->lang = 2;
    }
    
    function setIdSecond($id_second) {
        $this->id_second = $id_second;
    }
    
    function setDbConnection($connection) {
        $this->connection = $connection;
    }
    
    function showIdSecond() {
        $query = "select id_second from content_item where c_id = $this->id;";
        $result = mysqli_query($this->connection,$query);
        $assoc = mysqli_fetch_assoc($result);
        $id_second = $assoc['id_second'];
                
        return $id_second;
    }
    
    function showContent() {
        $query = "select header,content,lang,id_second from content_item where c_id = $this->id;";
        $result = mysqli_query($this->connection,$query);
        
        
        return $result;
    }
    
    function getMaxId() {
        $query = "select max(c_id) as max from content_item; ";
        $result = mysqli_query($this->connection, $query);
        $tmp = mysqli_fetch_assoc($result);
        $max_id = $tmp['max'];
        
        return $max_id;
        
    }
    
    
    function getAll() {
        $query = "select c_id,content_id,header,content,lang,id_second from content_item where lang = $this->lang and content_id = $this->cType;";
        $result = mysqli_query($this->connection,$query);
        
        return $result;
    }
    
    
    
    function getArticles() {
        $query = "select c_id,header,content from content_item where lang = $this->lang and content_id = 1;";
        $result = mysqli_query($this->connection,$query);
        
        
        return $result;
    }
    
    function getTutorials() {
        $query = "select c_id,header,content from content_item where lang = $this->lang and content_id = 2;";
        $result = mysqli_query($this->connection,$query);
        
        return $result;
    }
    
    function getProjects() {
        $query = "select c_id,header,content from content_item where lang = $this->lang and content_id = 3;";
        $result = mysqli_query($this->connection,$query);
        
        return $result;
    }
    
    function addContent() {
        $query = "insert into content_item(c_id, content_id, header, content, lang, id_second) values($this->id, $this->cType, '$this->header', '$this->content', $this->lang, $this->id_second);";
        $result = mysqli_query($this->connection, $query);
        
    }
    
    function deleteContent() {
        $query = "delete from content_item where c_id = $this->id or id_second = $this->id; ";
        $result = mysqli_query($this->connection, $query);
    }
    
    function editContent() {
        $query = "update content_item set header = '$this->header', content = '$this->content' where c_id = $this->id; ";
        $result = mysqli_query($this->connection, $query);
    }
    
}

?>
