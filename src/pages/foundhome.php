<?php
    session_start();

    include('../config/main.php');

    $queryHome = "SELECT pets.name, foundhome.descr, foundhome.image FROM `foundhome`,`pets` WHERE pets.id=foundhome.pet_id";
    $resultHome = mysqli_query($connection,$queryHome);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нашли дом</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php'); ?>

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
                <?php while($row = $resultHome->fetch_assoc()): ?>
                <li class="foundhome__item">
                    <img src="../images/foundhome/<?=$row['image']?>.jpg" alt="" class="foundhome__img">
                    <h4 class="foundhome__title title-fz20"><?=$row['name']?></h4>
                    <p class="foundhome__descr"><?=$row['descr']?></p>
                </li>
                <?php endwhile;?>
            </ul>
        </div>
    </section>

    <?php include('../models/footer.php') ?>
    <?php include('../models/reg-overlay.php') ?>

    <script src="../js/imask.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>