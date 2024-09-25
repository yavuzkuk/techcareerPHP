<?php

    session_start();
    include "../../functions/functions.php";


    if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"]){
        $result = GetSpecBlog($_GET["id"]);
        
        if(empty($result)){
            header("Location:../../index.php");
            exit();
        }else if($result["b_author"] != $_SESSION["id"]){
            header("Location:../../index.php");
            exit();
        }else{
            DeleteBlogs($_GET["id"]);
            MessageFunc("Blogunuz silindi","success","../myblogs.php");
        }
    }else{
        header("Location:../../index.php");
        exit();
    }
?>