<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoffeeTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Описание коллекций';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffee-text-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'info1:ntext',
            'info2:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
