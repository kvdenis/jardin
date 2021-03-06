<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Radio */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Музыка настоящего', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Удалить', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Вы действительно хотите удалить этот элемент?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'url:url',
        ],
    ]) ?>

</div>
