<?php

namespace common\modules\user\models;

use Yii;

/**
 * This is the model class for table "nationality".
 *
 * @property integer $nationality_id
 * @property string $name
 */
class Nationality extends \yii\db\ActiveRecord
{

    public static $nationalityIDsByTld = [
        0 => 0,
        1 => 10,        //testhez ez lesz a singapore-i
        2 => 11,
        /*.
          .
          .*/
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nationality';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nationality_id' => Yii::t('nationality', 'Nationality ID'),
            'name' => Yii::t('nationality', 'Name'),
        ];
    }
}
