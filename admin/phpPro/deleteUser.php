<?php

    include "../../functions/functions.php";

    session_start();

    if(isset($_SESSION["isLogin"]) && $_SESSION["isAdmin"] == "true"){

        
        if(isset($_GET["id"])){
            DeleteUsers($_GET["id"]);
            MessageFunc("Kullanıcı silindi","danger","../../users.php");
        }else{
            header("Location:../users.php");
            exit();
        }
    }else{
        header("Location:../../index.php");
        exit();
    }
        
?>