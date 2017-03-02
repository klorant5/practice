<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\phone\models\UserPhone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-phone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'country_code')->textInput() ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_type')->textInput() ?>

    <?= $form->field($model, 'verified')->textInput() ?>

    <?= $form->field($model, 'verification_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send_count')->textInput() ?>

    <?= $form->field($model, 'try_count')->textInput() ?>

    <?= $form->field($model, 'is_temp')->textInput() ?>

    <?= $form->field($model, 'verified_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('userphone', 'Create') : Yii::t('userphone', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
