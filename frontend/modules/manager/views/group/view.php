<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Groups */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="groups-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'rtom_id',
            'course_id',
            'begin_date',
            'end_date',
            'group_status',
            'teacher_id'
        ],
    ]) ?>

</div>


<a href="<?= Yii::$app->urlManager->createUrl(['/manager/group/create-person','id'=>$model->id])?>" class="btn btn-primary">O'quvchi qo'shish</a>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => ['class' => 'table table-responsive-md'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'full_name',
        'phone',
        'birthday',
        'gender',
        [
            'class' => \yii\grid\ActionColumn::className(),
            'urlCreator' => function ($action, $model, $key, $index, $column) {
                return \yii\helpers\Url::toRoute([$action.'-person', 'id' => $model->id]);
            }
        ],
    ],
]); ?>

<?php \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions' => ['class' => 'item'],
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('person/_list',['model'=>$model]);
    },
]) ?>

