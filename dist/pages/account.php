<?php
    session_start();

    include('../config/main.php');
?> <!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Личный кабинет</title><link rel="icon" type="image/x-icon" href="../images/logo.svg"><link rel="stylesheet" href="../css/styles.min.css"></head><body> <?php include('../models/header.php') ?> <section class="breadcrumbs"><div class="container"><div class="breadcrumbs__list"><a href="../index.php" class="breadcrumbs__link title-fz16">Главная</a> <a href="account.php" class="breadcrumbs__link title-fz16">Личный кабинет</a></div></div></section><section class="account"><div class="container"><h3 class="account__title title title-fz24">Персональные данные</h3><ul class="account__list"><li class="account__item">Логин: <?= $_SESSION['login']?> </li><li class="account__item">Почта: <?= $_SESSION['email']?> </li><li class="account__item">Телефон: <?= $_SESSION['phone']?> </li><li class="account__item">Роль: <?php
                        switch ($_SESSION['role']) {
                            case '0':
                                echo 'Пользователь';
                                break;

                            case '1':
                                echo 'Волонтёр';
                                break;

                            case '2':
                                echo 'Редактор';
                                break;

                            case '3':
                                echo 'Администратор';
                                break;
                            
                            default:
                                echo 'Не удалось определить';
                                break;
                        }
                    ?> </li></ul></div></section> <?php include('../models/footer.php') ?> <script src="../js/imask.js"></script><script src="../js/script.js"></script></body></html>