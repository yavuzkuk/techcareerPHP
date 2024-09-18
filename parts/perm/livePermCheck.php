<?php

    if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] == "true"){
        $liveCheck = LiveCheck($_SESSION["id"]);

        if($liveCheck["u_isAdmin"] == 1){
            $_SESSION["isAdmin"] = "true";
        }else{
            $_SESSION["isAdmin"] = "false";
        }
    }
?>