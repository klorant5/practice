<?php

namespace common\modules\signup\models;

use common\modules\signup\controllers\SignUpManager;
use Faker\Factory;
use Yii;
use yii\base\Model;

class CompanySignUpForm extends Model
{

    public $userType; //????kell ez?
    public $location;
    public $country;
    public $company_name;
    public $city;
    public $zip;
    public $company_regnum;
    public $building_number;
    public $street;
    public $duns_number;
    public $floor;
    public $door;
    public $contact_title;
    public $contact_firstname;
    public $contact_lastname;
    public $contact_email;
    public $contact_phone_type;
    public $contact_phone_country_code;
    public $contact_phone_number;

    public $debt_collector = 0;

    public $fake_data = false;

    public function __construct(array $config = [])
    {
        parent::__construct($config);


        if ($this->fake_data) {
            $faker = Factory::create();
            $this->contact_email = $faker->email;
            $this->street = $faker->streetAddress;
            $this->building_number = $faker->buildingNumber;
            $this->floor = rand(1, 10);
            $this->location = rand(1, 20);      //???
            $this->country = rand(1, 20);       //???
            $this->door = rand(1, 10);
            $this->zip = rand(10000, 99999);
            $this->city = "Singapore";
            $this->company_name = $faker->company;
            $this->contact_lastname = $faker->lastName;
            $this->contact_firstname = $faker->firstNameMale;
            $this->contact_phone_number = $faker->randomNumber(9);
            $this->duns_number = $faker->randomNumber(8);
            $this->company_regnum = $faker->randomNumber(8);
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location', 'country', 'company_name'], 'required'],
            [['location', 'country', 'company_name', 'city', 'zip', 'company_regnum', 'building_number',
                'street', 'duns_number', 'floor', 'door', 'contact_title', 'contact_firstname',
                'contact_lastname', 'contact_email', 'contact_phone_type', 'contact_phone_country_code',
                'contact_phone_number', 'debt_collector'], 'safe'],
//            [['user_id', 'is_temp', 'address_type', 'country_id'], 'integer'],
//            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'location'                   => Yii::t('signup', 'Location'),
            'country'                    => Yii::t('signup', 'Country'),
            'company_name'               => Yii::t('signup', 'Company name'),
            'city'                       => Yii::t('signup', 'City'),
            'zip'                        => Yii::t('signup', 'Zip code'),
            'company_regnum'             => Yii::t('signup', 'Company registration number'),
            'building_number'            => Yii::t('signup', 'Building number'),
            'street'                     => Yii::t('signup', 'Street'),
            'duns_number'                => Yii::t('signup', 'D-U-N-S number'),
            'floor'                      => Yii::t('signup', 'Floor'),
            'door'                       => Yii::t('signup', 'Door'),
            'contact_title'              => Yii::t('signup', 'Title'),         //
            'contact_firstname'          => Yii::t('signup', 'First name'), //
            'contact_lastname'           => Yii::t('signup', 'Last name'),  //
            'contact_email'              => Yii::t('signup', 'Contact email'),
            'contact_phone_type'         => Yii::t('signup', 'Contact person phone'),
            'contact_phone_country_code' => Yii::t('signup', 'Country code'),   //
            'contact_phone_number'       => Yii::t('signup', 'Phone number')          //
        ];
    }

    public function save()
    {
        $signUp = new SignUpManager($this);
        $ret = true;
        if (!$signUp->save()) {
            $ret = false;
            Yii::$app->session->setFlash("signuperror", !empty($signUp->errorMsg) ? $signUp->errorMsg :
                "Internal Error. Please try again later.");
        }

        return $ret;
    }

}