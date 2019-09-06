<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "ta".
 *
 * @property string $tahun
 * @property string $tahun_akademik
 */
class Ta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ta';
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
            [['tahun', 'tahun_akademik'], 'required'],
            [['tahun'], 'safe'],
            [['tahun_akademik'], 'string', 'max' => 9],
            [['tahun'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tahun' => 'Tahun',
            'tahun_akademik' => 'Tahun Akademik',
        ];
    }
    
}
