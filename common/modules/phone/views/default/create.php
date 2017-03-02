<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\phone\models\UserPhone */

$this->title = Yii::t('userphone', 'Create User Phone');
$this->params['breadcrumbs'][] = ['label' => Yii::t('userphone', 'User Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-phone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
