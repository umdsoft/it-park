<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Tizimga kirish</h4>
                                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                        <div class="form-group">
                                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                        </div>
                                        <div class="form-group">
                                            <?= $form->field($model, 'password')->passwordInput() ?>
                                        </div>

                                        <div class="text-center">
                                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                                        </div>
                                    <?php ActiveForm::end(); ?>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

