<?php

    include "../../functions/functions.php";

    if(isset($_GET["id"])){
        DeleteUsers($_GET["id"]);
        MessageFunc("Kullanıcı silindi","danger","../../users.php");
    }else{
        header("Location:../users.php");
        exit();
    }

?>