<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_name',
            'online_status',
            'pas_md5',
            'cook_key',
            'email:email',
            'reg_date',
        ],
    ]) ?>
</div>

<?php //$notes = $model->note ?>
<!---->
<!--<div class="table-responsive">-->
<!--    <table class="table table-hover table-striped">-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th>Дата создания</th>-->
<!--            <th>Тема</th>-->
<!--            <th>Содержание</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!---->
<!--        --><?php //foreach ($notes as $n ):?>
<!--        <tr>-->
<!--            <td>--><?//= $n['create_date']?><!--</td>-->
<!--            <td>--><?//= $n['note_topic']?><!--</td>-->
<!--<!--            <td><a href="-->--><?////= \yii\helpers\Url::to(['note/view', 'id' => $n])?><!--<!--">-->--><?////= $n['note_topic']?><!--<!--</a></td>-->-->
<!--            <td>--><?//= $n['note_data']   ?><!--</td>-->
<!--        </tr>-->
<!--        --><?php //endforeach ?>
<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->
