<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "jenjang_studi".
 *
 * @property string $kjenjang
 * @property string $njenjang
 */
class JenjangStudi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenjang_studi';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_simak');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kjenjang', 'njenjang'], 'required'],
            [['kjenjang'], 'string', 'max' => 1],
            [['njenjang'], 'string', 'max' => 15],
            [['kjenjang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kjenjang' => 'Kjenjang',
            'njenjang' => 'Njenjang',
        ];
    }
}
