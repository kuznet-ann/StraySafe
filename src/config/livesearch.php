<?php
    include("main.php");
    if(isset($_POST['input'])) {
        $input = $_POST['input'];

        $query = "SELECT * FROM `pets` WHERE name LIKE '{$input}%'";

        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
                <li class="catalog__item">
                    <a href="pets-page.php?pet_id=<?=$row['id']?>" class="catalog__link">
                        <img src="../images/pets/<?php
                            switch ($row['type']) {
                                case 'собака':
                                    echo 'dogs';
                                    break;
                                
                                case 'кот':
                                    echo 'cats';
                                    break;

                                default:
                                    echo '';
                                    break;
                            }
                        ?>/<?=$row['avatar']?>" alt="Тесси, девочка, 3,5 месяца. Черный окрас с белыми пятнами." class="catalog__img">
                        <div class="catalog__gradient">
                            <h3 class="catalog__title title-fz24"><?=$row['name']?></h3>
                            <p class="catalog__descr catalog__descr-age">
                                <?php 
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
                                ?>
                            </p>
                            <p class="catalog__descr"><?=$row['descr']?></p>
                            <div class="catalog__item-wrappper">
                                <button class="catalog__btn btn">Забрать питомца</button>
                                <img src="../images/paw-fill.svg" alt="ораньжевая декоративная лапка" class="catalog__icon">
                            </div>
                        </div>
                    </a>
                </li>
                <?php
            }
        } else {
            echo "Информация не найдена";
        }
    }
?>