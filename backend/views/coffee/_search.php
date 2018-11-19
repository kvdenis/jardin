<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CoffeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coffee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parentid') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'info') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'composition') ?>

    <?php // echo $form->field($model, 'pack') ?>

    <?php // echo $form->field($model, 'tpe') ?>

    <?php // echo $form->field($model, 'line') ?>

    <?php // echo $form->field($model, 'shop1') ?>

    <?php // echo $form->field($model, 'shop2') ?>

    <?php // echo $form->field($model, 'shop3') ?>

    <?php // echo $form->field($model, 'shop4') ?>

    <?php // echo $form->field($model, 'shop5') ?>

    <?php // echo $form->field($model, 'shop6') ?>

    <?php // echo $form->field($model, 'shop7') ?>

    <?php // echo $form->field($model, 'open') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
