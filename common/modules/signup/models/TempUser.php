<?php

namespace common\modules\signup\models;

use common\modules\address\models\UserAddress;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
 *
 * @property TempCompanyDetails[] $tempCompanyDetails
 * @property TempPersonDetails[] $tempPersonDetails
 */
class TempUser extends ActiveRecord
{

    const TYPE_NEW = 1;
    const TYPE_CLOSED_APPROVED = 2;
    const TYPE_CLOSED_REJECTED = 3;


    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'temp_user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['type', 'status', 'reference_type'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('signup', 'ID'),
            'email' => Yii::t('signup', 'Email'),
            'type' => Yii::t('signup', 'Type'),
            'status' => Yii::t('signup', 'Status'),
            'reference_type' => Yii::t('signup', 'Reference Type'),
            'created_at' => Yii::t('signup', 'Created At'),
            'updated_at' => Yii::t('signup', 'Updated At'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getTempCompanyDetails() {
        return $this->hasOne(TempCompanyDetails::className(), ['temp_user_id' => 'id'])->inverseOf("tempUser");
    }

    /**
     * @return ActiveQuery
     */
    public function getTempPersonDetails() {
        return $this->hasOne(TempPersonDetails::className(), ['temp_user_id' => 'id'])->inverseOf("tempUser");
    }

    /**
     * @return ActiveQuery
     */
    public function getAddresses() {
        return $this->hasMany(UserAddress::className(), ["user_id" => "id"]);
    }
}
