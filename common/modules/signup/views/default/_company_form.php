<?php

use common\modules\signup\models\CompanySignUpForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new CompanySignUpForm();

$form = ActiveForm::begin([
    'id' => 'form-signup',
    'enableClientValidation' => false,
    'enableAjaxValidation' => true
]); ?>



<div class="row">
    <div class="col-sm-6">
        <h2>Company details</h2>
    </div>
    <div class="col-sm-6">
        <h2>Office address</h2>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'location')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'country')->textInput() ?>
    </div>
</div>

<!--...-->

<div class="form-group">
    <?= Html::submitButton('I send a registration request', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>