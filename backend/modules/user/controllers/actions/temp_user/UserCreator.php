<?php

namespace backend\modules\user\controllers\actions\temp_user;


use common\models\User;
use common\modules\address\models\UserAddress;
use common\modules\phone\models\UserPhone;
use common\modules\signup\models\TempUser;
use common\modules\user\models\CompanyDetails;
use common\modules\user\models\PersonDetails;
use Yii;
use yii\base\Exception;

class UserCreator extends BaseTempUserAction
{

    const USERNAME_LENGTH = 10;
    const USERNAME_RANDOM_NUMBER_LENGTH = 2;


    /**
     * Temp userből valódi usert csinál
     * @return bool
     */
    public function execute()
    {
        parent::execute();
        /* @var $tempUser TempUser */
        $tempUser = $this->form->temp_user;

        if ($tempUser->isCompanyTempUser()) {
            $details = new CompanyDetails($this->stripTempUserIdAndId($tempUser->tempCompanyDetails->toArray()));
            $name = $details->company_name;
        } else {
            $details = new PersonDetails($this->stripTempUserIdAndId($tempUser->tempPersonDetails->toArray()));
            $name = $details->first_name . " " . $details->last_name;
        }


        $user = new User([
            'username'       => $this->generateUsername($name),
            'type'           => $tempUser->type,
            'email'          => $tempUser->email,
            'status'         => User::STATUS_ACTIVE,
            'reference_type' => $tempUser->reference_type,
            'nationality'    => $tempUser->nationality,
            'debt_collector' => $tempUser->debt_collector,
        ]);
        $user->setPassword("asdasd");       //TODO
        $user->generateAuthKey();

        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {

            if (!$user->save()) {
                throw new Exception("User save failed!");
            }

            $details->user_id = $user->id;
            if (!$details->save()) {
                throw new Exception("Person/Company details save failed");
            }


            $tempUserAddressData = $this->stripTempUserIdAndId($tempUser->addresses[0]->toArray());
            $address = new UserAddress($tempUserAddressData);
            $address->user_id = $user->id;

            $bAddress = new UserAddress($tempUserAddressData);
            $bAddress->user_id = $user->id;

            if ($tempUser->isCompanyTempUser()) {

                $address->address_type = UserAddress::TYPE_OFFICE_ADDRESS;
                $bAddress->address_type = UserAddress::TYPE_BUSINESS_ADDRESS;

            } else {

                $address->address_type = UserAddress::TYPE_PERMANENT_ADDRESS;
                $bAddress->address_type = UserAddress::TYPE_MAILING_ADDRESS;
            }


            if (!$address->save()) {
                throw new Exception("User address1 save failed!");
            }

            if (!$bAddress->save()) {
                throw new Exception("User address2 save failed!");
            }

            $phone = new UserPhone($this->stripTempUserIdAndId($tempUser->contactPhone->toArray()));
            $phone->user_id = $user->id;

            if (!$phone->save()) {
                throw new Exception("Phone save failed");
            }

            $tempUser->status = TempUser::STATUS_CLOSED_APPROVED;
            if(!$tempUser->save()){
                throw new Exception("Temp user save failed");
            }

            //TODO:
            $this->handleFurtherActions();

            $transaction->commit();

            return true;

        } catch (Exception $exception) {
            $transaction->rollBack();
            $this->errorMsg = $exception->getMessage();
            Yii::trace($this->errorMsg);

            return false;
        }


    }

    /**
     * Felhasználó nevet generál:<br>
     * <pre>
     * 10 karakter
     * a név első 8 karaktere + 2 random szám
     * ha nincs 8 karakter a név, akkor további random számokkal kell kiegészíteni
     * </pre>
     * @param string $name
     * @return string
     */
    public function generateUsername($name)
    {
        $name = str_replace([" ", ".", "-", "_", "&", "@", "'"], "", $name);
        $name = mb_strtolower($name);
        $number_length = self::USERNAME_RANDOM_NUMBER_LENGTH;
        $username = mb_substr($name, 0, self::USERNAME_LENGTH - $number_length);

        if (mb_strlen($username) < self::USERNAME_LENGTH) {
            $plus_numbers = self::USERNAME_LENGTH - mb_strlen($username);
            $number_length += $plus_numbers;
        }
        $random_number = rand(pow(10, $number_length - 1), pow(10, $number_length - 1) * 9.9999999);
        $username .= round($random_number);

        return $username;
    }

    /**
     * @param $array
     */
    private function stripTempUserIdAndId($array)
    {
        unset($array['temp_user_id']);
        unset($array['id']);
        return $array;
    }


}