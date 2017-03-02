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

class SignUpManager
{

    private $form;
    private $userType;

    /**
     * SignUpManager constructor.
     * @param $form CompanySignUpForm|PersonSignUpForm
     */
    public function __construct($form) {

        $this->form = $form;

        if($this->form instanceof CompanySignUpForm){
            $this->userType = User::TYPE_COMPANY;
        }else{
            $this->userType = User::TYPE_PERSON;
        }
    }


    /**
     *
     * @return bool
     */
    public function save()
    {
        //TODO: itt menteni mindent

        //TODO: TRANSACTION:

        $address = new UserAddress([
            'country_id' => $this->form->country,
            'city' => $this->form->city,
            'street' => $this->form->street,
            'building_number' => $this->form->building_number,
            'floor' => $this->form->floor,
            'door' => $this->form->door,
            'zipcode' => $this->form->zip,
            'is_temp' => 1,     //a true-t jelzi
            'address_type' => UserAddress::TYPE_OFFICE_ADDRESS
//            'user_id'
        ]);

        $phone = new UserPhone([
            'country_code' => $this->form->contact_phone_country_code,
            'phone_number' => $this->form->contact_phone_number,
            'phone_type' => $this->form->contact_phone_type,
            'is_temp' => 1,
            'verified_at' => '0000-00-00 00:00:00',
            'updated_at' => '0000-00-00 00:00:00',
//            'user_id'
        ]);

        $tempUser = new TempUser([
            'email' => $this->form->contact_email,
            'type' => $this->userType,
            'status' => TempUser::TYPE_NEW,
            'updated_at' => '0000-00-00 00:00:00',
            'reference_type' => User::REFERENCE_TYPE_SIGN_UP
        ]);
        if($this->userType == User::TYPE_COMPANY){
            //company
            $company = new TempCompanyDetails([
                'company_name' => $this->form->company_name,
                'registration_number' => $this->form->company_regnum,
                'duns_number' => $this->form->duns_number,
                'updated_at' => '0000-00-00 00:00:00',
//                'contact_name_id' => 1000,    //TODO: tervezési hiba??? nem kéne az egész nevet tárolni ebbe a táblába?
//                'temp_user_id' => $this->form->duns_number,
            ]);
        }else{
            //person
            $person = new TempPersonDetails([
                'title' => $this->form->contact_title,
                'first_name' => $this->form->contact_firstname,
                'last_name' => $this->form->contact_lastname,
                'unique_number' => $this->form->nric,
                'passport_number' => $this->form->passport_number,
                'contact_email' => $this->form->contact_email,
                'updated_at' => '0000-00-00 00:00:00',
//                'temp_user_id' => 1000,
            ]);
        }


        return true;
    }


}