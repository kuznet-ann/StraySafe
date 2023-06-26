<?php
include('C:\openserver\domains\stray-safe\dist\config\main.php');

// Регистрация
$errMessageLoginReg = '';
$errMessageLogin = '';
$errMessagePass = '';

// Проверка соединения
if (!$connection) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

if (!empty($_POST['reg'])) {
    $login = $_POST['reg-input'];
    $email = $_POST['email-reg'];
    $pass = $_POST['pass-reg'];

    $checkLogin = false;
    $checkEmail = false;
    $checkPass = false;

    $query = "SELECT * FROM `users` WHERE login='$login'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    
    if (($result->num_rows > 0)) {
        $errMessageLoginReg = 'Логин уже существует';
    } else {
        $checkLogin = true;
    }
    
    
    if ($checkLogin == true) {
        mysqli_query($connection, "INSERT INTO `users`(`login`, `email`, `role`, `password`) VALUES ('$login','$email','0','$pass')") or die(mysqli_error($connection));
    }
}


// Авторизация
if (!empty($_POST['login'])) {
    $login = $_POST['login-input'];
    $pass = $_POST['pass-login'];

    $queryLogin = "SELECT * FROM `users` WHERE `login` = '$login'";
    $resultLogin = mysqli_query($connection, $queryLogin) or die(mysqli_error($connection));

    if ($resultLogin->num_rows > 0) {
        $queryPass = "SELECT * FROM `users` WHERE `password` = '$pass'";
        $resulPass = mysqli_query($connection, $queryPass) or die(mysqli_error($connection));
        if ($resulPass->num_rows > 1) {
            echo '1';
        } else {
            $errMessagePass = 'Пароль введён неверно';
        }
    } else {
        $errMessageLogin = 'Такого пользователя не существует';
    }
}


?>
<div class="overlay">
    <div class="overlay__contact overlay__contact-reg active">
        <div class="overlay__close">
            <img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img">
        </div>
        <h4 class="overlay__title title-fz20">Регистрация</h4>
        <form method="POST" class="overlay__form">
            <input type="tel" placeholder="Введите логин" name="reg-input" id="reg-input" class="overlay__input title-fz16" required>
            <div class="reg__text reg__err"><?= $errMessageLoginReg ?></div>
            <input type="email" placeholder="Введите почту" name="email-reg" id="email-reg" class="overlay__input title-fz16" required>
            <input type="password" placeholder="Введите пароль" name="pass-reg" id="pass-reg" class="overlay__input title-fz16" required>
            <input class="overlay__btn btn" type="submit" name="reg" value="Зарегестрироваться">
        </form>
        <button class="overlay__link overlay__link-login title-fz16">Уже есть аккаунт?</button>
    </div>

    <div class="overlay__contact overlay__contact-login">
        <div class="overlay__close">
            <img src="/dist/images/close.svg" alt="Крестик для закрытия" class="overlay__img">
        </div>
        <h4 class="overlay__title title-fz20">Вход</h4>
        <form method="POST" class="overlay__form">
            <input type="tel" placeholder="Введите логин" name="login-input" id="login-input" class="overlay__input title-fz16" required>
            <?=$errMessageLogin?>
            <input type="password" placeholder="Введите пароль" name="pass-login" id="pass-login" class="overlay__input title-fz16" required>
            <?=$errMessagePass?>
            <input class="overlay__btn btn" type="submit" name="login" value="Войти">
        </form>
        <button class="overlay__link overlay__link-reg title-fz16">Нет аккаунта?</button>
    </div>
</div>