<?php

    session_start();

    include "../../functions/functions.php";

    if(isset($_SESSION["isLogin"]) && $_SESSION["isAdmin"] == true){
        if(intval($_GET["id"]) != 0 && $_GET["status"] == 0 || $_GET["status"] == 1){
            $_GET["status"] == 0 ? ChangeAdmin($_GET["id"],1) : ChangeAdmin($_GET["id"],0);
            header("Location:../users.php");
            exit();
        }else{
            header("Location:../");
            exit();
        }
    }else{
        header("Location:../");
        exit();
    }
?>