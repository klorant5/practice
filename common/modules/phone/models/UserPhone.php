<?php

namespace common\modules\phone\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
 * @property string $verified_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class UserPhone extends ActiveRecord
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
            [['user_id', 'country_code', 'phone_type', 'verified', 'send_count', 'try_count'], 'integer'],
            [['verified','send_count', 'try_count','verified_at', 'created_at', 'updated_at'], 'safe'],
            [['phone_number'], 'string', 'max' => 20],
            [['verification_code'], 'string', 'max' => 10],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
