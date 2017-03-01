<?php

$title = $form->field($model, 'contact_title')->dropDownList([
    1 => 'Mr.',
    2 => 'Mrs.',
    3 => 'Ms.',
    4 => 'Prof.',
    5 => 'Dr.',
    6 => 'Gen.',
    7 => 'Rep.',
    8 => 'Sen.',
]);
$firstName = $form->field($model, 'contact_firstname')->textInput();
$lastName = $form->field($model, 'contact_lastname')->textInput();

$fakeLabel = '';
if ($signUpType != 2) {
    $title->label(false);
    $firstName->label(false);
    $lastName->label(false);
    $fakeLabel = '<div class="col-sm-12"><label for="asdasd">' . Yii::t("signup", "Contact person name") . '</label></div>';
}

?>

<div class="row">
    <?= $fakeLabel ?>
    <div>
        <div class="col-sm-4">
            <?= $title ?>
        </div>
        <div class="col-sm-4">
            <?= $firstName ?>
        </div>
        <div class="col-sm-4">
            <?= $lastName ?>
        </div>
    </div>
</div>