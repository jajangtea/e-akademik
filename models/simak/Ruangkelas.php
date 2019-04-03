<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "ruangkelas".
 *
 * @property int $idruangkelas
 * @property string $namaruang
 * @property int $kapasitas
 */
class Ruangkelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ruangkelas';
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
            [['namaruang', 'kapasitas'], 'required'],
            [['kapasitas'], 'integer'],
            [['namaruang'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idruangkelas' => 'Idruangkelas',
            'namaruang' => 'Namaruang',
            'kapasitas' => 'Kapasitas',
        ];
    }
}
