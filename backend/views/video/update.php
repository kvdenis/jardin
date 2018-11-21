<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = 'Изменить: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Раздел с видео', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
