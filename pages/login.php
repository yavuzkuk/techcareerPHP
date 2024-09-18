<?php

    session_start();

    include "../functions/functions.php";
    include "phpPro/login.php";
    include "../parts/perm/loginPerm.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0994de659f.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include "../parts/header.php";
        include "../parts/message.php";
    ?>

    <div class="container bg-body-secondary mt-4 divRadius" style="height: 400px;">
        <div class="row h-100">
            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 10%;">
                <h2>Giriş yap</h2>
            </div>
            <div class="col-8" style="height: 90%;">
                <form method="post">
                    <div>
                        <div class="col-12">
                            <label for="basic-url" class="form-label">Kullanıcı adı yada E-mail</label>
                            <input name="nameEmail" type="text" class="form-control" placeholder="user@example.com" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="col-12">
                            <label for="basic-url" class="form-label">Şifre</label>
                            <input name="passwd" type="password" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div style="display: flex;flex-direction: row;align-items: center;" class="mt-3">
                        <button type="submit" class="btn btn-outline-primary" style="margin-right: 10px;">Giriş yap</button>
                        <a href="" class="links">Şifremi unuttum</a>
                    </div>
                    <!-- <div class="mt-3">
                    </div> -->
                </form>
            </div>
            <div class="col" style="display:flex;justify-content: space-around;flex-direction: column;">
                <div>
                    <b>
                        Eğer hesabınız yoksa <a href="register.php" class="links">buradan</a> hesap oluşturabilirsiniz.
                    </b>
                </div>
                <div>
                    Sosyal medyadan takip ediniz
                    <div class="row mt-3">
                        <div style="width: 90px;">
                            <a href="https://www.linkedin.com/in/yavuzkuk/">
                                <img src="../assets//linkedin.png" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div style="width: 90px;">
                            <a href="https://github.com/yavuzkuk">
                                <img src="../assets/github.jpeg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div style="width: 90px;">
                            <a href="mailto:yavuz-kuk@hotmail.com">
                                <img src="../assets/mail.png" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include "../parts/footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



  </body>
</html>