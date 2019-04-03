<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_kelas_mhs".
 *
 * @property string $idpenyelenggaraan
 * @property int $idpengampu_penyelenggaraan
 * @property int $idkelas_mhs
 * @property string $idkrsmatkul
 * @property string $idkelas
 * @property int $nama_kelas
 * @property string $hari
 * @property string $jam_masuk
 * @property string $jam_keluar
 * @property string $nidn
 * @property int $iddosen
 * @property int $idruangkelas
 * @property string $nama_dosen
 */
class VKelasMhs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_kelas_mhs';
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
            [['idpenyelenggaraan', 'idpengampu_penyelenggaraan', 'idkrsmatkul', 'idkelas', 'nama_kelas', 'hari', 'jam_masuk', 'jam_keluar', 'nidn', 'iddosen', 'idruangkelas'], 'required'],
            [['idpenyelenggaraan', 'idpengampu_penyelenggaraan', 'idkelas_mhs', 'idkrsmatkul', 'nama_kelas', 'iddosen', 'idruangkelas'], 'integer'],
            [['idkelas'], 'string', 'max' => 1],
            [['hari'], 'string', 'max' => 7],
            [['jam_masuk', 'jam_keluar'], 'string', 'max' => 5],
            [['nidn'], 'string', 'max' => 15],
            [['nama_dosen'], 'string', 'max' => 112],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'idpengampu_penyelenggaraan' => 'Idpengampu Penyelenggaraan',
            'idkelas_mhs' => 'Idkelas Mhs',
            'idkrsmatkul' => 'Idkrsmatkul',
            'idkelas' => 'Idkelas',
            'nama_kelas' => 'Nama Kelas',
            'hari' => 'Hari',
            'jam_masuk' => 'Jam Masuk',
            'jam_keluar' => 'Jam Keluar',
            'nidn' => 'Nidn',
            'iddosen' => 'Iddosen',
            'idruangkelas' => 'Idruangkelas',
            'nama_dosen' => 'Nama Dosen',
        ];
    }
}
