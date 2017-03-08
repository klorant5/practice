<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\signup\models\TempUser */

$this->title = Yii::t('user', 'Create Temp User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Temp Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temp-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
