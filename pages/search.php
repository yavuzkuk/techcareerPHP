<?php

  include "../functions/functions.php";
  session_start();

  include "../parts/perm/livePermCheck.php";

  if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $search = htmlspecialchars($_GET["search"]);

    $results = SearchBlogs($search);
    
  } else {
    header("Location:index.php");
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
      <div class="col-8" style="">
        <div class="col-12 mb-3">
          <b>Aranan kelime: </b><?php echo $search ?>
        </div>
        <?php if (count($results) > 0): ?>
          <?php foreach($results as $result){
            $id = $result["b_id"];
            $title = $result["b_title"];
            $content = TextSplit($result["b_content"],$result["b_id"],"blog.php");
            $date = $result["b_createdDate"];
            $author = $result["u_username"];
            $image = $result["b_image"];
            $delete = false;
            include "../parts/news.php";
          }?>
        <?php else: ?>
          <div style="text-align: center;">
            <h1>Aradığınız içerik bulunamadı</h1>
          </div>
        <?php endif ?>

      </div>
      <div class="col-2"></div>
    </div>
  </div>
  <?php include "../parts/footer.php" ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>

</html>