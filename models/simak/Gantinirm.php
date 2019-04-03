<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "gantinirm".
 *
 * @property int $idgantinirm
 * @property string $nirm_baru
 * @property string $nirm_lama
 * @property string $tanggal
 * @property string $tahun
 * @property int $idsmt
 * @property string $ket
 */
class Gantinirm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gantinirm';
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
            [['nirm_baru', 'nirm_lama', 'tanggal', 'tahun', 'idsmt', 'ket'], 'required'],
            [['tanggal', 'tahun'], 'safe'],
            [['idsmt'], 'integer'],
            [['nirm_baru', 'nirm_lama'], 'string', 'max' => 20],
            [['ket'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgantinirm' => 'Idgantinirm',
            'nirm_baru' => 'Nirm Baru',
            'nirm_lama' => 'Nirm Lama',
            'tanggal' => 'Tanggal',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'ket' => 'Ket',
        ];
    }
}
