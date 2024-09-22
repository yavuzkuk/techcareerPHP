<?php 
    if(!empty($tenBlog)){
        $arrayKey = array_rand($tenBlog);
    
        $randomBlog = $tenBlog[$arrayKey];
    }
?>

<div class="container mt-2 bg-body-secondary p-3" style="height: 400px;border-radius: 10px;">
    <div class="row" style="height: 100%;">
        <div class="col-5" style="height: 100%;">
            <img src="../assets/upload/<?php echo $randomBlog["b_image"]?>" class="w-100 h-100" style="object-fit: contain;" alt="">
        </div>
        <div class="col-7" style="height: 100%;">
            <h4>
                <?php echo $randomBlog["b_title"]?>
            </h4>
            <?php echo TextSplit($tenBlog[$arrayKey]["b_content"],$tenBlog[$arrayKey]["b_id"],"blog.php");?>
        </div>
    </div>
</div>
