<?php

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SERVER["REQUEST_METHOD"])){
        $filteredList = Filter($_POST);
    

        $isExist = CheckUser($filteredList[0],$filteredList[1]);

        if ($isExist){
            MessageFunc("Bu isim yada mail ile kayıtlı kullanıcı bulunuyor.","danger","register.php");
        }else{
            $username = $filteredList[0];
            $email = $filteredList[1];
            $passwd = $filteredList[2];
            $passwd2 = $filteredList[3];
            if ($passwd == $passwd2){

                $userId = Register($username,$email,md5($passwd));
                $_SESSION["isLogin"] = "true";
                $_SESSION["id"] = $userId;
                $_SESSION["isAdmin"] = "false";
                MessageFunc("Başarıyla kayıt oldunuz","success","index.php");


            }else{
                MessageFunc("Şifreler eşleşmiyor","warning","register.php");
            }
        }
    }
?>