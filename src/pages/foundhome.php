<?php
    session_start();

    include('../config/main.php');
    $path = '../images/foundhome/';
    $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
    $size = 1024000000;
    $message = '';

    $queryHome = "SELECT pets.name, foundhome.descr, foundhome.image FROM `foundhome`,`pets` WHERE pets.id=foundhome.pet_id";
    $resultHome = mysqli_query($connection,$queryHome);

    if(!empty($_POST['add'])) {
        $descr = $_POST['descr'];
        $petName = $_POST['petName'];
    
        if(!empty($_FILES['picture']['name'])){
            if(!in_array($_FILES['picture']['type'], $types)) {
                $message = 'Запрещённый тип файла';
            }

            if($_FILES['picture']['size'] > $size) {
                $message = 'Файл слишком большой';
            }
            
            $imgName = uniqid() . $_FILES['picture']['name'];
            if (copy($_FILES['picture']['tmp_name'], $path . $imgName)) {
                mysqli_query($connection, "INSERT INTO `foundhome`(`id`, `descr`, `image`, `pet_id`) VALUES (null,'$descr','$imgName','$petName')") or die(mysqli_error($connection));
            } else {
                $message = 'Что-то пошло не так';
            }
        } else {
            $message = 'Проблемы с картинкой';
        }
        header("Location: foundhome.php");

    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нашли дом</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.svg">
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php'); ?>

    <section class="breadcrumbs">
        <div class="container">
            <?=$message?>
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="foundhome.php" class="breadcrumbs__link title-fz16">Нашли дом</a>
            </div>
        </div>
    </section>

    <section class="foundhome">
        <div class="container">
            <?php
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 1) {
                    echo '<button class="catalog__btn-admin btn">Добавить запись</button>';
                }
            ?>
            <ul class="foundhome__list">
                <?php while($row = $resultHome->fetch_assoc()): ?>
                <li class="foundhome__item">
                    <img src="../images/foundhome/<?=$row['image']?>" alt="" class="foundhome__img">
                    <h4 class="foundhome__title title-fz20"><?=$row['name']?></h4>
                    <p class="foundhome__descr"><?=$row['descr']?></p>
                </li>
                <?php endwhile;?>
            </ul>
        </div>
    </section>

    <div class="overlay-add">
        <div class="overlay__contact active">
            <div class="overlay__close">
                <img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img">
            </div>
            <h4 class="overlay__title title-fz20">Добавление записи</h4>
            <form method="POST" class="overlay__form" enctype='multipart/form-data'>                
                <select class="overlay__input" name="petName" id="petName">
                    <?php
                        $resultUsers = mysqli_query($connection,"SELECT id, name FROM pets");
                        while($row = $resultUsers->fetch_assoc()):
                    ?>
                    <option value="<?=$row['id']?>"><?=$row['name']?></option>
                    <?php endwhile;?>
                </select>
                
                <textarea placeholder="Введите описание" name="descr" id="descr" class="overlay__input title-fz16" required></textarea>

                <input class="overlay__input" class="overlay__choose" id="picture" name="picture" type="file" required>
                
                <input class="overlay__btn overlay__btn-add btn" type="submit" name="add" value="Добавить запись">
                
            </form>
        </div>
    </div>

    <?php include('../models/footer.php') ?>
    <?php include('../models/reg-overlay.php') ?>

    <script src="../js/imask.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>