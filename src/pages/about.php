<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
    <link rel="icon" type="image/x-icon" href="../images/logo.svg">
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php') ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="" class="breadcrumbs__link title-fz16">О нас</a>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <ul class="about__list">
                <li class="about__item">
                    <h3 class="about__title title-fz24">Кто мы такие?</h3>
                    <p class="about__text">Приют «StrayDogs» — это муниципальный приют для бездомных собак и кошек в Южном округе г. Москвы. В нем живет почти 2500 собак и 150 кошек. Большие и маленькие, пушистые и гладкие, веселые и задумчивые — и на всех одна большая мечта — встретить своего Человека и найти Дом.</p>
                    <p class="about__text">Животные у нас все разные − большие и маленькие, молодые и пожилые, активные и спокойные, но всем им хочется лишь одного − найти свой дом. Приходите к нам и Вы обязательно увидите СВОЮ собаку/кошку, которая ждет именно ВАС! Приглашаем Всех, кто хочет найти себе и своим детям друга, кто хочет подобрать собаку в загородный дом или кто просто хочет помочь еще одной несчастной душе обрести семью!</p>
                    <div class="about__wrapper">
                        <span class="about__line"></span>
                        <img src="../images/paw-fill.svg" alt="Ораньжевая декоротивная лапка" class="about__img">
                    </div>
                </li>
                <li class="about__item">
                    <h3 class="about__title title-fz24">Наши цели</h3>
                    <p class="about__text">Цель приюта дать возможность каждому животному обрести добрую и любящую семью</p>
                    <p class="about__text">Мы лечим нуждающихся животных, помогаем им социализироваться  адаптироваться для жизни в кругу людей</p>
                    <p class="about__text">Мы не можем изменить весь мир, но мы можем изменить мир для одного из них.</p>
                    <div class="about__wrapper">
                        <span class="about__line"></span>
                        <img src="../images/paw-fill.svg" alt="Ораньжевая декоротивная лапка" class="about__img">
                    </div>
                </li>
                <li class="about__item">
                    <h3 class="about__title title-fz24">Помощь нам</h3>
                    <p class="about__text">Вы можете стать <a href="volunteers.php" class="about__link">волонтёром</a> приюта, оказывая регулярную помощь приюту.</p>
                    <p class="about__text">Принести в приют корм, амуницию (поводки, ошейники, шлейки и т.д.), игрушки и лекарства.</p>
                    <p class="about__text">Прийти и пообщаться с животными. Брошенным животным очень важно поддерживать контакт с людьми, чтобы они стали ласковыми.</p>
                    <div class="about__wrapper">
                        <span class="about__line"></span>
                        <img src="../images/paw-fill.svg" alt="Ораньжевая декоротивная лапка" class="about__img">
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <?php include('../models/footer.php') ?>
    <?php include('../models/reg-overlay.php') ?>

    <script src="../js/imask.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>