<?php

namespace common\modules\signup\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "temp_user_addresses".
 *
 * @property integer $id
 * @property integer $temp_user_id
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
 * @property TempUser $tempUser
 */
class TempUserAddress extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_user_addresses';
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
            [['temp_user_id'], 'required'],
            [['temp_user_id', 'country_id'], 'integer'],
            [['country_id', 'city', 'street', 'street_section', 'building_number', 'floor', 'door', 'name_of_venue',
                'district', 'zipcode', 'created_at', 'updated_at'], 'safe'],
            [['city'], 'string', 'max' => 30],
            [['street'], 'string', 'max' => 40],
            [['street_section'], 'string', 'max' => 80],
            [['building_number', 'floor', 'door'], 'string', 'max' => 10],
            [['name_of_venue', 'district'], 'string', 'max' => 100],
            [['zipcode'], 'string', 'max' => 20],
            [['temp_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TempUser::className(), 'targetAttribute' => ['temp_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => Yii::t('signup', 'ID'),
            'temp_user_id'    => Yii::t('signup', 'Temp User ID'),
            'country_id'      => Yii::t('signup', 'Country ID'),
            'city'            => Yii::t('signup', 'City'),
            'street'          => Yii::t('signup', 'Street'),
            'street_section'  => Yii::t('signup', 'Street Section'),
            'building_number' => Yii::t('signup', 'Building Number'),
            'floor'           => Yii::t('signup', 'Floor'),
            'door'            => Yii::t('signup', 'Door'),
            'name_of_venue'   => Yii::t('signup', 'Name Of Venue'),
            'district'        => Yii::t('signup', 'District'),
            'zipcode'         => Yii::t('signup', 'Zipcode'),
            'created_at'      => Yii::t('signup', 'Created At'),
            'updated_at'      => Yii::t('signup', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTempUser()
    {
        return $this->hasOne(TempUser::className(), ['id' => 'temp_user_id']);
    }
}
