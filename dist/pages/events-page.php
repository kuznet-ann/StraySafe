<?php
    session_start();

    include('../config/main.php');

    $queryEvent = "SELECT `id`, `name`, `place`, `date`, `descr`, `image` FROM `events` where id=" . $_GET['event_id'];
    $resultEvent = mysqli_query($connection,$queryEvent);

    while($row = $resultEvent->fetch_assoc()) {
        $eventName = $row['name'];
        $image = $row['image'];
        $date = $row['date'];
        $place = $row['place'];
        $descr = $row['descr'];
    }
?> <!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=$eventName?></title><link rel="stylesheet" href="../css/styles.min.css"></head><body> <?php include('../models/header.php') ?> <section class="breadcrumbs"><div class="container"><div class="breadcrumbs__list"><a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a> <a href="events.php" class="breadcrumbs__link title-fz16">Мероприятия</a> <a href="events-page.php" class="breadcrumbs__link title-fz16"><?=$eventName?></a></div></div></section><section class="events-info"><div class="container"><div class="events-info__info"><img src="../images/events/<?=$image?>" alt="" class="events-info__img"><div class="events-info__wrapper"><h3 class="events-info__title title-fz24"><?=$eventName?></h3> <?php
                                if($date != null) {
                                    echo '<p class="events-info__descr">Дата: ' . $date . '</p>';
                                }
                                if($place != null) {
                                    echo '<p class="events-info__descr">Место: ' . $place . '</p>';
                                }
                            ?> <p class="events-info__descr"><?=$descr?></p></div></div><button class="events-info__btn btn btn-overlay">Принять участие</button></div></section> <?php include('../models/footer.php') ?> <?php include('../models/reg-overlay.php') ?> <div class="overlay"><div class="overlay__contact"><div class="overlay__close"><img src="../images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Обратная связь</h4><p class="overlay__descr">Впишите ваш номер телефона и мы свяжемся с вами с пятницы по понедельник с 12:00 до 18:00</p><form action="" method="post" class="overlay__form"><input data-mask="tel" type="tel" placeholder="Введите номер телефона" name="phone" id="phone" class="overlay__input title-fz16"> <button class="overlay__btn btn">Свяжитесь со мной</button></form></div></div><script src="../js/imask.js"></script><script src="../js/script.js"></script></body></html>