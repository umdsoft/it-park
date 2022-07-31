<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Rtom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rtom-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Region::find()->all(),'id','name'),[
        'prompt'=>'Viloyatni tanlang'
    ]) ?>

    <?= $form->field($model, 'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\District::find()->where(['region_id'=>$model->region_id])->all(),'id','name')) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url = Yii::$app->urlManager->createUrl(['/cp/user/getregion']);

$this->registerJs("
    $('#rtom-region_id').change(function(){
        $.get('{$url}?id='+ $('#rtom-region_id').val()).done(function(data){
            $('#rtom-district_id').empty();
            $('#rtom-district_id').append(data);
            $('#rtom-district_id').selectpicker('refresh');;
            
        })
    })
")

?>