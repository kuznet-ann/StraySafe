<?php
    session_start();

    include('../config/main.php');

    $queryPetInfo = "SELECT DISTINCT pets.id, `name`, pets.descr, TIMESTAMPDIFF(MONTH,`age`,CURRENT_DATE) as age, `gender`, `avatar`, `type` FROM `pets`,`foundhome` WHERE pets.id!=foundhome.pet_id";
    $resultPetInfo = mysqli_query($connection,$queryPetInfo);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наши питомцы</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php') ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="pets.php" class="breadcrumbs__link title-fz16">Наши питомцы</a>
            </div>
        </div>
    </section>

    <section class="catalog">
        <div class="container">
            <div class="catalog__data">
                <form action="" method="get" class="catalog__form catalog__form-serch">
                    <input type="text" placeholder="Введите имя питомца" class="catalog__search title-fz16">
                </form>
    
                <button class="catalog__btn-sort">
                    <img class="catalog__img-sort" name="name" src="../images/sort.svg" alt="Иконка сортировки">
                </button>

                <div class="catalog__sort-wrapper">
                    <form action="" class="catalog__form catalog__form-sort">
                        <div class="catalog__wrapper">
                            <h5 class="catalog__subtitle title-fz16">Пол</h5>
                            <div class="catalog__checkbox">
                                <input type="checkbox" name="cat" id="cat" class="catalog__input">
                                <label for="boy" class="catalog__input">Кот</label>
                            </div>
                            <div class="catalog__checkbox">
                                <input type="checkbox" name="dog" id="dog" class="catalog__input">
                                <label for="girl" class="catalog__input">Собака</label>
                            </div>
                        </div>
                        <div class="catalog__wrapper">
                            <h5 class="catalog__subtitle title-fz16">Пол</h5>
                            <div class="catalog__checkbox">
                                <input type="checkbox" name="boy" id="boy" class="catalog__input">
                                <label for="boy" class="catalog__input">Мальчик</label>
                            </div>
                            <div class="catalog__checkbox">
                                <input type="checkbox" name="girl" id="girl" class="catalog__input">
                                <label for="girl" class="catalog__input">Девочка</label>
                            </div>
                        </div>
                        <div class="catalog__wrapper">
                            <h5 class="catalog__subtitle title-fz16">Возраст</h5>
                            <div class="catalog__checkbox">
                                <input type="checkbox" name="young" id="young" class="catalog__input">
                                <label for="young" class="catalog__input">До года</label>
                            </div>
                            <div class="catalog__checkbox">
                                <input type="checkbox" name="teen" id="teen" class="catalog__input">
                                <label for="teen" class="catalog__input">От года до трёх лет</label>
                            </div>
                            <div class="catalog__checkbox">
                                <input type="checkbox" name="adult" id="adult" class="catalog__input">
                                <label for="adult" class="catalog__input">От трёх до пяти лет</label>
                            </div>
                            <div class="catalog__checkbox">
                                <input type="checkbox" name="old" id="old" class="catalog__input">
                                <label for="old" class="catalog__input">От пяти лет</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <ul class="catalog__list">
                <?php while($row = $resultPetInfo->fetch_assoc()) :?>
                <li class="catalog__item">
                    <a href="pets-page.php?pet_id=<?=$row['id']?>" class="catalog__link">
                        <img src="../images/pets/<?php
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
                        ?>/<?=$row['avatar']?>.jpg" alt="Тесси, девочка, 3,5 месяца. Черный окрас с белыми пятнами." class="catalog__img">
                        <div class="catalog__gradient">
                            <h3 class="catalog__title title-fz24"><?=$row['name']?></h3>
                            <p class="catalog__descr catalog__descr-age">
                                <?php 
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
                                ?>
                            </p>
                            <p class="catalog__descr"><?=$row['descr']?></p>
                            <div class="catalog__item-wrappper">
                                <button class="catalog__btn btn">Забрать питомца</button>
                                <img src="../images/paw-fill.svg" alt="ораньжевая декоративная лапка" class="catalog__icon">
                            </div>
                        </div>
                    </a>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>


    <?php include('../models/footer.php') ?>
    <?php include('../models/reg-overlay.php') ?>

    <script src="../js/imask.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>