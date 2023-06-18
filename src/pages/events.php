<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мероприятия</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php') ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="events.php" class="breadcrumbs__link title-fz16">Мероприятия</a>
            </div>
        </div>
    </section>

    <section class="events">
        <div class="container">
            <h2 class="events__title title-fz28">Мероприятия</h2>
            <ul class="events__list">
                <li class="events__item">
                    <a href="#" class="events__link">
                        <img src="../images/events/svoimi-lapkami.png" alt="Арт-сеанс «Своими лапками»" class="events__img">
                        <div class="events__text">
                            <h4 class="events__subtitle title-fz20">Арт-сеанс «Своими лапками»</h4>
                            <p class="events__descr">Пообщаться с симпатичными обитателями приютов и принять участие в творческом мастер-классе приглашает фонд «Собаки, которые любят». <br> 
                            Место: м.Бауманская, ул. Малая Почтовая, д. 2/2, стр. 8 <br> 
                            Дата: 11 июня,	12:00–16:00</p>
                            <img src="../images/paw-fill.svg" alt="" class="events__img events__img-paw">
                        </div>
                    </a>
                </li>
                <li class="events__item">
                    <a href="#" class="events__link">
                        <img src="../images/events/ostaemsya-pomogat.png" alt="Благотворительная акция «Остаёмся помогать»" class="events__img">
                        <div class="events__text">
                            <h4 class="events__subtitle title-fz20">Благотворительная акция «Остаёмся помогать»</h4>
                            <p class="events__descr">Чтобы сделать доброе дело, необязательно выходить из дома. Фонд «Нужна помощь» запускает акцию, благодаря которой вы можете помочь нуждающимся в любое удобное для вас время <br>
                            Место: м.Бауманская, ул. Малая Почтовая, д. 2/2, стр. 8 <br>
                            Дата: С 19 апреля 2022	весь день</p>
                            <img src="../images/paw-fill.svg" alt="" class="events__img events__img-paw">
                        </div>
                    </a>
                </li>
                <li class="events__item">
                    <a href="#" class="events__link">
                        <img src="../images/events/druzej-ne-pokupaut.png" alt="Проект «Друзей не покупают»" class="events__img">
                        <div class="events__text">
                            <h4 class="events__subtitle title-fz20">Проект «Друзей не покупают»</h4>
                            <p class="events__descr">Если раньше найти себе питомца можно было в приюте или на тематических фестивалях и выставках, то теперь в Петербурге появилось ещё одно место. Но только «укотовлением» дело не ограничивается. Рассказываем, в чём особенноcть проекта Друзей не покупают. </p>
                            <img src="../images/paw-fill.svg" alt="" class="events__img events__img-paw">
                        </div>
                    </a>
                </li>


                <!-- <li class="events__item">
                    <a href="#" class="events__link">
                        <img src="../images/events/svoimi-lapkami.png" alt="Арт-сеанс «Своими лапками»" class="events__img">
                        <div class="events__text">
                            <h4 class="events__subtitle title-fz20">Арт-сеанс «Своими лапками»</h4>
                            <p class="events__descr">Пообщаться с симпатичными обитателями приютов и принять участие в творческом мастер-классе приглашает фонд «Собаки, которые любят». <br> 
                            Место: м.Бауманская, ул. Малая Почтовая, д. 2/2, стр. 8 <br> 
                            Дата: 11 июня,	12:00–16:00</p>
                            <img src="../images/paw-fill.svg" alt="" class="events__img events__img-paw">
                        </div>
                    </a>
                </li>
                <li class="events__item">
                    <a href="#" class="events__link">
                        <img src="../images/events/ostaemsya-pomogat.png" alt="Благотворительная акция «Остаёмся помогать»" class="events__img">
                        <div class="events__text">
                            <h4 class="events__subtitle title-fz20">Благотворительная акция «Остаёмся помогать»</h4>
                            <p class="events__descr">Чтобы сделать доброе дело, необязательно выходить из дома. Фонд «Нужна помощь» запускает акцию, благодаря которой вы можете помочь нуждающимся в любое удобное для вас время <br>
                            Место: м.Бауманская, ул. Малая Почтовая, д. 2/2, стр. 8 <br>
                            Дата: С 19 апреля 2022	весь день</p>
                            <img src="../images/paw-fill.svg" alt="" class="events__img events__img-paw">
                        </div>
                    </a>
                </li>
                <li class="events__item">
                    <a href="#" class="events__link">
                        <img src="../images/events/druzej-ne-pokupaut.png" alt="Проект «Друзей не покупают»" class="events__img">
                        <div class="events__text">
                            <h4 class="events__subtitle title-fz20">Проект «Друзей не покупают»</h4>
                            <p class="events__descr">Если раньше найти себе питомца можно было в приюте или на тематических фестивалях и выставках, то теперь в Петербурге появилось ещё одно место. Но только «укотовлением» дело не ограничивается. Рассказываем, в чём особенность проекта «Друзей не покупают». </p>
                            <img src="../images/paw-fill.svg" alt="" class="events__img events__img-paw">
                        </div>
                    </a>
                </li> -->
            </ul>
        </div>
    </section>

    <?php include('../models/footer.php') ?>
</body>
</html>