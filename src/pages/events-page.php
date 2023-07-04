<?php
    session_start();

    include('../config/main.php');
    $event_id = $_GET['event_id'];
    $path = '../images/events/';
    $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
    $size = 1024000000;
    $message = '';

    $queryEvent = "SELECT * FROM `events` where id= $event_id";
    $resultEvent = mysqli_query($connection,$queryEvent);

    while($row = $resultEvent->fetch_assoc()) {
        $eventName = $row['name'];
        $image = $row['image'];
        $date = $row['date'];
        $place = $row['place'];
        $descr = $row['descr'];
        $text = $row['text'];
        $volonteer = $row['volonteer_id'];
    }

    if(!empty($_POST['change'])) {
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
                mysqli_query($connection, "UPDATE `events` SET `name`='$name',`place`='$place',`date`='$date',`descr`='$descr',`text`='$text',`image`='$imgName',`volonteer_id`='$user' WHERE id=$event_id") or die(mysqli_error($connection));
            } else {
                $message = 'Что-то пошло не так';
            }
        } else {
            $message = 'Проблемы с картинкой';
        }
        header("Location: events-page.php?event_id=" . $event_id);

    }

    if(!empty($_POST['delete'])) {
        mysqli_query($connection, "DELETE FROM `events` WHERE `id`=$event_id") or die(mysqli_error($connection));
        header("Location: events.php");
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$eventName?></title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php') ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="events.php" class="breadcrumbs__link title-fz16">Мероприятия</a>
                <a href="events-page.php" class="breadcrumbs__link title-fz16"><?=$eventName?></a>
            </div>
        </div>
    </section>

    <section class="events-info">
        <div class="container">
            <div class="events-info__info">
                <img src="../images/events/<?=$image?>" alt="" class="events-info__img">
                <div class="events-info__wrapper">
                    <h3 class="events-info__title title-fz24"><?=$eventName?></h3>
                    <?php
                                if($date != null) {
                                    echo '<p class="events-info__descr">Дата: ' . $date . '</p>';
                                }
                                if($place != null) {
                                    echo '<p class="events-info__descr">Место: ' . $place . '</p>';
                                }
                            ?>
                    <p class="events-info__descr"><?=$descr?></p>
                </div>
            </div>
            <?php
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 1) {
                    echo '<button class="catalog__btn-edit btn">Изменить запись</button>';
                }
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 2): ?>
                    <form method="post" class="catalog__form-delete">
                        <input class="catalog__btn-delete btn-red btn" type="submit" name="delete" value="Удалить">
                    </form>
            <?php endif;?>
            <button class="events-info__btn btn btn-overlay">Принять участие</button>
        </div>
    </section>

    <?php include('../models/footer.php') ?>
    <?php include('../models/reg-overlay.php') ?>

    <div class="overlay">
        <div class="overlay__contact">
            <div class="overlay__close">
                <img src="../images/close.svg" alt="Крестик для закрытия" class="overlay__img">
            </div>
            <h4 class="overlay__title title-fz20">Обратная связь</h4>
            <p class="overlay__descr">Впишите ваш номер телефона и мы свяжемся с вами с пятницы по понедельник с 12:00 до 18:00</p>
            <form action="" method="post" class="overlay__form">
                <input data-mask="tel" type="tel" placeholder="Введите номер телефона" name="phone" id="phone" class="overlay__input title-fz16">
                <button class="overlay__btn btn">Свяжитесь со мной</button>
            </form>
        </div>
    </div>

    <div class="overlay-change">
        <div class="overlay__contact active">
            <div class="overlay__close">
                <img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img">
            </div>
            <h4 class="overlay__title title-fz20">Изменение</h4>
            <form method="POST" class="overlay__form" enctype='multipart/form-data'>
                <input type="text" placeholder="Введите название" name="event-name" id="event-name" class="overlay__input title-fz16" required value="<?=$eventName?>">
                
                <input type="text" placeholder="Введите место" name="place" id="place" class="overlay__input title-fz16" value="<?=$place?>">

                <textarea placeholder="Введите описание" name="descr" id="descr" class="overlay__input title-fz16" required><?=$descr?></textarea>

                <textarea placeholder="Введите краткое описание" name="text" id="text" class="overlay__input title-fz16" required><?=$text?></textarea>

                <input class="overlay__input title-fz16 overlay__input-small" type="date" name="date" id="date" required value="<?=$date?>">
                
                <select class="overlay__input overlay__input-small overlay__input-margin" name="user" id="user">
                    <?php
                        $resultUsers = mysqli_query($connection,"SELECT `id`, `name` FROM `volonteer`");
                        while($row = $resultUsers->fetch_assoc()){
                            if ($row['id'] == $volonteer) {
                                echo '<option selected value="' .$row['id']. '">' .$row['name']. '</option>';
                            } else {
                                echo '<option value="' .$row['id']. '">' .$row['name']. '</option>';
                            }
                        }
                    ?>
                </select>  

                <input class="overlay__input overlay__input-small" class="overlay__choose" id="picture" name="picture" type="file" required>
                
                <input class="overlay__btn btn" type="submit" name="change" value="Изменить">
            </form>
        </div>
    </div>

    <script src="../js/imask.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>