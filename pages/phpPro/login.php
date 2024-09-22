<?php

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SERVER["REQUEST_METHOD"])){
    
        $filteredList = Filter($_POST);
        
        
        $result = Login($filteredList[0],md5($filteredList[1]));

        if($result["Count"]){
            $_SESSION["isLogin"] = true;
            $_SESSION["id"] = $result["u_id"];
            $_SESSION["isAdmin"] = ($result["u_isAdmin"] == 1 ? "true" : "false");
        }else{
            MessageFunc("Giriş başarısız.","danger","login.php");
        }

        
    }
?>