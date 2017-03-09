<?php

use common\helpers\TempUserHelper;
use common\helpers\UserHelper;
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

    <table class="table table-bordered">
        <tr>
            <td>
                Email:
            </td>
            <td>
                <?= $model->temp_user->email ?>
            </td>
        </tr>
        <tr>
            <td>
                Type:
            </td>
            <td>
                <?= UserHelper::getPrintableUserType($model->temp_user->type) ?>
            </td>
        </tr>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <?= TempUserHelper::getPrintableStatus($model->temp_user->status) ?>
            </td>
        </tr>
        <tr>
            <td>
                Reference type:
            </td>
            <td>
                <?= UserHelper::getPrintableRefernceType($model->temp_user->reference_type) ?>
            </td>
        </tr>
        <tr>
            <td>
                Created at:
            </td>
            <td>
                <?= $model->temp_user->created_at ?>
            </td>
        </tr>


    </table>


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
