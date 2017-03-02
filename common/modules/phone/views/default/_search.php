<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\phone\models\searches\UserPhoneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-phone-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'country_code') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?= $form->field($model, 'phone_type') ?>

    <?php // echo $form->field($model, 'verified') ?>

    <?php // echo $form->field($model, 'verification_code') ?>

    <?php // echo $form->field($model, 'send_count') ?>

    <?php // echo $form->field($model, 'try_count') ?>

    <?php // echo $form->field($model, 'is_temp') ?>

    <?php // echo $form->field($model, 'verified_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('userphone', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('userphone', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
