<?php

    session_start();
    include "../functions/functions.php";
    
    include "../parts/perm/livePermCheck.php";
    
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
    <link href="/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
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
                <form action="../pages/phpPro/u_write.php" id="form" method="post" enctype="multipart/form-data">
                    <div style="margin-bottom: 10px;">
                        <label for="">Başlık</label>
                        <input required name="title" type="text" class="form-control form-control-user" placeholder="Başlık giriniz.">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label for="">İçerik</label>
                        <div id="toolbar-container">
                            <span class="ql-formats">
                                <select class="ql-font"></select>
                                <select class="ql-size"></select>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-bold"></button>
                                <button class="ql-italic"></button>
                                <button class="ql-underline"></button>
                                <button class="ql-strike"></button>
                            </span>
                            <span class="ql-formats">
                                <select class="ql-color"></select>
                                <select class="ql-background"></select>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-script" value="sub"></button>
                                <button class="ql-script" value="super"></button>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-header" value="1"></button>
                                <button class="ql-header" value="2"></button>
                                <button class="ql-blockquote"></button>
                                <button class="ql-code-block"></button>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-list" value="ordered"></button>
                                <button class="ql-list" value="bullet"></button>
                                <button class="ql-indent" value="-1"></button>
                                <button class="ql-indent" value="+1"></button>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-direction" value="rtl"></button>
                                <select class="ql-align"></select>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-link"></button>
                                <button class="ql-image"></button>
                                <button class="ql-video"></button>
                                <button class="ql-formula"></button>
                            </span>
                            <span class="ql-formats">
                                <button class="ql-clean"></button>
                            </span>
                        </div>
                        <div id="editor">
                        </div>
                        <textarea name="text" style="display:none" id="hiddenArea"></textarea>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label for="">Fotoğraf</label>
                        <input required name="image" type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp">
                    </div>
                    <div style="margin-top: 50px;margin-bottom: 100px;">
                        <button class="btn btn-primary" type="submit">Yazıyı ekle</button>
                    </div>
                    <div style="height: 100px;">

                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <?php include "../parts/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        const quill = new Quill('#editor', {
            modules: {
                syntax: true,
                toolbar: '#toolbar-container',
            },
            placeholder: 'İçerik',
            theme: 'snow',
        });

            quill.getModule('toolbar').addHandler('image', () => {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.click();

            input.onchange = () => {
                const file = input.files[0];
                const formData = new FormData();
                formData.append('image', file);

                // Resmi PHP'ye yüklemek için fetch kullanın
                fetch('WriteUpload.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(result => {
                    if (result.imageUrl) {
                        // Yükleme başarılıysa resim URL'sini Quill'e ekleyin
                        const range = quill.getSelection();
                        quill.insertEmbed(range.index, 'image', result.imageUrl);
                    } else {
                        console.error('Resim yükleme hatası:', result.error);
                    }
                })
                .catch(error => {
                    console.error('Resim yükleme hatası:', error);
                });
            };
        });


        document.getElementById("form").onsubmit = function() {
            var content = quill.root.innerHTML;
            document.getElementById("hiddenArea").value = content;
        };
    </script>

</body>

</html>