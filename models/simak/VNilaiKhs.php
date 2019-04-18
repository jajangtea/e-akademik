<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_nilai_khs".
 *
 * @property string $idkrs
 * @property string $idkrsmatkul
 * @property string $idpenyelenggaraan
 * @property string $nim
 * @property int $idsmt
 * @property string $tahun
 * @property int $tasmt
 * @property string $kmatkul
 * @property string $nmatkul
 * @property string $sks
 * @property int $idkonsentrasi
 * @property int $ispilihan
 * @property int $islintas_prodi
 * @property string $semester
 * @property string $n_kuan
 * @property string $n_kual
 * @property int $telah_isi_kuesioner
 * @property string $tanggal_isi_kuesioner
 * @property int $iddosen
 * @property string $nidn
 * @property string $nama_dosen
 * @property int $aktif
 */
class VNilaiKhs extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'v_nilai_khs';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('db_simak');
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['idkrs', 'idkrsmatkul', 'idpenyelenggaraan', 'idsmt', 'tasmt', 'idkonsentrasi', 'ispilihan', 'islintas_prodi', 'telah_isi_kuesioner', 'iddosen', 'aktif'], 'integer'],
            [['idpenyelenggaraan', 'nim', 'idsmt', 'tahun', 'tasmt', 'kmatkul', 'nmatkul', 'sks', 'idkonsentrasi', 'semester', 'nidn'], 'required'],
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
    public function attributeLabels() {
        return [
            'idkrs' => 'Idkrs',
            'idkrsmatkul' => 'Idkrsmatkul',
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'nim' => 'Nim',
            'idsmt' => 'Idsmt',
            'tahun' => 'Tahun',
            'tasmt' => 'Tasmt',
            'kmatkul' => 'Kmatkul',
            'nmatkul' => 'Nmatkul',
            'sks' => 'Sks',
            'idkonsentrasi' => 'Idkonsentrasi',
            'ispilihan' => 'Ispilihan',
            'islintas_prodi' => 'Islintas Prodi',
            'semester' => 'Semester',
            'n_kuan' => 'N Kuan',
            'n_kual' => 'N Kual',
            'telah_isi_kuesioner' => 'Telah Isi Kuesioner',
            'tanggal_isi_kuesioner' => 'Tanggal Isi Kuesioner',
            'iddosen' => 'Iddosen',
            'nidn' => 'Nidn',
            'nama_dosen' => 'Nama Dosen',
            'aktif' => 'Aktif',
        ];
    }

    public function getKrs() {
        return $this->hasOne(Krs::className(), ['idkrs' => 'idkrs']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyelenggaraan() {
        return $this->hasOne(Penyelenggaraan::className(), ['idpenyelenggaraan' => 'idpenyelenggaraan']);
    }

}
