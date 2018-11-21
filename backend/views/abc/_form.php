<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Abc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abc-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php if ($model->parentid==0) { ?>

        <div class="row">

            <div class="col-lg-8">

                <?=  $form->field($model, 'img')->fileInput(['accept' => 'image/*']); ?>

            </div>

            <div class="col-lg-4">

                <?php if ($model->image) { ?>

                    <img src="<?= $model->getUrlImage() ?>" style="width: 200px;" />

                <?php } ?>

            </div>

        </div>

    <?php } else { ?>

        <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?php } ?>

    <div class="form-group">

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

        <?php if (!$model->isNewRecord) { ?>

            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Точно удалить ?',
                    'method' => 'post',
                ],
            ]) ?>

        <?php } ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
