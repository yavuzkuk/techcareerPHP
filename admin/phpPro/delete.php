<?php

    include "../../functions/functions.php";
    session_start();

    if(isset($_SESSION["isLogin"]) && $_SESSION["isAdmin"] == "true"){
        if(isset($_GET["id"])){
            DeleteBlogs(intval($_GET["id"]));
            MessageFunc("Silindi","danger","../../blogs.php");
        }else{
            header("Location:../index.php");
            exit();
        }
    }else{
        header("Location:../../index.php");
        exit();
    }


?>