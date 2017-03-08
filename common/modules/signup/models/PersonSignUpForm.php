<?php
/**
 * Created by PhpStorm.
 * User: lorant
 * Date: 2017.03.01.
 * Time: 22:02
 */

namespace common\modules\signup\models;


use common\modules\signup\controllers\SignUpManager;
use Yii;
use yii\base\Model;

class PersonSignUpForm extends Model
{


    public $userType; //????kell ez?
    public $nationality;
    public $country;
    public $city;
    public $zip;
    public $nric;
    public $building_number;
    public $street;
    public $passport_number;
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nationality', 'country'], 'required'],
            [['country', 'company_name', 'city', 'zip', 'company_regnum', 'building_number',
                'street', 'duns_number', 'floor', 'door', 'contact_title', 'contact_firstname',
                'contact_lastname', 'contact_email', 'contact_phone_type', 'contact_phone_country_code',
                'contact_phone_number', 'nric', 'passport_number', 'debt_collector'], 'safe'],
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