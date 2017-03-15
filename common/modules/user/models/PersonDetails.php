<?php

namespace common\modules\user\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "person_details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $title
 * @property string $first_name
 * @property string $last_name
 * @property string $unique_number
 * @property string $passport_number
 * @property string $contact_email
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class PersonDetails extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_details';
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
            [['user_id', 'title'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'unique_number', 'passport_number'], 'string', 'max' => 30],
            [['contact_email'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('person_details', 'ID'),
            'user_id' => Yii::t('person_details', 'User ID'),
            'title' => Yii::t('person_details', 'Title'),
            'first_name' => Yii::t('person_details', 'First Name'),
            'last_name' => Yii::t('person_details', 'Last Name'),
            'unique_number' => Yii::t('person_details', 'Unique Number'),
            'passport_number' => Yii::t('person_details', 'Passport Number'),
            'contact_email' => Yii::t('person_details', 'Contact Email'),
            'created_at' => Yii::t('person_details', 'Created At'),
            'updated_at' => Yii::t('person_details', 'Updated At'),
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
