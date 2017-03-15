<?php

namespace backend\modules\user\models;


use backend\modules\user\controllers\factories\TempUserSaveFactory;
use common\models\User;
use yii\base\Model;

class TempUserSaveForm extends Model
{

    public $temp_user;

    public $inactivate;
    public $create_new_user;
    public $existing_user_id;

    public $errorMsg;

//    public $asadf;


    public function rules()
    {
        return [
            [['inactivate', 'create_new_user'], 'safe'],
            ['existing_user_id', 'validateExistingUserId'],
        ];
    }

    /**
     *
     */
    public function validateExistingUserId()
    {
        if (empty($this->inactivate) && empty($this->create_new_user)) {

            $user = User::findOne($this->existing_user_id * 1);
            if (empty($user)) {
                $this->addError("existing_user_id", "There is no user with this user_id");
            }
        }

    }


    public function save()
    {

        $action = TempUserSaveFactory::run($this);

        return $action->execute();

    }


}