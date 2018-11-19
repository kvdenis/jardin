<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Coffee */

$this->title = 'Кофе: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Кофе', 'url' => ['root']];

if ($model->parentid!=0) {

    $this->params['breadcrumbs'][] = ['label' => $model->parent->title, 'url' => ['update', 'id' => $model->parent->id]];
}

$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="coffee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($model->parentid==0) { ?>

    <div class="row">

        <div class="col-lg-6">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>

        <div class="col-lg-6">

            <?php foreach ($model->coffees as $child) { ?>

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
