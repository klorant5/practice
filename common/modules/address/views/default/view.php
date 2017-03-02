<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\address\models\UserAddress */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('useraddress', 'User Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('useraddress', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('useraddress', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('useraddress', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'is_temp',
            'address_type',
            'country_id',
            'city',
            'street',
            'street_section',
            'building_number',
            'floor',
            'door',
            'name_of_venue',
            'district',
            'zipcode',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
