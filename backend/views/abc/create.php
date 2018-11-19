<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Abc */

$this->title = 'Добавление вкуса';
$this->params['breadcrumbs'][] = ['label' => 'Азбука вкуса', 'url' => ['root']];

if ($model->parentid!=0) {

    $this->params['breadcrumbs'][] = ['label' => $model->parent->title, 'url' => ['update', 'id' => $model->parent->id]];
}

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
