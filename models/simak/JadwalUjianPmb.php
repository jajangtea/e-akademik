<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "jadwal_ujian_pmb".
 *
 * @property int $idjadwal_ujian
 * @property string $tahun_masuk
 * @property int $idsmt
 * @property string $nama_kegiatan
 * @property string $tanggal_ujian
 * @property string $jam_mulai
 * @property string $jam_akhir
 * @property string $tanggal_akhir_daftar
 * @property int $idruangkelas
 * @property string $date_added
 * @property string $date_modified
 * @property int $status
 *
 * @property Passinggrade[] $passinggrades
 * @property PesertaUjianPmb[] $pesertaUjianPmbs
 */
class JadwalUjianPmb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal_ujian_pmb';
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
            [['tahun_masuk', 'idsmt', 'nama_kegiatan', 'tanggal_ujian', 'jam_mulai', 'jam_akhir', 'tanggal_akhir_daftar', 'idruangkelas', 'date_added', 'date_modified', 'status'], 'required'],
            [['tahun_masuk', 'tanggal_ujian', 'tanggal_akhir_daftar', 'date_added', 'date_modified'], 'safe'],
            [['idsmt', 'idruangkelas', 'status'], 'integer'],
            [['nama_kegiatan'], 'string', 'max' => 200],
            [['jam_mulai', 'jam_akhir'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjadwal_ujian' => 'Idjadwal Ujian',
            'tahun_masuk' => 'Tahun Masuk',
            'idsmt' => 'Idsmt',
            'nama_kegiatan' => 'Nama Kegiatan',
            'tanggal_ujian' => 'Tanggal Ujian',
            'jam_mulai' => 'Jam Mulai',
            'jam_akhir' => 'Jam Akhir',
            'tanggal_akhir_daftar' => 'Tanggal Akhir Daftar',
            'idruangkelas' => 'Idruangkelas',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPassinggrades()
    {
        return $this->hasMany(Passinggrade::className(), ['idjadwal_ujian' => 'idjadwal_ujian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaUjianPmbs()
    {
        return $this->hasMany(PesertaUjianPmb::className(), ['idjadwal_ujian' => 'idjadwal_ujian']);
    }
}
