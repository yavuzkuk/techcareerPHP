<?php

    include "../../functions/functions.php";
    session_start();

    if(isset($_SESSION["isLogin"]) && $_SESSION["isAdmin"] == "true"){   
        if(isset($_GET["id"]) && intval($_GET["id"]) != 0){
            Visible($_GET["id"]);
            header("Location:../blogs.php");
            exit();
        }
    }else{
        header("Location:../");
        exit();
    }
?>