<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Role::find()->all(),'id','name')) ?>
    <?= $form->field($model, 'region_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Region::find()->all(),'id','name'),[
            'prompt'=>'Viloyatni tanlang'
    ]) ?>

    <?= $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\District::find()->where(['region_id'=>$model->region_id])->all(),'id','name')) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url = Yii::$app->urlManager->createUrl(['/cp/user/getregion']);

$this->registerJs("
    $('#user-region_id').change(function(){
        $.get('{$url}?id='+ $('#user-region_id').val()).done(function(data){
            $('#user-district_id').empty();
            $('#user-district_id').append(data);
            $('#user-district_id').selectpicker('refresh');
            
        })
    })
")

?>