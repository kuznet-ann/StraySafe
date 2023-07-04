<?php
    session_start();
    include('../config/main.php');
    $path = '../images/pets/';
    $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
    $size = 1024000000;
    $message = '';
    $animalType = '';

    $pet_id = $_GET['pet_id'];
    $queryPetInfo = "SELECT `name`,`story`, `age` as `date`, TIMESTAMPDIFF(MONTH,`age`,CURRENT_DATE) as age, `gender`,`avatar`,`type`,`descr` FROM `pets` WHERE `id`=" . $pet_id;
    $resultPetInfo = mysqli_query($connection, $queryPetInfo);
    while($row = $resultPetInfo->fetch_assoc()) {
        $name = $row['name'];
        $descr = $row['descr'];
        $story = $row['story'];
        $gender = $row['gender'];
        $age = $row['age'];
        $date = $row['date'];
        $avatar = $row['avatar'];
        $type = $row['type'];
    }

    if(!empty($_POST['delete'])) {
        $imagesCheck = mysqli_query($connection, "SELECT DISTINCT pet_id FROM images WHERE pet_id = $pet_id");
        $homeCheck = mysqli_query($connection, "SELECT DISTINCT pet_id FROM foundhome WHERE pet_id = $pet_id");
        $volonteerCheck = mysqli_query($connection, "SELECT DISTINCT pet_id FROM volonteer WHERE pet_id = $pet_id");

        if ($imagesCheck->num_rows < 1 && $homeCheck->num_rows < 1 && $volonteerCheck->num_rows < 1) {
            mysqli_query($connection, "DELETE FROM `pets` WHERE `id`= $pet_id") or die(mysqli_error($connection));
            header("Location: pets.php");
        } else {
            $message = 'Сначала удалитe все связанные элементы';
        }

    }

    if(!empty($_POST['change'])) {
        $name = $_POST['pet-name'];
        $descr = $_POST['descr'];
        $story = $_POST['story'];
        $age = date_format(date_create($_POST['age']), 'Y-m-d');
        $type = $_POST['type'];
        $gender = $_POST['gender'];
    
        if(!empty($_FILES['picture']['name'])){
            if(!in_array($_FILES['picture']['type'], $types)) {
                $message = 'Запрещённый тип файла';
            }

            if($_FILES['picture']['size'] > $size) {
                $message = 'Файл слишком большой';
            }

            switch ($type) {
                case 'собака':
                    $animalType = 'dogs/';
                    break;
                
                case 'кот':
                    $animalType = 'cats/';
                    break;

                default:
                    $animalType = '';
                    break;
            }
            
            $imgName = uniqid() . $_FILES['picture']['name'];
            if (copy($_FILES['picture']['tmp_name'], $path . $animalType . $imgName)) {
                mysqli_query($connection, "UPDATE `pets` SET `name`='$name',`descr`='$descr',`story`='$story',`age`='$age',`gender`='$gender',`type`='$type',`avatar`='$imgName' WHERE `pets`.`id` = $pet_id") or die(mysqli_error($connection));
            } else {
                $message = 'Что-то пошло не так';
            }
        } else {
            $message = 'Проблемы с картинкой';
        }
        header("Location: pets-page.php?pet_id=" . $pet_id);

    }

    if(!empty($_POST['add'])) {
        $name = $_POST['pet-name'];
        $descr = $_POST['descr'];
        $story = $_POST['story'];
        $age = date_format(date_create($_POST['age']), 'Y-m-d');
        $type = $_POST['type'];
        $gender = $_POST['gender'];
    
        if(!empty($_FILES['picture']['name'])){
            if(!in_array($_FILES['picture']['type'], $types)) {
                $message = 'Запрещённый тип файла';
            }

            if($_FILES['picture']['size'] > $size) {
                $message = 'Файл слишком большой';
            }
            
            switch ($type) {
                case 'собака':
                    $animalType = 'dogs/';
                    break;
                
                case 'кот':
                    $animalType = 'cats/';
                    break;

                default:
                    $animalType = '';
                    break;
            }
            
            $imgName = uniqid() . $_FILES['picture']['name'];
            if (copy($_FILES['picture']['tmp_name'], $path . $animalType . $imgName)) {
                mysqli_query($connection, "INSERT INTO `pets`(`id`, `name`, `descr`, `story`, `age`, `gender`, `type`, `avatar`) VALUES (null,'$name','$descr','$story','$age','$gender','$type','$imgName')");
            } else {
                $message = 'Что-то пошло не так';
            }
        } else {
            $message = 'Проблемы с картинкой';
        }
        header("Location: pets-page.php?pet_id=" . $pet_id);


    }
?> <!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=$name?></title><link rel="icon" type="image/x-icon" href="../images/logo.svg"><link rel="stylesheet" href="../css/styles.min.css"></head><body> <?php include('../models/header.php') ?> <section class="breadcrumbs"><div class="container"> <?=$message?> <div class="breadcrumbs__list"><a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a> <a href="pets.php" class="breadcrumbs__link title-fz16">Наши питомцы</a> <a href="pets-page.php?pet_id=<?=$pet_id?>" class="breadcrumbs__link title-fz16"><?=$name?></a></div></div></section><section class="pets-info"><div class="container"><div class="pets-info__info"><img src="../images/pets/<?php
                            switch ($type) {
                                case 'собака':
                                    echo 'dogs';
                                    break;
                                
                                case 'кот':
                                    echo 'cats';
                                    break;

                                default:
                                    echo '';
                                    break;
                            }
                        ?>/<?=$avatar?>" alt="<?=$name?>" class="pets-info__img"><div class="pets-info__wrapper"><h3 class="pets-info__title title-fz24"><?=$name?></h3><p class="pets-info__descr">Пол: <?php
                            if($gender == 'ж') {
                                echo 'девочка';
                            } else {
                                echo 'мальчик';
                            }?> </p><p class="pets-info__descr">Возраст: <?php
                            if(($age/12) >= 1 ) {
                                if(($age/12) == 1) {
                                    echo round($age/12) . " год";
                                }
                                if(5 > ($age/12) && ($age/12) > 1) {
                                    echo round($age/12) . " года";
                                }
                                if(($age/12) >= 5) {
                                    echo round($age/12) . " лет";
                                }
                            } else {
                                if($age == 1) {
                                    echo $age . " месяц";
                                }
                                if($age > 1 && $age < 5) {
                                    echo $age . " месяца";
                                }
                                if($age >= 5) {
                                    echo $age . " месяцев";
                                }
                            }
                        ?> </p><p class="pets-info__descr"><?=$story?></p><button class="pets-info__btn btn btn-overlay">Забрать питомца</button></div></div> <?php
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 1) {
                    echo '<button class="catalog__btn-edit btn">Изменить запись</button>';
                }
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 2): ?> <form method="post" class="catalog__form-delete"><input class="catalog__btn-delete btn-red btn" type="submit" name="delete" value="Удалить"></form> <?php endif;?> </div></section><section class="gallery"><div class="container"> <?php
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 0) {
                    echo '<button class="catalog__btn-admin btn">Добавить фото</button>';
                }
            ?> <ul class="gallery__list"> <?php
                    $queryPetImg = "SELECT `id`, `img` FROM `images` WHERE `pet_id`=" . $pet_id;
                    $resultPetImg = mysqli_query($connection, $queryPetImg);
                    while($row = $resultPetImg->fetch_assoc()):
                ?> <li class="gallery__item"><img src="../images/pets/<?php
                            switch ($type) {
                                case 'собака':
                                    echo 'dogs';
                                    break;
                                
                                case 'кот':
                                    echo 'cats';
                                    break;

                                default:
                                    echo '';
                                    break;
                            }
                        ?>/<?=$row['img']?>" alt="" class="gallery__img"></li> <?php endwhile;?> </ul></div></section> <?php include('../models/footer.php') ?> <?php include('../models/reg-overlay.php') ?> <div class="overlay"><div class="overlay__contact"><div class="overlay__close"><img src="../images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Обратная связь</h4><p class="overlay__descr">Впишите ваш номер телефона и мы свяжемся с вами с пятницы по понедельник с 12:00 до 18:00</p><form class="overlay__form"><input data-mask="tel" type="tel" placeholder="Введите номер телефона" name="phone" id="phone" class="overlay__input title-fz16"> <button class="overlay__btn btn">Свяжитесь со мной</button></form></div></div><div class="overlay-add"><div class="overlay__contact active"><div class="overlay__close"><img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Добавление фото</h4><form method="POST" class="overlay__form" enctype="multipart/form-data"><input class="overlay__input" class="overlay__choose" id="picture" name="picture" type="file"> <input class="overlay__btn overlay__btn-add btn" type="submit" name="add" value="Добавить запись"></form></div></div><div class="overlay-change"><div class="overlay__contact active"><div class="overlay__close"><img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Добавление записи</h4><form method="POST" class="overlay__form" enctype="multipart/form-data"><input type="text" placeholder="Введите имя питомца" value="<?=$name?>" name="pet-name" id="pet-name" class="overlay__input title-fz16" required> <textarea placeholder="Введите краткое описание" name="descr" id="descr" class="overlay__input title-fz16" required><?=$descr?></textarea> <textarea placeholder="Введите историю" name="story" id="story" class="overlay__input title-fz16" required><?=$story?></textarea> <input class="overlay__input title-fz16 overlay__input-small" value="<?=$date?>" type="date" name="age" id="age" required> <select class="overlay__input overlay__input-small overlay__input-margin" name="type" id="type"> <?php if($type == 'собака'):?> <option selected="selected">собака</option><option>кот</option> <?php else:?> <option>собака</option><option selected="selected">кот</option> <?php endif;?> </select> <select class="overlay__input overlay__input-small" name="gender" id="gender"> <?php if($gender == 'м'):?> <option selected="selected">м</option><option>ж</option> <?php else:?> <option>м</option><option selected="selected">ж</option> <?php endif;?> </select> <input class="overlay__input overlay__input-small overlay__input-margin" class="overlay__choose" id="picture" name="picture" value="../images/pets/<?php
                            switch ($type) {
                                case 'собака':
                                    echo 'dogs';
                                    break;
                                
                                case 'кот':
                                    echo 'cats';
                                    break;

                                default:
                                    echo '';
                                    break;
                            }
                        ?>/<?=$avatar?>" type="file" required> <input class="overlay__btn btn" type="submit" name="change" value="Изменить"></form></div></div><script src="../js/imask.js"></script><script src="../js/script.js"></script></body></html>