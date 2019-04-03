<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "register_mahasiswa".
 *
 * @property string $nim
 * @property string $nirm
 * @property int $no_formulir
 * @property string $tahun
 * @property int $idsmt
 * @property string $tanggal
 * @property int $kjur
 * @property int $idkonsentrasi
 * @property int $iddosen_wali
 * @property string $k_status
 * @property string $idkelas
 * @property int $perpanjang
 *
 * @property DataKonversi $dataKonversi
 * @property Dulang[] $dulangs
 * @property Krs[] $krs
 * @property PendaftaranKonsentrasi $pendaftaranKonsentrasi
 * @property PerpanjanganStudi[] $perpanjanganStudis
 * @property Pindahkelas[] $pindahkelas
 * @property Pkrs[] $pkrs
 * @property ProgramStudi $kjur0
 * @property FormulirPendaftaran $noFormulir
 * @property TransaksiCuti[] $transaksiCutis
 * @property TransaksiSp[] $transaksiSps
 * @property TranskripAsli $transkripAsli
 * @property UsulanPenelitian[] $usulanPenelitians
 */
class RegisterMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register_mahasiswa';
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
            [['nim', 'nirm', 'no_formulir', 'tahun', 'idsmt', 'tanggal', 'kjur', 'idkonsentrasi', 'iddosen_wali', 'k_status', 'idkelas'], 'required'],
            [['no_formulir', 'idsmt', 'kjur', 'idkonsentrasi', 'iddosen_wali', 'perpanjang'], 'integer'],
            [['tahun', 'tanggal'], 'safe'],
            [['nim', 'nirm'], 'string', 'max' => 20],
            [['k_status', 'idkelas'], 'string', 'max' => 1],
            [['nim'], 'unique'],
            [['kjur'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramStudi::className(), 'targetAttribute' => ['kjur' => 'kjur']],
            [['no_formulir'], 'exist', 'skipOnError' => true, 'targetClass' => FormulirPendaftaran::className(), 'targetAttribute' => ['no_formulir' => 'no_formulir']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'nirm' => 'Nirm',
            'no_formulir' => 'No Formulir',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'tanggal' => 'Tanggal',
            'kjur' => 'Kjur',
            'idkonsentrasi' => 'Idkonsentrasi',
            'iddosen_wali' => 'Iddosen Wali',
            'k_status' => 'K Status',
            'idkelas' => 'Idkelas',
            'perpanjang' => 'Perpanjang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataKonversi()
    {
        return $this->hasOne(DataKonversi::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDulangs()
    {
        return $this->hasMany(Dulang::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrs()
    {
        return $this->hasMany(Krs::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaranKonsentrasi()
    {
        return $this->hasOne(PendaftaranKonsentrasi::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerpanjanganStudis()
    {
        return $this->hasMany(PerpanjanganStudi::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPindahkelas()
    {
        return $this->hasMany(Pindahkelas::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPkrs()
    {
        return $this->hasMany(Pkrs::className(), ['nim' => 'nim']);
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
    public function getNoFormulir()
    {
        return $this->hasOne(FormulirPendaftaran::className(), ['no_formulir' => 'no_formulir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiCutis()
    {
        return $this->hasMany(TransaksiCuti::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiSps()
    {
        return $this->hasMany(TransaksiSp::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranskripAsli()
    {
        return $this->hasOne(TranskripAsli::className(), ['nim' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsulanPenelitians()
    {
        return $this->hasMany(UsulanPenelitian::className(), ['nim' => 'nim']);
    }
}
