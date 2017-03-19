<?php

namespace common\modules\user\models;

use Yii;

/**
 * This is the model class for table "nationality_country".
 *
 * @property integer $nationality_id
 * @property string $country
 * @property string $nationality
 */
class NationalityCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nationality_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country', 'nationality'], 'required'],
            [['country', 'nationality'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nationality_id' => Yii::t('nationality', 'Nationality ID'),
            'country' => Yii::t('nationality', 'Country'),
            'nationality' => Yii::t('nationality', 'Nationality'),
        ];
    }
}
