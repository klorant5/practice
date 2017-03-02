<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\phone\models\UserPhone */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('userphone', 'User Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-phone-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('userphone', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('userphone', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('userphone', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'country_code',
            'phone_number',
            'phone_type',
            'verified',
            'verification_code',
            'send_count',
            'try_count',
            'is_temp',
            'verified_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
