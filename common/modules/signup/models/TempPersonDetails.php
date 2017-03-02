<?php

namespace common\modules\signup\models;

use Yii;

/**
 * This is the model class for table "temp_person_details".
 *
 * @property integer $id
 * @property integer $temp_user_id
 * @property integer $title
 * @property string $first_name
 * @property string $last_name
 * @property string $unique_number
 * @property string $passport_number
 * @property string $contact_email
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TempUser $tempUser
 */
class TempPersonDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_person_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['temp_user_id'], 'required'],
            [['temp_user_id', 'title'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'unique_number', 'passport_number'], 'string', 'max' => 30],
            [['contact_email'], 'string', 'max' => 50],
            [['temp_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TempUser::className(), 'targetAttribute' => ['temp_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('signup', 'ID'),
            'temp_user_id' => Yii::t('signup', 'Temp User ID'),
            'title' => Yii::t('signup', 'Title'),
            'first_name' => Yii::t('signup', 'First Name'),
            'last_name' => Yii::t('signup', 'Last Name'),
            'unique_number' => Yii::t('signup', 'Unique Number'),
            'passport_number' => Yii::t('signup', 'Passport Number'),
            'contact_email' => Yii::t('signup', 'Contact Email'),
            'created_at' => Yii::t('signup', 'Created At'),
            'updated_at' => Yii::t('signup', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTempUser()
    {
        return $this->hasOne(TempUser::className(), ['id' => 'temp_user_id'])->inverseOf("tempPersonDetails");
    }
}
