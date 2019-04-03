<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_nilai".
 *
 * @property string $idkrsmatkul
 * @property string $idpenyelenggaraan
 * @property string $nim
 * @property int $idsmt
 * @property string $tahun
 * @property int $tasmt
 * @property string $kmatkul
 * @property string $nmatkul
 * @property string $sks
 * @property string $semester
 * @property string $n_kuan
 * @property string $n_kual
 * @property string $nidn
 * @property string $nama_dosen
 * @property int $aktif
 * @property int $idkur
 * @property int $telah_isi_kuesioner
 * @property string $tanggal_isi_kuesioner
 */
class VNilai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_nilai';
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
            [['idkrsmatkul', 'idpenyelenggaraan', 'idsmt', 'tasmt', 'aktif', 'idkur', 'telah_isi_kuesioner'], 'integer'],
            [['idpenyelenggaraan', 'nim', 'idsmt', 'tahun', 'tasmt', 'kmatkul', 'nmatkul', 'sks', 'semester', 'n_kuan', 'n_kual', 'nidn', 'idkur', 'tanggal_isi_kuesioner'], 'required'],
            [['tahun', 'tanggal_isi_kuesioner'], 'safe'],
            [['n_kuan'], 'number'],
            [['nim'], 'string', 'max' => 20],
            [['kmatkul'], 'string', 'max' => 9],
            [['nmatkul'], 'string', 'max' => 50],
            [['sks', 'n_kual'], 'string', 'max' => 1],
            [['semester'], 'string', 'max' => 2],
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
            'idkrsmatkul' => 'Idkrsmatkul',
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'nim' => 'Nim',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
            'tasmt' => 'Tasmt',
            'kmatkul' => 'Kmatkul',
            'nmatkul' => 'Nmatkul',
            'sks' => 'Sks',
            'semester' => 'Semester',
            'n_kuan' => 'N Kuan',
            'n_kual' => 'N Kual',
            'nidn' => 'Nidn',
            'nama_dosen' => 'Nama Dosen',
            'aktif' => 'Aktif',
            'idkur' => 'Idkur',
            'telah_isi_kuesioner' => 'Telah Isi Kuesioner',
            'tanggal_isi_kuesioner' => 'Tanggal Isi Kuesioner',
        ];
    }
}
