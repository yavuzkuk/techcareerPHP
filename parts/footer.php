<div class="container-fluid mt-3 bg-body-secondary" style="height: 300px;border-top: 1px solid black;">
    <div class="row text-center" style="height: 100%;">
        <div class="col" style="display: flex;justify-content: center;flex-direction: column;">
            <a class="links" href="">Anasayfa</a>
        </div>
        <div class="col" style="display: flex;justify-content: center;flex-direction: column;">
            <?php if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] == true):?>
                <div>
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
            <?php else:?>
                <a class="links" href="login.php">Giriş yap</a>
                <a class="links" href="register.php">Kayıt ol</a>
            <?php endif?>
        </div>
    </div>
</div>