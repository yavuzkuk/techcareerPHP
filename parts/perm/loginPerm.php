<?php
    if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] == true){
        header("Location:index.php");
        exit();
    }
?>