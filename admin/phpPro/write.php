<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST["title"]) && !empty($_POST["text"])){
            $target_dir = "../assets/upload/";

            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            
            $file = $_FILES['image'];

            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];
            $file_error = $file['error'];

            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            $file_type = mime_content_type($file_tmp);

            $unique_name = md5(time()) . '.' . $file_ext;

            if (!in_array($file_ext, $allowed_extensions) || !in_array($file_type, ['image/jpeg', 'image/png', 'image/gif']) || $file_error !== 0) {
                die("Hata: Sadece geçerli resim dosyaları yüklenebilir veya dosya yüklenirken bir hata oluştu.");
            }else{
                move_uploaded_file($file_tmp, $target_dir . $unique_name);
                AddBlogs($_SESSION["id"],$_POST["title"],$_POST["text"],$unique_name);
                MessageFunc("Yazı eklendi","success","blogs.php");
            }
        }
    }
?>