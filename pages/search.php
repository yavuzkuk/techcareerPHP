<?php

  include "../functions/functions.php";
  session_start();
  
  include "../parts/perm/livePermCheck.php";
  $blogs = GetBlogs();

  // if(isset($_GET["search"]) && !empty($_GET["search"])){
  //   $result = GetFilterBlog($_GET["search"]);
    
  //   echo "<pre>";
  //   print_r($result);
  //   echo"</pre>";
  // }else{
  //   header("Location:index.php");
  //   exit();
  // }

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
            <div class="col-8" style="background-color: red">

            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <?php include "../parts/footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



  </body>
</html>