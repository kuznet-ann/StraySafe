<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Волонтёрство</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php') ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="" class="breadcrumbs__link title-fz16">Волонтёрство</a>
            </div>
        </div>
    </section>

    <section class="who">
        <div class="container">
            <h3 class="who__title title-fz24">Кто такие волонтёры?</h3>
            <p class="who__descr">Волонтеры - добровольные помощники, которые регулярно (обычно 1-2 раза в неделю) приходят в приют к своим подопечным. Основная задача волонтера - общаться и гулять с собаками. У многих животных трудная судьба, и нужно время и терпение, чтобы вернуть им доверие к человеку и подарить радость общения.</p>
            
            <p class="who__descr">Мы всегда рады новым людям, все расскажем и научим, и у вас будут свои подопечные, которые будут ждать именно вас. Кроме того, что такая помощь неоценима по своей важности для животных, в качестве приятного бонуса вы получите ни с чем несравнимую эмоциональную обратную связь от питомцев и это так приятно и здорово - гулять с собакой в выходной. Ну а самая главная миссия волонтера - это подготовить своих подопечных к пристройству в семью и в результате найти для них любящих хозяев. Если вы не располагаете свободным временем регулярно, но хотите помогать - это тоже очень важно. Всегда нужны фотографы для съемки собак, помощники в ремонтных работах и те, кто готов пообщаться с теми собаками, у которых пока нет постоянного опекуна. И даже если вы совсем не можете посещать приют, но судьба питомцев вам небезразлична - вы тоже можете помочь, размещая информацию о нас или об отдельном ищущем дом животном по всем доступным каналам. Просто свяжитесь с нами, если хотите помогать, и, по возможности, приходите, чтобы увидеть все своими глазами.</p>
            <button class="who__btn btn btn-overlay">Стать волонтёром</button>
            <div class="who__wrapper">
                <div class="who__line"></div>
                <img src="../images/paw-fill.svg" alt="Ораньжевая декоративная лапка" class="who__img">
            </div>
        </div>
    </section>

    <section class="volonteer">
        <div class="container">
            <h2 class="volonteer__title title-fz28">Наши волонтёры</h2>
            <ul class="volonteer__list">
                <li class="volonteer__item">
                    <img src="../images/volonteer/volonteer-karina.png" alt="Девушка со светлыми волосами" class="volonteer__img">
                    <div class="volonteer__gradient">
                        <h3 class="volonteer__subtitle title-fz24">Карина</h3>
                        <p class="volonteer__descr">Подопечная: Топси</p>
                        <p class="volonteer__descr">Стала волонтёром из-за желания помогать нуждающимся животным, оказавшимся в сложной жизненной ситуации.</p>
                    </div>
            </li>
            </ul>
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