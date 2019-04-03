<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "rekap_status_mahasiswa".
 *
 * @property string $idrekap
 * @property string $nim
 * @property string $nirm
 * @property string $nama_mhs
 * @property string $jk
 * @property int $kjur
 * @property string $ta
 * @property int $idsmt
 * @property string $idkelas
 * @property int $is_bayar
 * @property string $k_status
 */
class RekapStatusMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rekap_status_mahasiswa';
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
            [['idrekap', 'nim', 'nirm', 'nama_mhs', 'jk', 'kjur', 'ta', 'idsmt', 'idkelas', 'k_status'], 'required'],
            [['idrekap', 'kjur', 'idsmt', 'is_bayar'], 'integer'],
            [['ta'], 'safe'],
            [['nim', 'nirm'], 'string', 'max' => 20],
            [['nama_mhs'], 'string', 'max' => 200],
            [['jk', 'idkelas', 'k_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrekap' => 'Idrekap',
            'nim' => 'Nim',
            'nirm' => 'Nirm',
            'nama_mhs' => 'Nama Mhs',
            'jk' => 'Jk',
            'kjur' => 'Kjur',
            'ta' => 'Ta',
            'idsmt' => 'Idsmt',
            'idkelas' => 'Idkelas',
            'is_bayar' => 'Is Bayar',
            'k_status' => 'K Status',
        ];
    }
}
