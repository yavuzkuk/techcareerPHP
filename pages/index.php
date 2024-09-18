<?php

    include "../functions/functions.php";
    session_start();
    
    include "../parts/perm/livePermCheck.php";
    $blogs = GetBlogs();

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
    <?php 
        include "../parts/header.php";
        include "../parts/message.php";

        include "../parts/carousel.php";
    ?>
    <div class="container-fluid mt-3 mb-5">
        <div class="row">
            <div class="col-2"></div>
            <?php if(count($blogs) != 0):?>
                <div class="col-9 row">
                    <div class="col-8" style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
                        <?php for ($i=0; $i < count($blogs); $i++) { 
                            $id = $blogs[$i]["b_id"];
                            $title = $blogs[$i]["b_title"];
                            $content = TextSplit($blogs[$i]["b_content"],$blogs[$i]["b_id"],"blog.php");
                            $date = $blogs[$i]["b_createdDate"];
                            $author = $blogs[$i]["u_username"];
                            $image = $blogs[$i]["b_image"];
                            include "../parts/news.php";
                        }
                        
                        ?>   
                    </div>
                    <div class="col-3" style="background-color: purple;">
                        New Users
                    </div>
                </div>
            <?php else:?>
                <div style="text-align: center;height: 300px;">
                    <h2>Henüz yazımız bulunmamakta.</h2>
                    <?php if(isset($_SESSION["isLogin"])):?>
                        <h5>
                            Yazı eklemek isterseniz <a class="links" href="">buradan</a> yazı ekleyebilirsiniz.
                        </h5>
                    <?php else:?>
                        <h5>
                            Yazı eklemek isterseniz <a class="links" href="register.php">buradan</a> kayıt olabilirsiniz.
                        </h5>
                    <?php endif?>
                    
                </div>
            <?php endif?>
            <div class="col-2"></div>
        </div>
    </div>
    <?php include "../parts/footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



  </body>
</html>