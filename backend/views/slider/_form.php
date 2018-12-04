<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <div class="row">

        <div class="col-lg-4">

            <?=  $form->field($model, 'img')->fileInput(['accept' => 'image/*']); ?>

        </div>

        <div class="col-lg-4">

            <?php if ($model->image) { ?>

                <img src="<?= $model->getUrlImage() ?>" style="width: 200px;" />

            <?php } ?>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-3">

            <?= $form->field($model, 'open')->dropDownList([\common\models\Coffee::STATUS_ACTIVE => 'Доступно', '2' => 'Закрыто'], [
                'prompt' => '',
            ]) ?>

        </div>

    </div>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
