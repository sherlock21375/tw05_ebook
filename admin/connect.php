<?php  
    require_once('./admin/config.php');  
  
    //文件头部设置  
    error_reporting(E_ALL &~E_NOTICE &~E_DEPRECATED);  
  
    //1.连库  
    if(!($con = mysql_connect(HOST,USERNAME,PASSWORD))) {  
        echo mysql_error();  
    }  
    //2.选库  
    if(!mysql_select_db("xiaochengxu")) {  
        echo mysql_error();  
    }  
    //3.字符集  
    if(!mysql_query("set names utf8")) {  
        echo mysql_error();  
    }  
?>  