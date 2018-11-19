<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CoffeeText */

$this->title = 'Create Coffee Text';
$this->params['breadcrumbs'][] = ['label' => 'Coffee Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffee-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
