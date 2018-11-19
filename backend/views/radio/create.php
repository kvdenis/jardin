<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Radio */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Музыка настоящего', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="radio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
