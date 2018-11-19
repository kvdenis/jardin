<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $models \common\models\Coffee[] */

$this->title = 'Кофе';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php foreach ($models as $model) { ?>

        <p>

            <a style="width: 200px; text-align: left;" class="btn <?= $model->open==1 ? 'btn-success' : 'btn-default' ?>" href="<?= \yii\helpers\Url::to(['update', 'id' => $model->id]) ?>"><?= $model->id ?>. <?= $model->title ?></a>

        </p>

    <?php } ?>

</div>
