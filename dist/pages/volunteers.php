<?php
    session_start();

    include('../config/main.php');

    $path = '../images/volonteer/';
    $types = array('image/gif', 'image/png', 'image/jpeg', 'image/jpg');
    $size = 1024000000;
    $message = '';

    $queryVolonteer = "SELECT volonteer.name, volonteer.about, volonteer.image, pets.name as pet FROM `volonteer`,`pets` WHERE pets.id=volonteer.pet_id";
    $resultVolonteer = mysqli_query($connection,$queryVolonteer);

    if(!empty($_POST['add'])) {
        $name = $_POST['volonteer-name'];
        $about = $_POST['about'];
        $petName = $_POST['petName'];
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
                mysqli_query($connection, "INSERT INTO `volonteer`(`id`, `name`, `about`, `image`, `pet_id`, `user_id`) VALUES (null,'$name','$about','$imgName','$petName','$user')");
            } else {
                $message = 'Что-то пошло не так';
            }
        } else {
            $message = 'Проблемы с картинкой';
        }
        header("Location: volunteers.php");

    }

?> <!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Волонтёрство</title><link rel="stylesheet" href="../css/styles.min.css"></head><body> <?php include('../models/header.php') ?> <section class="breadcrumbs"><div class="container"><div class="breadcrumbs__list"><a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a> <a href="" class="breadcrumbs__link title-fz16">Волонтёрство</a></div></div></section><section class="who"><div class="container"> <?=$message?> <h3 class="who__title title-fz24">Кто такие волонтёры?</h3><p class="who__descr">Волонтеры - добровольные помощники, которые регулярно (обычно 1-2 раза в неделю) приходят в приют к своим подопечным. Основная задача волонтера - общаться и гулять с собаками. У многих животных трудная судьба, и нужно время и терпение, чтобы вернуть им доверие к человеку и подарить радость общения.</p><p class="who__descr">Мы всегда рады новым людям, все расскажем и научим, и у вас будут свои подопечные, которые будут ждать именно вас. Кроме того, что такая помощь неоценима по своей важности для животных, в качестве приятного бонуса вы получите ни с чем несравнимую эмоциональную обратную связь от питомцев и это так приятно и здорово - гулять с собакой в выходной. Ну а самая главная миссия волонтера - это подготовить своих подопечных к пристройству в семью и в результате найти для них любящих хозяев. Если вы не располагаете свободным временем регулярно, но хотите помогать - это тоже очень важно. Всегда нужны фотографы для съемки собак, помощники в ремонтных ра-ботах и те, кто готов пообщаться с теми собаками, у которых пока нет постоянного опекуна. И даже если вы совсем не можете посещать приют, но судьба питомцев вам небезразлична - вы тоже можете помочь, размещая информацию о нас или об отдельном ищущем дом животном по всем доступным каналам. Просто свяжитесь с нами, если хотите помогать, и, по возможности, приходите, чтобы увидеть все своими глазами.</p><button class="who__btn btn btn-overlay">Стать волонтёром</button><div class="who__wrapper"><div class="who__line"></div><img src="../images/paw-fill.svg" alt="Ораньжевая декоративная лапка" class="who__img"></div></div></section><section class="volonteer"><div class="container"> <?=$message?> <h2 class="volonteer__title title-fz28">Наши волонтёры</h2> <?php
                if(!empty($_SESSION['role']) && $_SESSION['role'] > 1) {
                    echo '<button class="catalog__btn-admin btn">Добавить запись</button>';
                }
            ?> <ul class="volonteer__list"> <?php while($row = $resultVolonteer->fetch_assoc()):?> <li class="volonteer__item"><img src="../images/volonteer/<?=$row['image']?>" alt="Волонтёр" class="volonteer__img"><div class="volonteer__gradient"><h3 class="volonteer__subtitle title-fz24"><?=$row['name']?></h3><p class="volonteer__descr">Подопечная: <?=$row['pet']?></p><p class="volonteer__descr"><?=$row['about']?></p></div></li> <?php endwhile;?> </ul></div></section> <?php include('../models/footer.php') ?> <?php include('../models/reg-overlay.php') ?> <div class="overlay-add"><div class="overlay__contact active"><div class="overlay__close"><img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Добавление записи</h4><form method="POST" class="overlay__form" enctype="multipart/form-data"><input type="text" placeholder="Введите имя" name="volonteer-name" id="volonteer-name" class="overlay__input title-fz16" required> <textarea placeholder="Введите краткое описание" name="about" id="about" class="overlay__input title-fz16" required></textarea> <select class="overlay__input overlay__input-small" name="user" id="user"> <?php
                        $resultUsers = mysqli_query($connection,"SELECT id, login FROM users");
                        while($row = $resultUsers->fetch_assoc()):
                    ?> <option value="<?=$row['id']?>"><?=$row['login']?></option> <?php endwhile;?> </select> <select class="overlay__input overlay__input-small overlay__input-margin" name="petName" id="petName"> <?php
                        $resultUsers = mysqli_query($connection,"SELECT id, name FROM pets");
                        while($row = $resultUsers->fetch_assoc()):
                    ?> <option value="<?=$row['id']?>"><?=$row['name']?></option> <?php endwhile;?> </select> <input class="overlay__input overlay__input-small" class="overlay__choose" id="picture" name="picture" type="file" required> <input class="overlay__btn btn" type="submit" name="add" value="Добавить запись"></form></div></div><div class="overlay"><div class="overlay__contact"><div class="overlay__close"><img src="../images/close.svg" alt="Крестик для закрытия" class="overlay__img"></div><h4 class="overlay__title title-fz20">Обратная связь</h4><p class="overlay__descr">Впишите ваш номер телефона и мы свяжемся с вами с пятницы по понедельник с 12:00 до 18:00</p><form action="" method="post" class="overlay__form"><input data-mask="tel" type="tel" placeholder="Введите номер телефона" name="phone" id="phone" class="overlay__input title-fz16"> <button class="overlay__btn btn">Свяжитесь со мной</button></form></div></div><script src="../js/imask.js"></script><script src="../js/script.js"></script></body></html>