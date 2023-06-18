<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница питомца</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
<body>
    <?php include('../models/header.php') ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__list">
                <a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a>
                <a href="pets.php" class="breadcrumbs__link title-fz16">Наши питомцы</a>
                <a href="pets-page.php" class="breadcrumbs__link title-fz16">Страница питомца</a>
            </div>
        </div>
    </section>

    <section class="pets-info">
        <div class="container">
            <div class="pets-info__info">
                <img src="../images/pets/dogs/topsi/2.jpg" alt="Топси, девочка, 2 года. Черная с белыми пятнами." class="pets-info__img">
                <div class="pets-info__wrapper">
                    <h3 class="pets-info__title title-fz24">Топси — молодая и трогательная девочка</h3>
                    <p class="pets-info__descr">Пол: девочка</p>
                    <p class="pets-info__descr">Возраст: около 2 лет</p>
                    <p class="pets-info__descr">Наша Топси – замечательная, трогательная малышка. Ей около 2 лет. Она немного трусишка, но очень быстро, с помощью любви, ласки и вкусняшек, она научится доверять своему человеку. У Топсички печальная судьба. Ее забрала к себе молодая пара и, видимо, не расчитали свои силы, имея уже маленького ребенка и кота. У ребят просто не оказалось времени и сил на прогулки, на общение, иначе как еще объяснить то, что вернули малышку обратно в приют фактически без претензий: мебель и вещи собака не портила, двухразовый туалет строго на улице, с членами семьи была дружелюбна. Топси вернулась в приют в печальном состоянии, очень худая и в стрессе. Но время идет. Она оправилась. Набрала вес. И снова, как и раньше, носится на редких прогулках, обожает валяться в снегу. Топси отлично ходит на поводке, здорова, привита, стерилизована. Очень ласкова с людьми и дружелюбна к другим животным. А какая красотка!! Все что надо этой малышке для счастья – чтобы пришел ее единственный и неповторимый человек и забрал ее домой. Туда, где у нее будет не общий, а свой маленький уголок, где ей в первое время будет не так страшно и тревожно. И когда она поймет, что здесь ее любят, что она нужна, она со всей силой своей собачьей преданной души вернет сторицей своему человеку любви и обожания. Топси здорова, привита, стерилизована.</p>
                    <button class="pets-info__btn btn">Забрать питомца</button>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="container">
            <ul class="gallery__list">
                <li class="gallery__item">
                    <img src="../images/pets/dogs/topsi/1.jpg" alt="" class="gallery__img">
                </li>
                <li class="gallery__item">
                    <img src="../images/pets/dogs/topsi/3.jpg" alt="" class="gallery__img">
                </li>
                <li class="gallery__item">
                    <img src="../images/pets/dogs/topsi/4.jpg" alt="" class="gallery__img">
                </li>
            </ul>
        </div>
    </section>

    <?php include('../models/footer.php') ?>

</body>
</html>