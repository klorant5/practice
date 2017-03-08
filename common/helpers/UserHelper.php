<?php

namespace common\helpers;


use common\models\User;
use Yii;

class UserHelper
{


    /**
     * @param int $userType
     * @param int $isDebtCollector
     * @return string
     */
    public static function getPrintableUserType($userType, $isDebtCollector = 0)
    {

        if ($isDebtCollector) {
            return Yii::t("user", "Debt collector");
        } else {
            $userTypes = [
                User::TYPE_COMPANY          => Yii::t("user", "Company"),
                User::TYPE_PERSON           => Yii::t("user", "Person"),
                User::TYPE_COMPANY_SUB_USER => Yii::t("user", "Company Sub-user"),
            ];

            return $userTypes[$userType];
        }
    }


    public static function getPrintableStatus()
    {

    }

    /**
     * @param $referenceType
     * @return mixed
     */
    public static function getPrintableRefernceType($referenceType)
    {
        $referenceTypes = [
            User::REFERENCE_TYPE_SIGN_UP => Yii::t("user", "Sign up")
        ];

        return $referenceTypes[$referenceType];
    }

}