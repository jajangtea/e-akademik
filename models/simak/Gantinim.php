<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "gantinim".
 *
 * @property int $idgantinim
 * @property string $nim_baru
 * @property string $nim_lama
 * @property string $tanggal
 * @property string $tahun
 * @property int $idsmt
 * @property string $ket
 */
class Gantinim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gantinim';
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
            [['nim_baru', 'nim_lama', 'tanggal', 'tahun', 'idsmt', 'ket'], 'required'],
            [['tanggal', 'tahun'], 'safe'],
            [['idsmt'], 'integer'],
            [['nim_baru', 'nim_lama'], 'string', 'max' => 20],
            [['ket'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgantinim' => 'Idgantinim',
            'nim_baru' => 'Nim Baru',
            'nim_lama' => 'Nim Lama',
            'tanggal' => 'Tanggal',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'ket' => 'Ket',
        ];
    }
}
