<?php
    session_start();

    include('../config/main.php');

    $pet_id = $_GET['pet_id'];
    $queryPetInfo = "SELECT `name`,`story`, TIMESTAMPDIFF(MONTH,`age`,CURRENT_DATE) as age, `gender`,`avatar` FROM `pets` WHERE `id`=" . $pet_id;
    $resultPetInfo = mysqli_query($connection, $queryPetInfo);
    while($row = $resultPetInfo->fetch_assoc()) {
        $name = $row['name'];
        $descr = $row['story'];
        $gender = $row['gender'];
        $age = $row['age'];
        $avatar = $row['avatar'];
    }
?> <!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=$name?></title><link rel="stylesheet" href="../css/styles.min.css"></head><body> <?php include('../models/header.php') ?> <section class="breadcrumbs"><div class="container"><div class="breadcrumbs__list"><a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a> <a href="pets.php" class="breadcrumbs__link title-fz16">Наши питомцы</a> <a href="pets-page.php" class="breadcrumbs__link title-fz16"><?=$name?></a></div></div></section><section class="pets-info"><div class="container"><div class="pets-info__info"><img src="../images/pets/dogs/<?=$avatar?>.jpg" alt="<?=$name?>" class="pets-info__img"><div class="pets-info__wrapper"><h3 class="pets-info__title title-fz24"><?=$name?></h3><p class="pets-info__descr">Пол: <?php
                            if($gender == 'ж') {
                                echo 'девочка';
                            } else {
                                echo 'мальчик';
                            }?> </p><p class="pets-info__descr">Возраст: <?php
                            if(($age/12) >= 1 ) {
                                if(($age/12) == 1) {
                                    echo round($age/12) . " год";
                                }
                                if(5 > ($age/12) && ($age/12) > 1) {
                                    echo round($age/12) . " года";
                                }
                                if(($age/12) >= 5) {
                                    echo round($age/12) . " лет";
                                }
                            } else {
                                if($age == 1) {
                                    echo $age . " месяц";
                                }
                                if($age > 1 && $age < 5) {
                                    echo $age . " месяца";
                                }
                                if($age >= 5) {
                                    echo $age . " месяцев";
                                }
                            }
                        ?> </p><p class="pets-info__descr"><?=$descr?></p><button class="pets-info__btn btn btn-overlay">Забрать питомца</button></div></div></div></section><section class="gallery"><div class="container"><ul class="gallery__list"> <?php
                    $queryPetImg = "SELECT `id`, `img` FROM `images` WHERE `pet_id`=" . $pet_id;
                    $resultPetImg = mysqli_query($connection, $queryPetImg);
                    while($row = $resultPetImg->fetch_assoc()):
                ?> <li class="gallery__item"><img src="../images/pets/dogs/<?=$row['img']?>.jpg" alt="" class="gallery__img"></li> <?php endwhile;?> </ul></div></section> <?php include('../models/footer.php') ?> <?php include('../models/reg-overlay.php') ?> <div class="overlay"><div class="overlay__contact"><div class="overlay__close"><img src="../images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Обратная связь</h4><p class="overlay__descr">Впишите ваш номер телефона и мы свяжемся с вами с пятницы по понедельник с 12:00 до 18:00</p><form action="" method="post" class="overlay__form"><input type="tel" placeholder="Введите номер телефона" name="phone" id="phone" class="overlay__input title-fz16"> <button class="overlay__btn btn">Свяжитесь со мной</button></form></div></div><script src="../js/imask.js"></script><script src="../js/script.js"></script></body></html>