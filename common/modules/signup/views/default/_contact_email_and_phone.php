<?php

$contactMailInput = $form->field($model, 'contact_email')->textInput();
if($signUpType == 2){
    $contactMailInput->label(Yii::t("signup", "Email"));
}

?>

<div class="row">
    <div class="col-sm-12">
        <?= $contactMailInput ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?= $form->field($model, 'contact_phone_type')->dropDownList([
            0 => Yii::t("signup", "Please choose a phone type!"),
            1 => Yii::t("signup", "Cell phone"),        //TODO
            2 => Yii::t("signup", "Wired phone")
        ]) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'contact_phone_country_code')->dropDownList([
            1 => 'Afganistan',      //TODO
            2 => 'Andora'
        ])->label(false) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'contact_phone_number')->textInput()->label(false) ?>
    </div>
</div>
