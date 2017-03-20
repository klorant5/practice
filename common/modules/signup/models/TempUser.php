<?php

namespace common\modules\signup\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "temp_user".
 *
 * @property integer $id
 * @property string $email
 * @property integer $type
 * @property integer $status
 * @property integer $reference_type
 * @property string $created_at
 * @property string $updated_at
 * @property integer $tld
 * @property integer $nationality
 * @property integer $debt_collector
 *
 * @property TempCompanyDetails[] $tempCompanyDetails
 * @property TempPersonDetails[] $tempPersonDetails
 */
class TempUser extends ActiveRecord
{

    const STATUS_NEW = 1;
    const STATUS_CLOSED_APPROVED = 2;
    const STATUS_CLOSED_REJECTED = 3;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_user';
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
            [['type', 'status', 'reference_type'], 'required'],
            [['type', 'status', 'reference_type'], 'integer'],
            [['debt_collector', 'nationality', 'tld', 'created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'             => Yii::t('signup', 'ID'),
            'email'          => Yii::t('signup', 'Email'),
            'type'           => Yii::t('signup', 'Type'),
            'status'         => Yii::t('signup', 'Status'),
            'reference_type' => Yii::t('signup', 'Reference Type'),
            'created_at'     => Yii::t('signup', 'Created At'),
            'updated_at'     => Yii::t('signup', 'Updated At'),
        ];
    }

    /**
     * @return bool
     */
    public function isCompanyTempUser()
    {
        return $this->type == User::TYPE_COMPANY;
    }


    /**
     * @return ActiveQuery
     */
    public function getTempCompanyDetails()
    {
        return $this->hasOne(TempCompanyDetails::className(), ['temp_user_id' => 'id'])->inverseOf("tempUser");
    }

    /**
     * @return ActiveQuery
     */
    public function getTempPersonDetails()
    {
        return $this->hasOne(TempPersonDetails::className(), ['temp_user_id' => 'id'])->inverseOf("tempUser");
    }

    /**
     * @return ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(TempUserAddress::className(), ["temp_user_id" => "id"]);
    }

    /**
     * @return ActiveQuery
     */
    public function getContactPhone()
    {
        return $this->hasOne(TempUserPhone::className(), ['temp_user_id' => 'id']);
    }
}
