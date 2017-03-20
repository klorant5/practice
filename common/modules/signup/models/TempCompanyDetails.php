<?php

namespace common\modules\signup\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "temp_company_details".
 *
 * @property integer $id
 * @property integer $temp_user_id
 * @property string $company_name
 * @property string $registration_number
 * @property string $duns_number
 * @property integer $contact_name_title
 * @property string $contact_name_first
 * @property string $contact_name_last
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TempUser $tempUser
 */
class TempCompanyDetails extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_company_details';
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
            [['temp_user_id', 'company_name', 'registration_number', 'duns_number', 'contact_name_title',
                'contact_name_first', 'contact_name_last'], 'required'],
            [['temp_user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['company_name'], 'string', 'max' => 200],
            [['registration_number', 'duns_number'], 'string', 'max' => 30],
            [['temp_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TempUser::className(), 'targetAttribute' => ['temp_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                  => Yii::t('signup', 'ID'),
            'temp_user_id'        => Yii::t('signup', 'Temp User ID'),
            'company_name'        => Yii::t('signup', 'Company Name'),
            'registration_number' => Yii::t('signup', 'Registration Number'),
            'duns_number'         => Yii::t('signup', 'Duns Number'),
            'contact_name_id'     => Yii::t('signup', 'Contact Name ID'),
            'created_at'          => Yii::t('signup', 'Created At'),
            'updated_at'          => Yii::t('signup', 'Updated At'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getTempUser()
    {
        return $this->hasOne(TempUser::className(), ['id' => 'temp_user_id'])->inverseOf("tempCompanyDetails");
    }
}
