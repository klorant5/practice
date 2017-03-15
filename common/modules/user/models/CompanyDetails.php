<?php

namespace common\modules\user\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "company_details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $company_name
 * @property string $registration_number
 * @property string $duns_number
 * @property integer $contact_name_title
 * @property string $contact_name_first
 * @property string $contact_name_last
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class CompanyDetails extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_details';
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
            [['user_id', 'contact_name_title'], 'integer'],
            [['contact_name_first', 'contact_name_last', 'created_at', 'updated_at'], 'safe'],
            [['company_name'], 'string', 'max' => 200],
            [['registration_number', 'duns_number'], 'string', 'max' => 30],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                  => Yii::t('company_details', 'ID'),
            'user_id'             => Yii::t('company_details', 'User ID'),
            'company_name'        => Yii::t('company_details', 'Company Name'),
            'registration_number' => Yii::t('company_details', 'Registration Number'),
            'duns_number'         => Yii::t('company_details', 'Duns Number'),
            'contact_name_title'  => Yii::t('company_details', 'Contact Name title'),
            'created_at'          => Yii::t('company_details', 'Created At'),
            'updated_at'          => Yii::t('company_details', 'Updated At'),
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
