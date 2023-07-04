<?php
    session_start();

    include('../config/main.php');

    $path = '../images/pets/';
    $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
    $size = 1024000000;
    $animalType = '';
    $message = '';

    $queryPetInfo = "SELECT DISTINCT pets.id, `name`, pets.descr, TIMESTAMPDIFF(MONTH,`age`,CURRENT_DATE) as age, `gender`, `avatar`, `type` FROM `pets`,`foundhome`";
    //  WHERE pets.id!=foundhome.pet_id
    $resultPetInfo = mysqli_query($connection,$queryPetInfo);

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
        header("Location: pets.php");

    }

?> <!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Наши питомцы</title><link rel="stylesheet" href="../css/styles.min.css"></head><body> <?php include('../models/header.php') ?> <section class="breadcrumbs"><div class="container"><div class="breadcrumbs__list"><a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a> <a href="pets.php" class="breadcrumbs__link title-fz16">Наши питомцы</a></div></div></section> <?=$message?> <section class="catalog"><div class="container"><form action="../config/livesearch.php" method="post" class="catalog__form"><input type="text" id="live_search" name="live_search" placeholder="Введите имя питомца" class="catalog__search title-fz16"></form> <?php
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 1) {
                    echo '<button class="catalog__btn-admin btn">Добавить запись</button>';
                }
            ?> <ul class="catalog__list" id="catalog__list"> <?php while($row = $resultPetInfo->fetch_assoc()) :?> <li class="catalog__item"><a href="pets-page.php?pet_id=<?=$row['id']?>" class="catalog__link"><img src="../images/pets/<?php
                            switch ($row['type']) {
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
                        ?>/<?=$row['avatar']?>" alt="Тесси, девочка, 3,5 месяца. Черный окрас с белыми пятнами." class="catalog__img"><div class="catalog__gradient"><h3 class="catalog__title title-fz24"><?=$row['name']?></h3><p class="catalog__descr catalog__descr-age"> <?php 
                                    if($row['gender'] == 'ж') {
                                        echo 'Девочка, ';
                                    } else {
                                        echo 'Мальчик, ';
                                    }
                                    if(($row['age']/12) >= 1 ) {
                                        if(($row['age']/12) == 1) {
                                            echo round($row['age']/12) . " год";
                                        }
                                        if(5 > ($row['age']/12) && ($row['age']/12) > 1) {
                                            echo round($row['age']/12) . " года";
                                        }
                                        if(($row['age']/12) >= 5) {
                                            echo round($row['age']/12) . " лет";
                                        }
                                    } else {
                                        if($row['age'] == 1) {
                                            echo $row['age'] . " месяц";
                                        }
                                        if($row['age'] > 1 && $row['age'] < 5) {
                                            echo $row['age'] . " месяца";
                                        }
                                        if($row['age'] >= 5) {
                                            echo $row['age'] . " месяцев";
                                        }
                                    }
                                ?> </p><p class="catalog__descr"><?=$row['descr']?></p><div class="catalog__item-wrappper"><button class="catalog__btn btn">Забрать питомца</button> <img src="../images/paw-fill.svg" alt="ораньжевая декоративная лапка" class="catalog__icon"></div></div></a></li> <?php endwhile; ?> </ul></div></section><div class="overlay-add"><div class="overlay__contact active"><div class="overlay__close"><img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Добавление записи</h4><form method="POST" class="overlay__form" enctype="multipart/form-data"><input type="text" placeholder="Введите имя питомца" name="pet-name" id="pet-name" class="overlay__input title-fz16" required> <textarea placeholder="Введите краткое описание" name="descr" id="descr" class="overlay__input title-fz16" required></textarea> <textarea placeholder="Введите историю" name="story" id="story" class="overlay__input title-fz16" required></textarea> <input class="overlay__input title-fz16 overlay__input-small" type="date" name="age" id="age" required> <select class="overlay__input overlay__input-small overlay__input-margin" name="type" id="type"><option>собака</option><option>кот</option></select> <select class="overlay__input overlay__input-small" name="gender" id="gender"><option>м</option><option>ж</option></select> <input class="overlay__input overlay__input-small overlay__input-margin" class="overlay__choose" id="picture" name="picture" type="file" required> <input class="overlay__btn btn" type="submit" name="add" value="Добавить запись"></form></div></div> <?php include('../models/footer.php') ?> <?php include('../models/reg-overlay.php') ?> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script><script src="../js/imask.js"></script><script src="../js/script.js"></script></body></html>