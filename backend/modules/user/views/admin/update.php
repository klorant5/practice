<?php

use backend\bundles\TempUserSaveAsset;
use common\helpers\TempUserHelper;
use common\helpers\UserHelper;
use common\modules\signup\models\TempUser;
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

    <table class="table table-bordered">
        <tr>
            <td>
                Email:
            </td>
            <td>
                <?= $model->temp_user->email ?>
            </td>
        </tr>
        <tr>
            <td>
                Type:
            </td>
            <td>
                <?= UserHelper::getPrintableUserType($model->temp_user->type) ?>
            </td>
        </tr>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <?= TempUserHelper::getPrintableStatus($model->temp_user->status) ?>
            </td>
        </tr>
        <tr>
            <td>
                Reference type:
            </td>
            <td>
                <?= UserHelper::getPrintableRefernceType($model->temp_user->reference_type) ?>
            </td>
        </tr>
        <tr>
            <td>
                Created at:
            </td>
            <td>
                <?= $model->temp_user->created_at ?>
            </td>
        </tr>


    </table>
    <?php
    if ($model->temp_user->status == TempUser::STATUS_NEW):

        echo $this->render('_form', [
            'model' => $model,
        ]);
    endif;
    ?>

</div>
