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
            <div class="mb-3 col-xl-4 col-xxl-3 col-md-4 col-sm-12 my-2">
                <p class="text-primary mb-0">#Guruh</p>
                <h3 class="fs-20 mb-2 text-ov mr-3"><a class="text-black" href="analytics.html">Guruh nomi</a></h3>

            </div>
            <div class="col-xl-5 col-xxl-5 col-md-8 col-sm-12">
                <div class="row">
                    <div class="d-flex col-xl-4 align-items-center col-md-4 col-sm-4 my-2 col-6">
                        <svg class="mr-3 min-w28  ml-2" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.875 15.75H2.625C2.14175 15.75 1.75 16.1418 1.75 16.625V25.375C1.75 25.8582 2.14175 26.25 2.625 26.25H7.875C8.35825 26.25 8.75 25.8582 8.75 25.375V16.625C8.75 16.1418 8.35825 15.75 7.875 15.75Z" fill="#C6A564"></path>
                            <path d="M25.375 8.75H20.125C19.6418 8.75 19.25 9.14175 19.25 9.625V25.375C19.25 25.8582 19.6418 26.25 20.125 26.25H25.375C25.8582 26.25 26.25 25.8582 26.25 25.375V9.625C26.25 9.14175 25.8582 8.75 25.375 8.75Z" fill="#C6A564"></path>
                            <path d="M16.625 1.75H11.375C10.8918 1.75 10.5 2.14175 10.5 2.625V25.375C10.5 25.8582 10.8918 26.25 11.375 26.25H16.625C17.1082 26.25 17.5 25.8582 17.5 25.375V2.625C17.5 2.14175 17.1082 1.75 16.625 1.75Z" fill="#C6A564"></path>
                        </svg>
                        <div>
                            <h3 class="fs-20 text-black mb-0">$63.04</h3>
                            <span class="fs-14">Conversion</span>
                        </div>
                    </div>
                    <div class="d-flex col-xl-4 align-items-center col-md-4  col-sm-4 my-2 col-6">
                        <svg class="mr-3 min-w28  ml-2" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip1)">
                                <path d="M14.0001 18.3131C16.3808 18.3131 18.3108 16.3831 18.3108 14.0024C18.3108 11.6217 16.3808 9.69177 14.0001 9.69177C11.6194 9.69177 9.68945 11.6217 9.68945 14.0024C9.68945 16.3831 11.6194 18.3131 14.0001 18.3131Z" fill="#46A985"></path>
                                <path d="M27.5705 12.8083C24.257 8.80427 19.2413 4.95001 14.0001 4.95001C8.75776 4.95001 3.74086 8.80697 0.429583 12.8083C-0.143194 13.5002 -0.143194 14.5046 0.429583 15.1964C1.26208 16.2024 3.00735 18.1444 5.33834 19.8412C11.2089 24.1147 16.7783 24.1242 22.6618 19.8412C24.9928 18.1444 26.738 16.2024 27.5705 15.1964C28.1416 14.5059 28.1446 13.5025 27.5705 12.8083ZM14.0001 7.96747C17.3279 7.96747 20.035 10.6746 20.035 14.0024C20.035 17.3302 17.3279 20.0373 14.0001 20.0373C10.6722 20.0373 7.96514 17.3302 7.96514 14.0024C7.96514 10.6746 10.6722 7.96747 14.0001 7.96747Z" fill="#46A985"></path>
                            </g>
                            <defs>
                                <clipPath id="clip1">
                                    <rect width="28" height="28" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        <div>
                            <h3 class="fs-20 text-black mb-0">5,412k</h3>
                            <span class="fs-14">Viewers</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-xxl-4 col-md-12 col-sm-12">
                <div class="row">
                    <div class="d-flex col-xl-8 col-xxl-6 align-items-center col-md-9 col-sm-8 my-2 col-7">
                        <svg class="min-w28 mr-3 ml-2" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.001 0.875C6.7577 0.875 0.875983 6.75685 0.875983 14.0009C0.880359 16.319 1.51022 18.5877 2.67725 20.5873L0.8982 25.9244C0.78417 26.2666 1.10987 26.5921 1.45191 26.4782L6.55665 24.7769C8.74457 26.2915 11.3349 27.121 14.0001 27.125C21.2438 27.1248 27.1251 21.2435 27.1251 14C27.1251 6.75632 21.2442 0.875166 14.001 0.875ZM9.61488 12.6875C10.3345 12.6875 10.9274 13.2804 10.9274 14C10.9274 14.7198 10.3345 15.3125 9.61488 15.3125C8.89522 15.3125 8.30324 14.7198 8.30323 14C8.30323 13.2804 8.89521 12.6875 9.61488 12.6875ZM14.001 12.6875C14.7207 12.6875 15.3135 13.2804 15.3135 14C15.3135 14.7198 14.7206 15.3125 14.001 15.3125C13.2813 15.3125 12.6885 14.7198 12.6885 14C12.6885 13.2804 13.2813 12.6875 14.001 12.6875ZM18.3649 12.6875C19.0845 12.6875 19.6774 13.2804 19.6774 14C19.6774 14.7198 19.0845 15.3125 18.3649 15.3125C17.6452 15.3125 17.0524 14.7198 17.0524 14C17.0524 13.2804 17.6452 12.6875 18.3649 12.6875Z" fill="#FF8E26"></path>
                        </svg>
                        <div>
                            <h3 class="fs-20 text-black mb-0">2,512</h3>
                            <span class="fs-14">Comments</span>
                        </div>
                    </div>
                    <div class="d-flex col-xl-4 col-xxl-6 align-items-center col-md-3  col-sm-4 my-2 col-5">
                        <div class="d-inline-block position-relative donut-chart-sale mr-3">
                            <span class="donut1" data-peity="{ &quot;fill&quot;: [&quot;rgb(82, 177, 65)&quot;, &quot;rgba(236, 236, 236, 1)&quot;],   &quot;innerRadius&quot;: 32, &quot;radius&quot;: 10}" style="display: none;">5/8</span><svg class="peity" height="80" width="80"><path d="M 40 0 A 40 40 0 1 1 11.715728752538102 68.2842712474619 L 17.37258300203048 62.62741699796952 A 32 32 0 1 0 40 8" data-value="5" fill="rgb(82, 177, 65)"></path><path d="M 11.715728752538102 68.2842712474619 A 40 40 0 0 1 39.99999999999999 0 L 39.99999999999999 8 A 32 32 0 0 0 17.37258300203048 62.62741699796952" data-value="3" fill="rgba(236, 236, 236, 1)"></path></svg>
                            <small>71%</small>
                        </div>
                        <div class="dropdown ml-auto">
                            <div class="btn-link" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-black" href="javascript:;">Info</a>
                                <a class="dropdown-item text-black" href="javascript:;">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4><?= Html::encode($this->title) ?></h4>
            <?= Html::a('O\'quv guruhi yaratish', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-responsive-md'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute'=>'course_id',
                'value'=>function($model){
                    return $model->course->name;
                },
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Course::find()->all(),'id','name')
            ],
            [
                'attribute'=>'teacher_id',
                'value'=>function($model){
                    return $model->teacher->name;
                },
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\Teacher::find()->where(['rtom_id'=>\common\models\Rtom::findOne(['district_id'=>Yii::$app->user->identity->district_id])->id])->all(),'id','name')
            ],
            [
                'attribute'=>'group_status',
                'value'=>function($model){
                    return $model->groupStatus->name;
                },
                'filter'=>\yii\helpers\ArrayHelper::map(\common\models\GroupStatus::find()->all(),'id','name')
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
