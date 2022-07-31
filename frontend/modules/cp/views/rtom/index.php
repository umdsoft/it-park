<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\RtomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'O\'quv markazlari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rtom-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card">
        <div class="card-header">
            <h4><?= Html::encode($this->title) ?></h4>
            <?= Html::a('O\'quv markazi yaratish', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-responsive-md'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute'=>'region_id',
                'value'=>function($model){
                    return $model->region->name;
                },
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Region::find()->all(),'id','name')
            ],
            [
                'attribute'=>'district_id',
                'value'=>function($model){
                    return $model->district->name;
                },
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\District::find()->all(),'id','name')
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


            </div>
        </div>
    </div>
</div>
