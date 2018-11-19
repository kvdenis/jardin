<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoffeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coffees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Coffee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parentid',
            'title',
            'info:ntext',
            'image',
            //'rating',
            //'composition:ntext',
            //'pack',
            //'tpe',
            //'line',
            //'shop1',
            //'shop2',
            //'shop3',
            //'shop4',
            //'shop5',
            //'shop6',
            //'shop7',
            //'open',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
