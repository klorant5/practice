<?php

namespace common\modules\signup\models;
use yii\base\Model;
use Yii;

class CompanySignUpForm extends Model
{

    public $userType; //????kell ez?
    public $location;
    public $country;


    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['location', 'country'], 'required'],
//            [['user_id', 'is_temp', 'address_type', 'country_id'], 'integer'],
//            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'location' => Yii::t('signup', 'Location'),
            'country' => Yii::t('signup', 'Country'),
        ];
    }

}