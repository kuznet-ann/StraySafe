<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница мероприятия</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php') ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="events.php" class="breadcrumbs__link title-fz16">Мероприятия</a>
                <a href="events-page.php" class="breadcrumbs__link title-fz16">Страница мероприятия</a>
            </div>
        </div>
    </section>

    <section class="events-info">
        <div class="container">
            <div class="events-info__info">
                <img src="../images/events/svoimi-lapkami.png" alt="" class="events-info__img">
                <div class="events-info__wrapper">
                    <h3 class="events-info__title title-fz24">Арт-сеанс «Своими лапками»</h3>
                    <p class="events-info__descr">Место: м.Бауманская, ул. Малая Почтовая, д. 2/2, стр. 8</p>
                    <p class="events-info__descr">Дата проведения: 11 июня,	12:00–16:00</p>
                    <p class="events-info__descr">Здесь рады всем, кто неравнодушен к животным, у кого уже есть питомец и кто планирует его завести. В ходе мастер-класса гости смогут нарисовать с натуры обитателя приюта, который особенно понравится. При этом уровень владения кистью не имеет значения, а материалы для рисования предоставят на месте. Арт-сеанс проведёт иллюстратор Ольга Лапинская. Также посетители познакомятся с десятью жителями приютов, которые ищут дом. Всех их можно гладить, разучивать с ними команды, общаться и весело проводить время, а волонтёры расскажут о них и об их характере. А при желании можно будет осуществить собачью мечту и забрать нового друга себе, подписав договор об ответственном содержании. Все зарегистрированные гости поучат подарки от партнёра мероприятия. Здесь же будет работать ярмарка с сувенирами, деньги от их продажи направят приютам. Кроме того, посетители смогут передать собакам подарки — весь день на площадке принимаются ошейники, корма, пелёнки, средства от клещей.</p>
                </div>
            </div>
            <button class="events-info__btn btn btn-overlay">Принять участие</button>
        </div>
    </section>

    <?php include('../models/footer.php') ?>

    <div class="overlay">
        <div class="overlay__contact">
            <div class="overlay__close">
                <img src="../images/close.svg" alt="Крестик для закрытия" class="overlay__img">
            </div>
            <h4 class="overlay__title title-fz20">Обратная связь</h4>
            <p class="overlay__descr">Впишите ваш номер телефона и мы свяжемся с вами с пятницы по понедельник с 12:00 до 18:00</p>
            <form action="" method="post" class="overlay__form">
                <input type="tel" placeholder="Введите номер телефона" name="phone" id="phone" class="overlay__input title-fz16">
                <button class="overlay__btn btn">Свяжитесь со мной</button>
            </form>
        </div>
    </div>

    <script src="../js/script.js"></script>

</body>
</html>