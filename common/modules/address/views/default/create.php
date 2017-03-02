<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\address\models\UserAddress */

$this->title = Yii::t('useraddress', 'Create User Address');
$this->params['breadcrumbs'][] = ['label' => Yii::t('useraddress', 'User Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
