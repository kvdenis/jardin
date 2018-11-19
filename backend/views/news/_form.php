<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form col-lg-8">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <div class="row">

        <div class="col-lg-6">

            <?=  $form->field($model, 'img')->widget(\kartik\file\FileInput::class, [
                'options' => ['accept' => 'image/*'],
            ]); ?>

        </div>

        <div class="col-lg-6">

            <?php if ($model->image) { ?>
            
                <img src="<?= $model->getUrlImage() ?>" style="width: 200px;" />
                
            <?php } ?>

        </div>

    </div>

    <?= $form->field($model, 'dte')->widget(\yii\jui\DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>