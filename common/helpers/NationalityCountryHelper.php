<?php


namespace common\helpers;


use common\modules\user\models\Country;
use common\modules\user\models\Nationality;
use Yii;
use yii\helpers\ArrayHelper;

class NationalityCountryHelper
{

    public static function getNationalityDropdownValues($withDefault = true)
    {
        $values = [];
        if($withDefault) {
            $values = [
                0 => Yii::t("nationality", "Please Choose"),
            ];
        }

        $dbData = Nationality::find()->asArray()->all();

        return ArrayHelper::merge($values, ArrayHelper::map($dbData, "nationality_id", "name"));

    }


    public static function getCountryDropdownValues($withDefault = true)
    {
        $values = [];
        if($withDefault) {
            $values = [
                0 => Yii::t("nationality", "Please Choose"),
            ];
        }

        $dbData = Country::find()->asArray()->all();

        return ArrayHelper::merge($values, ArrayHelper::map($dbData, "id", "name"));


    }
}