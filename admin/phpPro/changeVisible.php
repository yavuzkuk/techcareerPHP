<?php

    include "../../functions/functions.php";

    if(isset($_GET["id"]) && intval($_GET["id"]) != 0){
        Visible($_GET["id"]);
        header("Location:../blogs.php");
        exit();
    }



?>