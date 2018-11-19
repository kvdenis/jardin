<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Abc */

$this->title = 'Азбука вкуса: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Азбука вкуса', 'url' => ['root']];

if ($model->parentid!=0) {

    $this->params['breadcrumbs'][] = ['label' => $model->parent->title, 'url' => ['update', 'id' => $model->parent->id]];
}

$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="abc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($model->parentid==0) { ?>

        <div class="row">

            <div class="col-lg-8">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>

            <div class="col-lg-4">

                <a class="btn btn-primary" href="<?= \yii\helpers\Url::to(['create', 'parent' => $model->id]) ?>">Добавить</a>

                <br /> <br />

                <?php foreach ($model->childes as $child) { ?>

                    <p>

                        <a class="btn btn-default" href="<?= \yii\helpers\Url::to(['update', 'id' => $child->id]) ?>"><?= $child->title ?></a>

                    </p>

                <?php } ?>

            </div>

        </div>

    <?php } else { ?>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    <?php }  ?>

</div>
