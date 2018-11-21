<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?=  $form->field($model, 'mp4')->fileInput(['accept' => '*']); ?>

    <div class="form-group">

        <div class="">

            <?=  $form->field($model, 'img')->widget(\kartik\file\FileInput::class, [
                'options' => ['accept' => 'image/*'],
                'showMessage' => false,
                'resizeImages' => true,
                'pluginOptions' => [
                    'theme' => 'explorer',
                ],
            ]); ?>

        </div>

        <div class="video-image">

            <?php if ($model->image) { ?>

                <img src="<?= $model->getUrlImage() ?>" style="width: 200px;" />

            <?php } ?>

        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
