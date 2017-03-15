<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ->temp_user common\modules\signup\models\TempUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temp-user-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'enableAjaxValidation'   => true,
    ]); ?>

    <?= $form->field($model, "inactivate")->checkbox() ?>
    <div class="creator_inputs">

        <?= $form->field($model, "create_new_user")->checkbox() ?>
        <div class="existing_num_input">
            <?= $form->field($model, "existing_user_id")->textInput() ?>

        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
