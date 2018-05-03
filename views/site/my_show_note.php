<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <p>Все созданые ранее заметки:</p>
    <br>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Дата создания</th>
                <th>Тема</th>
                <th>Содержание</th>
                <th>Редактирование</th>
                <th>Удаление</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($notes as $n ):?>
                <tr>
                    <td><?= $n['create_date']?></td>
                    <td><?= $n['note_topic']?></td>
                    <td><?= $n['note_data']   ?></td>
                    <td>
                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-11">
                                <p><a class="btn btn-primary btn-sm" href=<?= \yii\helpers\Url::to(['note/update', 'id' => $n['id']]) ?>>
                                        Изменить</a></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-11">
                                <p><a class="btn btn-danger btn-sm" href=<?= \yii\helpers\Url::to(['note/delete', 'id' => $n['id']]) ?>>
                                        Удалить</a></p>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <p><a class="btn btn-success" href=<?= \yii\helpers\Url::to(['site/note']) ?>>
                    Новая заметка</a></p>

        </div>
    </div>


    <div class="col-lg-offset-1" style="color:#999;">
    </div>
</div>
