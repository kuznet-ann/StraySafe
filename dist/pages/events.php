<?php
    session_start();

    include('../config/main.php');
    $path = '../images/events/';
    $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
    $size = 1024000000;
    $message = '';

    $queryEvent = "SELECT `id`, `name`, `place`, `date`, `text`, `image` FROM `events`";
    $resultEvent = mysqli_query($connection,$queryEvent);

    if(!empty($_POST['add'])) {
        $name = $_POST['event-name'];
        $place = $_POST['place'];
        $date = date_format(date_create($_POST['date']), 'Y-m-d');
        $descr = $_POST['descr'];
        $text = $_POST['text'];
        $user = $_POST['user'];
    
        if(!empty($_FILES['picture']['name'])){
            if(!in_array($_FILES['picture']['type'], $types)) {
                $message = 'Запрещённый тип файла';
            }

            if($_FILES['picture']['size'] > $size) {
                $message = 'Файл слишком большой';
            }
            
            $imgName = uniqid() . $_FILES['picture']['name'];
            if (copy($_FILES['picture']['tmp_name'], $path . $imgName)) {
                mysqli_query($connection, "INSERT INTO `events`(`id`, `name`, `place`, `date`, `descr`, `text`, `image`, `volonteer_id`) VALUES (null,'$name','$place','$date','$descr','$text','$imgName','$user')") or die(mysqli_error($connection));
            } else {
                $message = 'Что-то пошло не так';
            }
        } else {
            $message = 'Проблемы с картинкой';
        }
        header("Location: events.php");

    }
?> <!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Мероприятия</title><link rel="icon" type="image/x-icon" href="../images/logo.svg"><link rel="stylesheet" href="../css/styles.min.css"></head><body> <?php include('../models/header.php') ?> <section class="breadcrumbs"><div class="container"><div class="breadcrumbs__list"><a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a> <a href="events.php" class="breadcrumbs__link title-fz16">Мероприятия</a></div></div></section><section class="events"><div class="container"><h2 class="events__title title-fz28">Мероприятия</h2> <?php
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 1) {
                    echo '<button class="catalog__btn-admin btn">Добавить запись</button>';
                }
            ?> <ul class="events__list"> <?php while($row = $resultEvent->fetch_assoc()):?> <li class="events__item"><a href="events-page.php?event_id=<?=$row['id']?>" class="events__link"><img src="../images/events/<?=$row['image']?>" alt="Арт-сеанс «Своими лапками»" class="events__img"><div class="events__text"><h4 class="events__subtitle title-fz20"><?=$row['name']?></h4><p class="events__descr"><?=$row['text']?><br> <?php
                                if($row['date'] != null) {
                                    echo 'Дата: ' . $row['date'] . '<br>';
                                }
                                if($row['place'] != null) {
                                    echo 'Место: ' . $row['place'];
                                }
                            ?> </p><img src="../images/paw-fill.svg" alt="" class="events__img events__img-paw"></div></a></li> <?php endwhile;?> </ul></div></section><div class="overlay-add"><div class="overlay__contact active"><div class="overlay__close"><img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Добавление записи</h4><form method="POST" class="overlay__form" enctype="multipart/form-data"><input type="text" placeholder="Введите название" name="event-name" id="event-name" class="overlay__input title-fz16" required> <input type="text" placeholder="Введите место" name="place" id="place" class="overlay__input title-fz16"><textarea placeholder="Введите описание" name="descr" id="descr" class="overlay__input title-fz16" required></textarea> <textarea placeholder="Введите краткое описание" name="text" id="text" class="overlay__input title-fz16" required></textarea> <input class="overlay__input title-fz16 overlay__input-small" type="date" name="date" id="date" required> <select class="overlay__input overlay__input-small overlay__input-margin" name="user" id="user"> <?php
                        $resultUsers = mysqli_query($connection,"SELECT `id`, `name` FROM `volonteer`");
                        while($row = $resultUsers->fetch_assoc()):
                    ?> <option value="<?=$row['id']?>"><?=$row['name']?></option> <?php endwhile;?> </select> <input class="overlay__input overlay__input-small" class="overlay__choose" id="picture" name="picture" type="file" required> <input class="overlay__btn btn" type="submit" name="add" value="Добавить запись"></form></div></div> <?php include('../models/footer.php') ?> <?php include('../models/reg-overlay.php') ?> <script src="../js/imask.js"></script><script src="../js/script.js"></script></body></html>