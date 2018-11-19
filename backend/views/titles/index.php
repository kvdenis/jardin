<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TitlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление разделами';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'title',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
            ],
        ],
    ]); ?>
</div>
