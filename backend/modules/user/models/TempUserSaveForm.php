<?php
/**
 * Created by PhpStorm.
 * User: lorant
 * Date: 2017.03.09.
 * Time: 19:34
 */

namespace backend\modules\user\models;


use common\models\User;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\ArrayHelper;

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
//            [['asadf'], 'required'],
            ['existing_user_id', 'validateExistingUserId'],
        ];
    }

    public function validateExistingUserId()
    {
        if(empty($this->inactivate) && empty($this->create_new_user)){

            $user = User::findOne($this->existing_user_id * 1);
            if(empty($user)){
                $this->addError("existing_user_id","There is no user with this user_id");
            }
        }
    }



    public function save()
    {

        Yii::trace("saveeeeeeeeee");
        $this->temp_user;
/*
        $transaction = Yii::$app->db->beginTransaction();


        try{



            $transaction->commit();

            return true;

        } catch (Exception $exception) {
            $transaction->rollBack();
            $this->errorMsg = $exception->getMessage();
            Yii::trace($this->errorMsg);

            return false;
        }
*/
    }


}