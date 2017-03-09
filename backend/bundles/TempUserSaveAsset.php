<?php

namespace backend\bundles;


use frontend\assets\AppAsset;
use yii\web\AssetBundle;

class TempUserSaveAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/temp_user';
    public $css = [
    ];
    public $js = [
        'js/temp_user_save.js'
    ];
    public $depends = [
        AppAsset::class
    ];
}