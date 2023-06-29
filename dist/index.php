<?php
    session_start();
    include("config/main.php");

    $queryPet = "SELECT `id`, `name`,TIMESTAMPDIFF(MONTH,`age`,CURRENT_DATE) as age, `gender`, `type`, `avatar` FROM `pets`";
    $resultPet = mysqli_query($connection, $queryPet);
?> <!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Главная</title><link rel="stylesheet" href="css/styles.min.css"></head><body> <?php include('models/header.php'); ?> <section class="promo"><div class="container"><h1 class="promo__title title-fz38">Спаси жизнь!<br>Возьми питомца из приюта!</h1><a href="pages/pets.php" class="promo__btn btn">Забрать питомца</a></div></section><section class="ourpets"><div class="container"><h2 class="ourpets__title title-fz28">Наши питомцы</h2><div class="ourpets__wrapper"><button class="ourpets__arrow ourpets__arrow-left"><img src="images/ourpets/paw-left.svg" alt="Стрелка слайдера влево" class="ourpets__paw-outline"> <img src="images/ourpets/paw-left-fill.svg" alt="Стрелка слайдера влево" class="ourpets__paw-fill"></button> <button class="ourpets__arrow ourpets__arrow-right"><img src="images/ourpets/paw-right.svg" alt="Стрелка слайдера вправо" class="ourpets__paw-outline"> <img src="images/ourpets/paw-right-fill.svg" alt="Стрелка слайдера вправо" class="ourpets__paw-fill"></button></div><div class="ourpets__slider"><ul class="ourpets__list"> <?php while($row = $resultPet->fetch_assoc()): ?> <li class="ourpets__card"><a href="pages/pets-page.php?pet_id=<?=$row['id']?>" class="ourpets__link"><div class="ourpets__gradient"><h3 class="ourpets__subtitle title-fz24"><?=$row['name']?></h3><p class="ourpets__text"> <?php 
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
                                ?> </p></div><img src="images/pets/dogs/<?=$row['avatar']?>.jpg" alt="" class="ourpets__img"></a></li> <?php endwhile; ?> <!-- <li class="ourpets__card">
                        <a href="pages/pets-page.php" class="ourpets__link">
                            <div class="ourpets__gradient">
                                <h3 class="ourpets__subtitle title-fz24">Геральт</h3>
                                <p class="ourpets__text">Мальчик, 9 месяцев</p>
                            </div>
                            <img src="images/pets/dogs/geralt/6.jpg" alt="Геральт, мальчик, 9 месяцев. Пятнистый коричневый окрас" class="ourpets__img">
                        </a>
                    </li>
                    <li class="ourpets__card">
                        <a href="pages/pets-page.php" class="ourpets__link">
                            <div class="ourpets__gradient">
                                <h3 class="ourpets__subtitle title-fz24">Лео</h3>
                                <p class="ourpets__text">Мальчик, 1 год</p>
                            </div>
                            <img src="images/pets/dogs/leo/1.jpg" alt="Лео, мальчик, 1 год. Светло-рыжий пятнистый окрас." class="ourpets__img">
                        </a>
                    </li>
                    <li class="ourpets__card">
                        <a href="pages/pets-page.php" class="ourpets__link">
                            <div class="ourpets__gradient">
                                <h3 class="ourpets__subtitle title-fz24">Топси</h3>
                                <p class="ourpets__text">Девочка, 2 года</p>
                            </div>
                            <img src="images/pets/dogs/topsi/2.jpg" alt="Топси, девочка, 2 года. Черная с белыми пятнами." class="ourpets__img">
                        </a>
                    </li>

                    <li class="ourpets__card">
                        <a href="pages/pets-page.php" class="ourpets__link">
                            <div class="ourpets__gradient">
                                <h3 class="ourpets__subtitle title-fz24">Тесси</h3>
                                <p class="ourpets__text">Девочка, 3,5 месяца</p>
                            </div>
                            <img src="images/pets/dogs/tessi/1.jpg" alt="Тесси, девочка, 3,5 месяца. Черный окрас с белыми пятнами." class="ourpets__img">
                        </a>
                    </li>
                    <li class="ourpets__card">
                        <a href="pages/pets-page.php" class="ourpets__link">
                            <div class="ourpets__gradient">
                                <h3 class="ourpets__subtitle title-fz24">Геральт</h3>
                                <p class="ourpets__text">Мальчик, 9 месяцев</p>
                            </div>
                            <img src="images/pets/dogs/geralt/6.jpg" alt="Геральт, мальчик, 9 месяцев. Пятнистый коричневый окрас" class="ourpets__img">
                        </a>
                    </li>
                    <li class="ourpets__card">
                        <a href="pages/pets-page.php" class="ourpets__link">
                            <div class="ourpets__gradient">
                                <h3 class="ourpets__subtitle title-fz24">Лео</h3>
                                <p class="ourpets__text">Мальчик, 1 год</p>
                            </div>
                            <img src="images/pets/dogs/leo/1.jpg" alt="Лео, мальчик, 1 год. Светло-рыжий пятнистый окрас." class="ourpets__img">
                        </a>
                    </li>
                    <li class="ourpets__card">
                        <a href="pages/pets-page.php" class="ourpets__link">
                            <div class="ourpets__gradient">
                                <h3 class="ourpets__subtitle title-fz24">Топси</h3>
                                <p class="ourpets__text">Девочка, 2 года</p>
                            </div>
                            <img src="images/pets/dogs/topsi/2.jpg" alt="Топси, девочка, 2 года. Черная с белыми пятнами." class="ourpets__img">
                        </a>
                    </li>
                </ul> --></ul></div></div></section><section class="lastevent"><div class="container"><h2 class="lastevent__title title-fz28">Мероприятия</h2><div class="lastevent__wrapper"><a href="pages/events-page.php" class="lastevent__link lastevent__link-main"><img src="images/events/ostaemsya-pomogat.png" alt="Благотворительная акция «Остаёмся помогать»" class="lastevent__img lastevent__img-main"> </a><a href="pages/events-page.php" class="lastevent__link"><img src="images/events/svoimi-lapkami.png" alt="Арт-сеанс «Своими лапками»" class="lastevent__img"><div class="lastevent__text"><h4 class="lastevent__subtitle title-fz20">Арт-сеанс «Своими лапками»</h4><p class="lastevent__descr">Пообщаться с симпатичными обитателями приютов и принять участие в творческом мастер-классе приглашает фонд «Собаки, которые любят».<br>Место: м.Бауманская, ул. Малая Почтовая, д. 2/2, стр. 8<br>Дата: 11 июня,	12:00–16:00</p><img src="images/paw-fill.svg" alt="" class="lastevent__img lastevent__img-paw"></div></a><a href="pages/events-page.php" class="lastevent__link"><img src="images/events/druzej-ne-pokupaut.png" alt="Проект «Друзей не покупают»" class="lastevent__img"><div class="lastevent__text"><h4 class="lastevent__subtitle title-fz20">Проект «Друзей не покупают»</h4><p class="lastevent__descr">Если раньше найти себе питомца можно было в приюте или на тематических фестивалях и выставках, то теперь в Петербурге появилось ещё одно место. Но только «укотовлением» дело не ограничивается. Рассказываем, в чём особенность проекта «Друзей не покупают».</p><img src="images/paw-fill.svg" alt="" class="lastevent__img lastevent__img-paw"></div></a></div></div></section> <?php include('models/footer.php') ?> <?php include('models/reg-overlay.php') ?> <script src="js/imask.js"></script><script src="js/script.js"></script></body></html>