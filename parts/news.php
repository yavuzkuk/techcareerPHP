<div class="col-12">
    <div class="card mb-3 col-12">
        <div class="row g-0">
            <div class="col-md-4">
                <a href="blog.php?id=<?php echo $id?>">
                    <img src="../assets/upload/<?php echo $image?>" class="img-fluid h-100 rounded-start" alt="...">
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <a class="links" style="color: black;font-weight: normal;" href="blog.php?id=<?php echo $id?>">
                        <h5 class="card-title"><?php echo $title?></h5>
                        <p class="card-text"><?php echo TextSplit($content,$id,"blog.php")?></p>
                        <p class="card-text"><small class="text-body-secondary"><b>Tarih:</b> <?php echo $date?></small></p>
                        <p class="card-text"><small class="text-body-secondary"><b>Yazar:</b> <?php echo $author?></small></p>
                    </a>
                </div>
            <?php if($delete == true):?>
                    <a href="../pages/phpPro/deleteMyblog.php?id=<?php echo $id?>" class="btn btn-danger" style="margin-left: 10px; margin-bottom: 5px;">Sil</a>
            <?php endif?>
            </div>
        </div>
    </div>
</div>