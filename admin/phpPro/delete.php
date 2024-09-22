<?php

    include "../../functions/functions.php";

    if(isset($_GET["id"])){
        DeleteBlogs(intval($_GET["id"]));
        MessageFunc("Silindi","danger","../../blogs.php");
    }else{
        header("Location:../index.php");
        exit();
    }


?>