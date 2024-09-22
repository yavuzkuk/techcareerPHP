<?php

    if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] == "true"){
        $liveCheck = LiveCheck($_SESSION["id"]);

        if(empty($liveCheck)){
            session_destroy();
            header("Location:index.php");
            exit();
        }else if($liveCheck["u_isAdmin"] == 1){
            $_SESSION["isAdmin"] = "true";
        }else{
            $_SESSION["isAdmin"] = "false";
        }
    }
?>