<?php
    session_start();

    include('../config/main.php');

    $queryEvent = "SELECT `id`, `name`, `place`, `date`, `text`, `image` FROM `events`";
    $resultEvent = mysqli_query($connection,$queryEvent);
?>
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
                <?php while($row = $resultEvent->fetch_assoc()):?>
                <li class="events__item">
                    <a href="events-page.php?event_id=<?=$row['id']?>" class="events__link">
                        <img src="../images/events/<?=$row['image']?>.png" alt="Арт-сеанс «Своими лапками»" class="events__img">
                        <div class="events__text">
                            <h4 class="events__subtitle title-fz20"><?=$row['name']?></h4>
                            <p class="events__descr"><?=$row['text']?><br>
                            <?php
                                if($row['date'] != null) {
                                    echo 'Дата: ' . $row['date'] . '<br>';
                                }
                                if($row['place'] != null) {
                                    echo 'Место: ' . $row['place'];
                                }
                            ?>
                            </p>
                            <img src="../images/paw-fill.svg" alt="" class="events__img events__img-paw">
                        </div>
                    </a>
                </li>
                <?php endwhile;?>
            </ul>
        </div>
    </section>

    <?php include('../models/footer.php') ?>
    <?php include('../models/reg-overlay.php') ?>

    <script src="../js/imask.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>