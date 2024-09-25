<?php
    $target_file = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $temp_file = $_FILES["image"]["tmp_name"];
    $uploadOk = true;

    $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];
    $allowed_mime_types = ['image/jpg','image/jpeg', 'image/png', 'image/webp'];

    if (!in_array($imageFileType, $allowed_extensions) || !in_array(mime_content_type($temp_file), $allowed_mime_types)) {
        $uploadOk = false;

        if (!in_array($imageFileType, $allowed_extensions)) {
            echo json_encode(["error" => "Yalnızca JPG, JPEG, PNG ve WEBP dosyaları yükleyebilirsiniz."]);
        } elseif (!in_array(mime_content_type($temp_file), $allowed_mime_types)) {
            echo json_encode(["error" => "Yalnızca geçerli resim dosyalarını yükleyebilirsiniz."]);
        } elseif ($_FILES["image"]["size"] > 5000000) {
            echo json_encode(["error" => "Dosya boyutu 5MB'dan büyük olamaz."]);
        }
    } else {
        $fileName = uniqid() . "." . $imageFileType;
        $target_file = "../assets/upload/".$fileName;
        if (move_uploaded_file($temp_file, $target_file)) {
            echo json_encode([
                "imageUrl" => "http://localhost/techcareer/assets/upload/" . $fileName
            ]);
        } else {
            echo json_encode(["error" => "Resim yüklenirken bir hata oluştu."]);
        }
    }
?>
