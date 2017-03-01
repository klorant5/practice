
<?= $form->field($model, 'country')->textInput() ?>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'city')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'zip')->textInput() ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'building_number')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'street')->textInput() ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'floor')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'door')->textInput() ?>
    </div>
</div>