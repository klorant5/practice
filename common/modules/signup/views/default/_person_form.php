<?php

use common\modules\signup\models\CompanySignUpForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true
]); ?>


    <div class="row">
        <div class="col-sm-6 text-center">
            <h2><?= Yii::t("signup", "Person details") ?></h2>
        </div>
        <div class="col-sm-6 text-center">
            <h2><?= Yii::t("signup", "Postal address") ?></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'nationality')->textInput() ?>

            <?= $this->render("_name_inputs", compact(["form", "model", "signUpType"])) ?>


            <?= $form->field($model, 'nric')->textInput() ?>
            <?= $form->field($model, 'passport_number')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $this->render('_location_inputs', compact(['form', 'model'])) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6 text-center">
            <h2><?= Yii::t("signup", "Contacts") ?></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">

            <?= $this->render("_contact_email_and_phone", compact(["form", "model", "signUpType"])) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('signup', 'I send a registration request'), ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>