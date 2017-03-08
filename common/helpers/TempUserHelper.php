<?php
/**
 * Created by PhpStorm.
 * User: lorant
 * Date: 2017.03.08.
 * Time: 22:33
 */

namespace common\helpers;


use common\modules\signup\models\TempUser;
use Yii;

class TempUserHelper
{


    /**
     * @param $status
     * @return mixed
     */
    public static function getPrintableStatus($status)
    {

        $statuses = [
            TempUser::STATUS_NEW             => Yii::t("user", "New"),
            TempUser::STATUS_CLOSED_APPROVED => Yii::t("user", "Closed - Approved"),
            TempUser::STATUS_CLOSED_REJECTED => Yii::t("user", "Closed - Rejected"),
        ];

        return $statuses[$status];

    }

}