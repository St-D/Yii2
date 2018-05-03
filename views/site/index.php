<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <?php
        if (Yii::$app->user->isGuest)
        {
            echo '<h1>Приветсвую Вас!</h1><br>
            <p class="lead">Для того чтобы начать авторизируйетсь или зарегистируйтесь!</p>';
        }
        else
        {
            echo '<h1>Приветсвую Вас, '.Yii::$app->user->identity['user_name'].'!</h1><br>
            <p class="lead">Вы успешно авторизовались! Делайте новые и просматривайте старые заметки!</p>';
        }
        ?>

<!--        <p class="lead">Вы успешно авторизовались! Делайте новые и просматривайте старые заметки!</p>-->

<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
        <br>
        <p class="lead">Наш сервис - это заметки на любую тему!</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h3>За словесными горами </h3>

                <p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех
                    живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль
                    журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна,
                    в которой жаренные члены предложения залетают прямо в рот. Даже всемогущая пунктуация не имеет
                    власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка
                    рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики.
                    Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой,
                    но текст не дал сбить</p>

<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
            </div>
            <div class="col-lg-4">
                <h3>Страдания юного Вертера</h3>

                <p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего
                    сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так
                    счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого. Ни одного
                    штриха не мог бы я сделать, а никогда не был таким большим художником, как в эти минуты.
                    Когда от милой моей долины поднимается пар и полдневное солнце стоит над непроницаемой
                    чащей темного леса и лишь редкий луч проскальзывает в его святая святых, а я лежу в высокой
                    траве у быстрого ручья и, прильнув</p>

<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
            </div>
            <div class="col-lg-4">
                <h3>Кафка</h3>

                <p>Проснувшись однажды утром после беспокойного сна, Грегор Замза обнаружил, что он у себя
                    в постели превратился в страшное насекомое. Лежа на панцирнотвердой спине, он видел, стоило
                    ему приподнять голову, свой коричневый, выпуклый, разделенный дугообразными чешуйками живот
                    , на верхушке которого еле держалось готовое вот-вот окончательно сползти одеяло.
                    Его многочисленные, убого тонкие по сравнению с остальным телом ножки беспомощно копошились
                    у него перед глазами. «Что со мной случилось?» – подумал он. Это не было сном. Его комната,
                    настоящая, разве что слишком маленькая, но обычная комната, мирно покоилась в своих четырех
                    хорошо знакомых стенах. Над столом, где были разложены распакованные образцы сукон ...</p>

<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            </div>
        </div>

    </div>
</div>
