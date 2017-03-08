<?php

namespace common\modules\signup\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "temp_user_phones".
 *
 * @property integer $id
 * @property integer $temp_user_id
 * @property integer $country_code
 * @property string $phone_number
 * @property integer $phone_type
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TempUser $tempUser
 */
class TempUserPhone extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_user_phones';
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
            [['temp_user_id'], 'integer'],
            [['country_code', 'phone_number', 'phone_type', 'created_at', 'updated_at'], 'safe'],
            [['phone_number'], 'string', 'max' => 20],
            [['temp_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TempUser::className(), 'targetAttribute' => ['temp_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => Yii::t('signup', 'ID'),
            'temp_user_id' => Yii::t('signup', 'Temp User ID'),
            'country_code' => Yii::t('signup', 'Country Code'),
            'phone_number' => Yii::t('signup', 'Phone Number'),
            'phone_type'   => Yii::t('signup', 'Phone Type'),
            'created_at'   => Yii::t('signup', 'Created At'),
            'updated_at'   => Yii::t('signup', 'Updated At'),
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
