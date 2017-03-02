<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\phone\models\UserPhone */

$this->title = Yii::t('userphone', 'Update {modelClass}: ', [
    'modelClass' => 'User Phone',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('userphone', 'User Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('userphone', 'Update');
?>
<div class="user-phone-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
