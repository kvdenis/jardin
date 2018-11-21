<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $models \common\models\Abc[] */

$this->title = 'Азбука вкуса';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php foreach ($models as $model) { ?>

         <a style="" class="btn btn-default abc-item" href="<?= \yii\helpers\Url::to(['update', 'id' => $model->id]) ?>"><?= $model->title ?></a>


    <?php } ?>

</div>
