<?php

    session_start();
    include "../functions/functions.php";

    include "../parts/perm/livePermCheck.php";

    $id = (int) $_GET["id"];

    if(isset($_GET["id"]) && $id != 0){
        $speBlog = GetSpecBlog($id);

        if(empty($speBlog)){
            header("Location:../404.html");
            exit();
        }
    }else{
        header("Location:../404.html");
        exit();
    }
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

    ?>
    <div class="container-fluid mt-3 mb-5">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-9">
                <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;margin-top: 30px;">
                    <h2><?php echo $speBlog["b_title"]?></h2>
                </div>
                <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;margin-top: 15px;">
                    <?php echo $speBlog["u_username"]." - ".$speBlog["b_createdDate"]?>
                </div>
                <div style="height: 600px;text-align: center;">
                    <img class="h-75" src="../assets/upload/<?php echo $speBlog["b_image"]?>" alt="">
                </div>
                <div style="margin-top: 30px;">
                    <?php echo $speBlog["b_content"]?>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <?php include "../parts/footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



  </body>
</html>