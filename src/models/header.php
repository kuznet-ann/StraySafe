<?php session_start(); ?>

<header class="menu">
        <div class="container">
            <nav class="menu__navigation">
                <a href="/dist/index.php" class="menu__link">
                    <img src="/dist/images/logo-horizontal.svg" alt="Логотип StraySafe" class="menu__logo">
                </a>
        
                <div class="menu__list-bg">
                    <div class="menu__close">
                        <div class="menu__icon-close menu__icon-close-1"></div>
                        <div class="menu__icon-close menu__icon-close-2"></div>
                    </div>
                    <ul class="menu__list">
                        <li class="menu__item"><a href="/dist/pages/pets.php" class="menu__link title-fz16">Наши питомцы</a></li>
                        <li class="menu__item"><a href="/dist/pages/volunteers.php" class="menu__link title-fz16">Волонтёрство</a></li>
                        <li class="menu__item"><a href="/dist/pages/events.php" class="menu__link title-fz16">Мероприятия</a></li>
                        <li class="menu__item"><a href="/dist/pages/foundhome.php" class="menu__link title-fz16">Нашли дом</a></li>
                        <li class="menu__item"><a href="/dist/pages/about.php" class="menu__link title-fz16">О нас</a></li>
                        <?php
                            if (empty($_SESSION['login'])) {
                                echo '<li class="menu__item btn-overla-reg"><img src="/dist/images/user.png" alt="Иконка профила" class="menu__user"></li>';
                            }
                        ?>
                        <?php if(!empty($_SESSION['login'])) :?>
                            <li class="menu__item"><a href="/dist/pages/account.php" class="menu__link"><img src="/dist/images/user.png" alt="Иконка профила" class="menu__user"></a></li>
                            <li class="menu__item"><a href="/dist/models/exit.php" class="menu__link title-fz16">Выход</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="menu__hamburger">
                    <div class="menu__icon menu__icon-1"></div>
                    <div class="menu__icon menu__icon-2"></div>
                    <div class="menu__icon menu__icon-3"></div>
                </div>
    
            </nav>
        </div>
    </header>