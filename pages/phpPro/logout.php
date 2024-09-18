<?php

    session_start();
    include "../../functions/functions.php";

    unset($_SESSION["isLogin"]);
    unset($_SESSION["id"]);
    unset($_SESSION["isAdmin"]);
    MessageFunc("Çıkış yapıldı","warning","../index.php");
?>