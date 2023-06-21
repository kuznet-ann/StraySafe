<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нашли дом</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php') ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="foundhome.php" class="breadcrumbs__link title-fz16">Нашли дом</a>
            </div>
        </div>
    </section>

    <section class="foundhome">
        <div class="container">
            <ul class="foundhome__list">
                <li class="foundhome__item">
                    <img src="../images/foundhome/lisa.png" alt="" class="foundhome__img">
                    <h4 class="foundhome__title title-fz20">Лиса</h4>
                    <p class="foundhome__descr">Умница и красавица похитила сердца своей семьи</p>
                </li>
                <li class="foundhome__item">
                    <img src="../images/foundhome/protos.png" alt="" class="foundhome__img">
                    <h4 class="foundhome__title title-fz20">Портос</h4>
                    <p class="foundhome__descr">Обрел большую и дружную семью, ура!</p>
                </li>
            </ul>
        </div>
    </section>

    <?php include('../models/footer.php') ?>

    <script src="../js/script.js"></script>

</body>
</html>