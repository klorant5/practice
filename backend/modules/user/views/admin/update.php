<?php

use backend\bundles\TempUserSaveAsset;
use yii\helpers\Html;
//
TempUserSaveAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\modules\signup\models\TempUser */

$this->title = Yii::t('user', '{modelClass}: ', [
        'modelClass' => 'Temp User',
    ]) . $model->temp_user->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Temp Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->temp_user->id, 'url' => ['view', 'id' => $model->temp_user->id]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="temp-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
