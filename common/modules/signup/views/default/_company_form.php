<?php

use common\modules\signup\models\CompanySignUpForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new CompanySignUpForm();
$signUpType = 1;    //company

$form = ActiveForm::begin([
    'id' => 'form-signup',
    'enableClientValidation' => false,
    'enableAjaxValidation' => true
]); ?>


    <div class="row">
        <div class="col-sm-6 text-center">
            <h2><?= Yii::t("signup", "Company details") ?></h2>
        </div>
        <div class="col-sm-6 text-center">
            <h2><?= Yii::t("signup", "Office address") ?></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'location')->textInput() ?>
            <?= $form->field($model, 'company_name')->textInput() ?>
            <?= $form->field($model, 'company_regnum')->textInput() ?>
            <?= $form->field($model, 'duns_number')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $this->render('_location_inputs', compact(['form', 'model'])) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6 text-center">
            <h2><?= Yii::t("signup", "Contact informations") ?></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $this->render("_name_inputs", compact(["form", "model", "signUpType"])) ?>
            <?= $this->render("_contact_email_and_phone", compact(["form", "model", "signUpType"])) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('signup', 'I send a registration request'), ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>