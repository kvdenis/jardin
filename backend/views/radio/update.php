<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Radio */

$this->title = 'Музыка настоящего: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Музыка настоящего', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="radio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
