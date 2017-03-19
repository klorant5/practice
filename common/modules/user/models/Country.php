<?php

namespace common\modules\user\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $id
 * @property string $name
 * @property string $nationality_id
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'nationality_id'], 'required'],
            [['nationality_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('country', 'ID'),
            'name' => Yii::t('country', 'Name'),
            'nationality_id' => Yii::t('country', 'Nationality ID'),
        ];
    }
}
