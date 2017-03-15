<?php


namespace common\modules\signup\controllers\factories;


use common\modules\signup\models\CompanySignUpForm;
use common\modules\signup\models\PersonSignUpForm;
use Yii;

class SignUpFormFactory
{

    const TYPE_COMPANY_FORM = 1;
    const TYPE_PERSON_FORM = 2;
    const TYPE_DEBT_COLLECTOR_FORM = 3;


    private static $formTypes = [
        self::TYPE_COMPANY_FORM        => CompanySignUpForm::class,
        self::TYPE_PERSON_FORM         => PersonSignUpForm::class,
        self::TYPE_DEBT_COLLECTOR_FORM => CompanySignUpForm::class,
    ];

    /**
     * @param integer $type
     * @param array $params
     * @return object
     */
    public static function run($type, $params = [])
    {

        if ($type == self::TYPE_DEBT_COLLECTOR_FORM) {
            $params['debt_collector'] = 1;
        }

        if (YII_ENV == 'local') {
            $params['fake_data'] = true;
        }

        $params['class'] = self::$formTypes[$type];

        return Yii::createObject($params);

    }


}