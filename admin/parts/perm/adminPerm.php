<?php
    include "../parts/perm/livePermCheck.php";

    if(!isset($_SESSION["isLogin"]) || !isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] == "false"){
        header("Location:../pages/");
        exit();
    }
?>