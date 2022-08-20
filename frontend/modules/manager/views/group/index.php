<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'O\'quv guruhlari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groups-index">

    <div class="col-xl-12 social-Campaign-audio">
        <div class="sca-row p-3 row align-items-center sp16 mx-0 mb-2 bg-white">
            <div class="mb-3 col-xl-12 col-xxl-12 col-md-4 col-sm-12 my-2">
                <h4><?= Html::encode($this->title) ?></h4>
                <?= Html::a('O\'quv guruhi yaratish', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
            </div>
            <div class="col-xl-12 col-xxl-12 col-md-8 col-sm-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-responsive-md'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'name',
                        [
                            'attribute' => 'course_id',
                            'value' => function ($model) {
                                return $model->course->name;
                            },
                            'filter' => \yii\helpers\ArrayHelper::map(\common\models\Course::find()->all(), 'id', 'name')
                        ],
                        [
                            'attribute' => 'teacher_id',
                            'value' => function ($model) {
                                return $model->teacher->name;
                            },
                            'filter' => \yii\helpers\ArrayHelper::map(\common\models\Teacher::find()->where(['rtom_id' => \common\models\Rtom::findOne(['district_id' => Yii::$app->user->identity->district_id])->id])->all(), 'id', 'name')
                        ],
                        [
                            'attribute' => 'group_status',
                            'value' => function ($model) {
                                return $model->groupStatus->name;
                            },
                            'filter' => \yii\helpers\ArrayHelper::map(\common\models\GroupStatus::find()->all(), 'id', 'name')
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
