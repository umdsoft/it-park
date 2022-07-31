<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Groups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'course_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Course::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'teacher_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Teacher::find()->where(['rtom_id'=>\common\models\Rtom::findOne(['district_id'=>Yii::$app->user->identity->district_id])->id])->all(),'id','name')) ?>

    <?= $form->field($model, 'begin_date')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'end_date')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'group_status')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\GroupStatus::find()->all(),'id','name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
