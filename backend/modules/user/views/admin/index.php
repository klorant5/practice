<?php

use common\helpers\TempUserHelper;
use common\helpers\UserHelper;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\user\models\searches\TempUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('user', 'Temp Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temp-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel'  => $searchModel,
        'columns'      => [
            'id',
            'email',
            [
                'label' => 'User type',
                'value' => function ($model) {
                    return UserHelper::getPrintableUserType($model->type, $model->debt_collector);
                },
            ],
            [
                'label' => 'Status',
                'value' => function ($model) {
                    return TempUserHelper::getPrintableStatus($model->status);
                },
            ],
            [
                    'label' => 'Reference type',
                'value' => function($model) {
                    return UserHelper::getPrintableRefernceType($model->reference_type);
                }
            ],
            'created_at',
            // 'updated_at',
            // 'tld',
            // 'nationality',
            // 'debt_collector',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
