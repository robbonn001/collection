<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection</title>
</head>
<body>
    <form action="?route=main/uploadImage" method="POST" enctype="multipart/form-data">
        <div class="label">Загрузить картинку</div>
        <input id="image" type="file" name="image" accept="image/*" require>
        <button type="button" id="uploadBtn">Отправить</button>
    </form>
    <a href="?route=main/exit">Выйти из аккаунта</a>
    <?php include "View/page/".$params['page_view'];?>
    <script src="vendor/js/checkUpload.js"></script>
</body>
</html>