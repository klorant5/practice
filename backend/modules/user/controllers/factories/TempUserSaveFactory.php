<?php

namespace backend\modules\user\controllers\factories;


use backend\modules\user\controllers\actions\temp_user\BindExistingUser;
use backend\modules\user\controllers\actions\temp_user\DeleteTempUser;
use backend\modules\user\controllers\actions\temp_user\UserCreator;
use backend\modules\user\models\TempUserSaveForm;
use Yii;

class TempUserSaveFactory
{

    private static $actions = [
        'create' => UserCreator::class,
        'delete' => DeleteTempUser::class,
        'bind'   => BindExistingUser::class,
    ];


    /**
     * @param TempUserSaveForm $form
     * @return object
     */
    public static function run(TempUserSaveForm $form)
    {

        if (!empty($form->inactivate)) {
            $key = 'delete';
        } elseif (!empty($form->create_new_user)) {
            $key = 'create';
        } else {
            $key = 'bind';
        }

        $params = [
            'form' => $form
        ];
        $params["class"] = self::$actions[$key];

        return Yii::createObject($params);

    }


}