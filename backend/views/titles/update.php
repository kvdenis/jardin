<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Titles */

$this->title = 'Управление разделами: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Управление разделами', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['index', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="titles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
