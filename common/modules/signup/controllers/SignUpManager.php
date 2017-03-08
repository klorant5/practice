<?php

namespace common\modules\signup\controllers;


use common\models\User;
use common\modules\address\models\UserAddress;
use common\modules\phone\models\UserPhone;
use common\modules\signup\models\CompanySignUpForm;
use common\modules\signup\models\PersonSignUpForm;
use common\modules\signup\models\TempCompanyDetails;
use common\modules\signup\models\TempPersonDetails;
use common\modules\signup\models\TempUser;
use common\modules\signup\models\TempUserAddress;
use common\modules\signup\models\TempUserPhone;
use Yii;
use yii\base\Exception;
use yii\base\Model;

class SignUpManager
{

    private $form;
    private $userType;
    public $errorMsg;

    /**
     * SignUpManager constructor.
     * @param $form CompanySignUpForm|PersonSignUpForm
     */
    public function __construct($form)
    {

        $this->form = $form;

        if ($this->form instanceof CompanySignUpForm) {
            $this->userType = User::TYPE_COMPANY;
        } else {
            $this->userType = User::TYPE_PERSON;
        }
    }


    /**
     *
     * @return bool
     */
    public function save()
    {

        $address = new TempUserAddress([
            'country_id'      => 1, //TODO
            'city'            => $this->form->city,
            'street'          => $this->form->street,
            'building_number' => $this->form->building_number,
            'floor'           => $this->form->floor,
            'door'            => $this->form->door,
            'zipcode'         => $this->form->zip,
        ]);

        $phone = new TempUserPhone([
            'country_code' => $this->form->contact_phone_country_code,
            'phone_number' => $this->form->contact_phone_number,
            'phone_type'   => $this->form->contact_phone_type,
        ]);

        $tempUser = new TempUser([
            'email'          => $this->form->contact_email,
            'type'           => $this->userType,
            'status'         => TempUser::TYPE_NEW,
            'updated_at'     => '0000-00-00 00:00:00',
            'reference_type' => User::REFERENCE_TYPE_SIGN_UP,
            'tld'            => 1,                               //TODO: dinamikussá tenni
            'nationality'    => 1, //$this->form->nationality,   //TODO: dinamikussá tenni
            'debt_collector' => $this->form->debt_collector,
        ]);
        if ($this->userType == User::TYPE_COMPANY) {
            //company
            $tempCompanyDetails = new TempCompanyDetails([
                'company_name'        => $this->form->company_name,
                'registration_number' => $this->form->company_regnum,
                'duns_number'         => $this->form->duns_number,
                'updated_at'          => '0000-00-00 00:00:00',
                'contact_name_title'  => $this->form->contact_title,
                'contact_name_first'  => $this->form->contact_firstname,
                'contact_name_last'   => $this->form->contact_lastname,
            ]);
        } else {
            //person
            $tempPersonDetails = new TempPersonDetails([
                'title'           => $this->form->contact_title,
                'first_name'      => $this->form->contact_firstname,
                'last_name'       => $this->form->contact_lastname,
                'unique_number'   => $this->form->nric,
                'passport_number' => $this->form->passport_number,
                'contact_email'   => $this->form->contact_email,
                'updated_at'      => '0000-00-00 00:00:00',
            ]);
        }
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {
            //tranzakció mentés


            if (!$tempUser->save()) {
                throw new Exception("Temp user could not be saved!!");
            }

            if ($this->userType == User::TYPE_COMPANY) {
                $tempCompanyDetails->temp_user_id = $tempUser->id;
                if (!$tempCompanyDetails->save()) {
                    throw new Exception("Temp company details could not be saved!!");
                }
            } else {
                $tempPersonDetails->temp_user_id = $tempUser->id;
                if (!$tempPersonDetails->save()) {
                    throw new Exception("Temp person details could not be saved!!");
                }
            }

            $phone->temp_user_id = $tempUser->id;
            if (!$phone->save()) {
                throw new Exception("Phone could not be saved!!");
            }

            $address->temp_user_id = $tempUser->id;
            if (!$address->save()) {
                throw new Exception("Address could not be saved!!");
            }

            $transaction->commit();

            return true;

        } catch (Exception $exception) {
            $transaction->rollBack();
            $this->errorMsg = $exception->getMessage();
Yii::trace($this->errorMsg);
            return false;
        }


    }


}