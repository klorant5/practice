<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\signup\models\TempUser */

$this->title = Yii::t('user', 'Update {modelClass}: ', [
    'modelClass' => 'Temp User',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Temp Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="temp-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
