<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CoffeeText */

$this->title = 'Описание коллекций';
?>
<div class="coffee-text-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
