<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "data_konversi2".
 *
 * @property string $iddata_konversi
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @property string $nim_asal
 * @property string $kode_pt_asal
 * @property string $nama_pt_asal
 * @property string $kjenjang
 * @property string $kode_ps_asal
 * @property string $nama_ps_asal
 * @property string $tahun
 * @property int $kjur
 * @property int $idkur
 * @property int $perpanjangan
 * @property string $date_added
 * @property string $date_modified
 *
 * @property DataKonversi $dataKonversi
 * @property ProgramStudi $kjur0
 * @property Kurikulum $kur
 * @property NilaiKonversi2[] $nilaiKonversi2s
 */
class DataKonversi2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_konversi2';
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
            [['nama', 'alamat', 'no_telp', 'nim_asal', 'kode_pt_asal', 'nama_pt_asal', 'kjenjang', 'kode_ps_asal', 'nama_ps_asal', 'tahun', 'kjur', 'idkur', 'perpanjangan', 'date_added', 'date_modified'], 'required'],
            [['tahun', 'date_added', 'date_modified'], 'safe'],
            [['kjur', 'idkur', 'perpanjangan'], 'integer'],
            [['nama'], 'string', 'max' => 80],
            [['alamat'], 'string', 'max' => 150],
            [['no_telp'], 'string', 'max' => 25],
            [['nim_asal'], 'string', 'max' => 30],
            [['kode_pt_asal', 'kode_ps_asal'], 'string', 'max' => 6],
            [['nama_pt_asal', 'nama_ps_asal'], 'string', 'max' => 100],
            [['kjenjang'], 'string', 'max' => 1],
            [['kjur'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramStudi::className(), 'targetAttribute' => ['kjur' => 'kjur']],
            [['idkur'], 'exist', 'skipOnError' => true, 'targetClass' => Kurikulum::className(), 'targetAttribute' => ['idkur' => 'idkur']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_konversi' => 'Iddata Konversi',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'nim_asal' => 'Nim Asal',
            'kode_pt_asal' => 'Kode Pt Asal',
            'nama_pt_asal' => 'Nama Pt Asal',
            'kjenjang' => 'Kjenjang',
            'kode_ps_asal' => 'Kode Ps Asal',
            'nama_ps_asal' => 'Nama Ps Asal',
            'tahun' => 'Tahun',
            'kjur' => 'Kjur',
            'idkur' => 'Idkur',
            'perpanjangan' => 'Perpanjangan',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataKonversi()
    {
        return $this->hasOne(DataKonversi::className(), ['iddata_konversi' => 'iddata_konversi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKjur0()
    {
        return $this->hasOne(ProgramStudi::className(), ['kjur' => 'kjur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKur()
    {
        return $this->hasOne(Kurikulum::className(), ['idkur' => 'idkur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiKonversi2s()
    {
        return $this->hasMany(NilaiKonversi2::className(), ['iddata_konversi' => 'iddata_konversi']);
    }
}
