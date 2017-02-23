<?php

namespace common\modules\phone\models;

use Yii;

/**
 * This is the model class for table "user_phones".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $country_code
 * @property string $phone_number
 * @property integer $phone_type
 * @property integer $verified
 * @property string $verification_code
 * @property integer $send_count
 * @property integer $try_count
 * @property integer $is_temp
 * @property string $verified_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class UserPhone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_phones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'country_code', 'phone_type', 'verified', 'send_count', 'try_count', 'is_temp'], 'integer'],
            [['verified_at', 'created_at', 'updated_at'], 'safe'],
            [['phone_number'], 'string', 'max' => 20],
            [['verification_code'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('phone', 'ID'),
            'user_id' => Yii::t('phone', 'User ID'),
            'country_code' => Yii::t('phone', 'Country Code'),
            'phone_number' => Yii::t('phone', 'Phone Number'),
            'phone_type' => Yii::t('phone', 'Phone Type'),
            'verified' => Yii::t('phone', 'Verified'),
            'verification_code' => Yii::t('phone', 'Verification Code'),
            'send_count' => Yii::t('phone', 'Send Count'),
            'try_count' => Yii::t('phone', 'Try Count'),
            'is_temp' => Yii::t('phone', 'Is Temp'),
            'verified_at' => Yii::t('phone', 'Verified At'),
            'created_at' => Yii::t('phone', 'Created At'),
            'updated_at' => Yii::t('phone', 'Updated At'),
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
