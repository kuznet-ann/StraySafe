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
                <li class="catalog__item">
                    <a href="pets-page.php" class="catalog__link">
                        <img src="../images/pets/dogs/tessi/1.jpg" alt="Тесси, девочка, 3,5 месяца. Черный окрас с белыми пятнами." class="catalog__img">
                        <div class="catalog__gradient">
                            <h3 class="catalog__title title-fz24">Тэсси</h3>
                            <p class="catalog__descr catalog__descr-age">Девочка, 3,5 месяца</p>
                            <p class="catalog__descr">Маленькое нежное сокровище</p>
                            <div class="catalog__item-wrappper">
                                <button class="catalog__btn btn">Забрать питомца</button>
                                <img src="../images/paw-fill.svg" alt="ораньжевая декоративная лапка" class="catalog__icon">
                            </div>
                        </div>
                    </a>
                </li>
                <li class="catalog__item">
                    <a href="pets-page.php" class="catalog__link">
                        <img src="../images/pets/dogs/geralt/6.jpg" alt="Геральт, мальчик, 9 месяцев. Пятнистый коричневый окрас" class="catalog__img">
                        <div class="catalog__gradient">
                            <h3 class="catalog__title title-fz24">Геральт</h3>
                            <p class="catalog__descr catalog__descr-age">Мальчик, 9 месяцев</p>
                            <p class="catalog__descr">Смесь волчонка и зайчонка. Готов дарить счастье своему хозяину</p>
                            <div class="catalog__item-wrappper">
                                <button class="catalog__btn btn">Забрать питомца</button>
                                <img src="../images/paw-fill.svg" alt="ораньжевая декоративная лапка" class="catalog__icon">
                            </div>
                        </div>
                    </a>
                </li>
                <li class="catalog__item">
                    <a href="pets-page.php" class="catalog__link">
                        <img src="../images/pets/dogs/leo/1.jpg" alt="Лео, мальчик, 1 год. Светло-рыжий пятнистый окрас." class="catalog__img">
                        <div class="catalog__gradient">
                            <h3 class="catalog__title title-fz24">Лео</h3>
                            <p class="catalog__descr catalog__descr-age">Мальчик, 1 год</p>
                            <p class="catalog__descr">Ласковый медвежонок с добрыми глазами и большой душой</p>
                            <div class="catalog__item-wrappper">
                                <button class="catalog__btn btn">Забрать питомца</button>
                                <img src="../images/paw-fill.svg" alt="ораньжевая декоративная лапка" class="catalog__icon">
                            </div>
                        </div>
                    </a>
                </li>
                <li class="catalog__item">
                    <a href="pets-page.php" class="catalog__link">
                        <img src="../images/pets/dogs/topsi/2.jpg" alt="Топси, девочка, 2 года. Черная с белыми пятнами." class="catalog__img">
                        <div class="catalog__gradient">
                            <h3 class="catalog__title title-fz24">Топси</h3>
                            <p class="catalog__descr catalog__descr-age">Девочка, 2 года</p>
                            <p class="catalog__descr">Молодая и трогательная девочка заставит ваше сердце согреться</p>
                            <div class="catalog__item-wrappper">
                                <button class="catalog__btn btn">Забрать питомца</button>
                                <img src="../images/paw-fill.svg" alt="ораньжевая декоративная лапка" class="catalog__icon">
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>


    <?php include('../models/footer.php') ?>
    <?php include('../models/reg-overlay.php') ?>


    <script src="../js/script.js"></script>

</body>
</html>