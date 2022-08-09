<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Person */
/* @var $group common\models\GroupPerson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">


    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'uid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'gender')->dropDownList(Yii::$app->params['gender_form'],['prompt'=>'Jinsini tanlang']) ?>

    <?= $form->field($group, 'person_status_id')->dropDownList(ArrayHelper::map(\common\models\PersonStatus::find()->all(),'id','name'),['prompt'=>'O`quvchi statusni tanlang']) ?>

    <?= $form->field($group, 'social_status_id')->dropDownList(ArrayHelper::map(\common\models\SocialStatus::find()->all(),'id','name'),['prompt'=>'Ijtimoiy statusni tanlang']) ?>

    <?= $form->field($group, 'project_id')->dropDownList(ArrayHelper::map(\common\models\Project::find()->all(),'id','name'),['prompt'=>'Loyihani tanlang']) ?>

    <?= $form->field($group, 'training')->dropDownList([1=>'Ha',2=>'Yo`q'],['prompt'=>'tanlang']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



<?php

$url = Yii::$app->urlManager->createUrl(['/manager/group/getuid']);
$this->registerJs("
    $('#person-uid').keyup(function(){
        $.get('{$url}?id='+$('#person-uid').val()).done(function(data){
            if(data != 0){
                data = JSON.parse(data);
                $('#person-full_name').val(data.full_name);
                $('#person-phone').val(data.phone);
                $('#person-birthday').val(data.birthday);
                $('#person-gender').val(data.gender);
                $('#person-gender').selectpicker('refresh');
            }
        })
    })
");
?>