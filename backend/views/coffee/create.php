<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Coffee */

$this->title = 'Create Coffee';
$this->params['breadcrumbs'][] = ['label' => 'Coffees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
