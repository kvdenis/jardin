<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Coffee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coffee-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?php if ($model->parentid==0) { ?>


            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'rating')->dropDownList(['1' => '1', '2' => '2', '3' => '3', '4' => '4'], [
                'prompt' => '',
            ]) ?>

            <?= $form->field($model, 'open')->dropDownList(['1' => 'Доступно', '2' => 'Закрыто'], [
                'prompt' => '',
            ]) ?>


            <?= $form->field($model, 'composition')->textarea(['rows' => 6]) ?>

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

                <div class="coffee-image">

                    <?php if ($model->image) { ?>

                        <img src="<?= $model->getUrlImage() ?>" style="width: 200px;" />

                    <?php } ?>

                </div>

            </div>


    <?php } else { ?>

        <div class="row">

            <div class="col-lg-4">

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'pack')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'shop1')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'shop2')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'shop3')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'shop4')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'shop5')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'shop6')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'shop7')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'tpe')->dropDownList(\common\models\Coffee::getTpeItems(), [
                    'prompt' => '',
                ]) ?>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-4">

                <?=  $form->field($model, 'img')->widget(\kartik\file\FileInput::class, [
                    'options' => ['accept' => 'image/*'],
                    'showMessage' => false,
                    'resizeImages' => true,
                    'pluginOptions' => [
                        'theme' => 'explorer',
                    ],
                ]); ?>

            </div>

            <div class="col-lg-4">

                <?php if ($model->image) { ?>

                    <img src="<?= $model->getUrlImage() ?>" style="width: 200px;" />

                <?php } ?>

            </div>

        </div>

    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
