<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/css/style.css">
    <title>Collection</title>
</head>
<body>
    <div class="box">
        <a href="?route=main/collection&folder_id=<?=$params['folder_id']?>">Назад</a>
        <form id="uploadImage" action="?route=main/uploadImage" method="POST" enctype="multipart/form-data">
            <div class="label">Загрузить картинку</div>
            <input id="image" type="file" name="image" accept="image/*" require>
            <button type="button" id="uploadBtn">Отправить</button>
        </form>
        <form id="addFolder" action="?route=main/addFolder" method="POST">
            <div class="label">Добавить папку</div>
            <input id="folder" type="text" name="folder" minlength="3" require>
            <button type="button" id="folderBtn">Отправить</button>
        </form>
        <a href="?route=main/exit">Выйти из аккаунта</a>
    </div>
    
    <?php include "View/page/".$params['page_view'];?>
    <script src="vendor/js/checkUpload.js"></script>
    <script src="vendor/js/checkAdd.js"></script>
</body>
</html>