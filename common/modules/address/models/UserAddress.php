<?php

namespace common\modules\address\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "user_addresses".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $address_type
 * @property integer $country_id
 * @property string $city
 * @property string $street
 * @property string $street_section
 * @property string $building_number
 * @property string $floor
 * @property string $door
 * @property string $name_of_venue
 * @property string $district
 * @property string $zipcode
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class UserAddress extends ActiveRecord
{

    const TYPE_OFFICE_ADDRESS = 1;
    const TYPE_BUSINESS_ADDRESS = 2;
    const TYPE_POSTAL_ADDRESS = 3;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_addresses';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class'      => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value'      => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
//            [['user_id', 'address_type', 'country_id'], 'integer'],
            [['city', 'street', 'address_type', 'country_id', 'building_number','created_at',
                'updated_at', 'street_section', 'floor', 'door', 'name_of_venue',
                'district', 'zipcode'], 'safe'],
            [['city'], 'string', 'max' => 30],
            [['street'], 'string', 'max' => 40],
            [['street_section'], 'string', 'max' => 80],
            [['building_number', 'floor', 'door'], 'string', 'max' => 10],
            [['name_of_venue', 'district'], 'string', 'max' => 100],
            [['zipcode'], 'string', 'max' => 20],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => Yii::t('address', 'ID'),
            'user_id'         => Yii::t('address', 'User ID'),
            'address_type'    => Yii::t('address', 'Address Type'),
            'country_id'      => Yii::t('address', 'Country ID'),
            'city'            => Yii::t('address', 'City'),
            'street'          => Yii::t('address', 'Street'),
            'street_section'  => Yii::t('address', 'Street Section'),
            'building_number' => Yii::t('address', 'Building Number'),
            'floor'           => Yii::t('address', 'Floor'),
            'door'            => Yii::t('address', 'Door'),
            'name_of_venue'   => Yii::t('address', 'Name Of Venue'),
            'district'        => Yii::t('address', 'District'),
            'zipcode'         => Yii::t('address', 'Zipcode'),
            'created_at'      => Yii::t('address', 'Created At'),
            'updated_at'      => Yii::t('address', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
