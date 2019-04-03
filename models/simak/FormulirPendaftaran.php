<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "formulir_pendaftaran".
 *
 * @property int $no_formulir
 * @property string $nama_mhs
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jk
 * @property int $idagama
 * @property string $nama_ibu_kandung
 * @property string $idwarga
 * @property string $nik
 * @property string $idstatus
 * @property string $alamat_kantor
 * @property string $alamat_rumah
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $telp_kantor
 * @property string $telp_rumah
 * @property string $telp_hp
 * @property int $idjp
 * @property string $pendidikan_terakhir
 * @property string $jurusan
 * @property string $kota
 * @property string $provinsi
 * @property string $tahun_pa
 * @property string $jenis_slta
 * @property string $asal_slta
 * @property string $status_slta
 * @property string $nomor_ijazah
 * @property int $kjur1
 * @property int $kjur2
 * @property string $idkelas
 * @property string $daftar_via
 * @property string $ta
 * @property int $idsmt
 * @property string $waktu_mendaftar
 *
 * @property Bipend $bipend
 * @property ProgramStudi $kjur10
 * @property ProgramStudi $kjur20
 * @property KartuUjian $kartuUjian
 * @property KonfirmasiPembayaran[] $konfirmasiPembayarans
 * @property NilaiUjianMasuk $nilaiUjianMasuk
 * @property ProfilesMahasiswa $profilesMahasiswa
 * @property RegisterMahasiswa[] $registerMahasiswas
 */
class FormulirPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formulir_pendaftaran';
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
            [['no_formulir', 'nama_mhs', 'tempat_lahir', 'tanggal_lahir', 'idagama', 'nama_ibu_kandung', 'nik', 'alamat_kantor', 'alamat_rumah', 'kelurahan', 'kecamatan', 'telp_kantor', 'telp_rumah', 'telp_hp', 'idjp', 'jenis_slta', 'asal_slta', 'nomor_ijazah', 'idkelas', 'ta', 'idsmt', 'waktu_mendaftar'], 'required'],
            [['no_formulir', 'idagama', 'idjp', 'kjur1', 'kjur2', 'idsmt'], 'integer'],
            [['tanggal_lahir', 'tahun_pa', 'ta', 'waktu_mendaftar'], 'safe'],
            [['jk', 'idwarga', 'idstatus', 'jenis_slta', 'status_slta', 'daftar_via'], 'string'],
            [['nama_mhs', 'alamat_kantor', 'alamat_rumah'], 'string', 'max' => 200],
            [['tempat_lahir', 'kelurahan', 'kecamatan'], 'string', 'max' => 100],
            [['nama_ibu_kandung', 'asal_slta'], 'string', 'max' => 150],
            [['nik', 'kota', 'nomor_ijazah'], 'string', 'max' => 60],
            [['telp_kantor', 'telp_rumah', 'telp_hp'], 'string', 'max' => 50],
            [['pendidikan_terakhir', 'provinsi'], 'string', 'max' => 40],
            [['jurusan'], 'string', 'max' => 35],
            [['idkelas'], 'string', 'max' => 1],
            [['no_formulir'], 'unique'],
            [['kjur1'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramStudi::className(), 'targetAttribute' => ['kjur1' => 'kjur']],
            [['kjur2'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramStudi::className(), 'targetAttribute' => ['kjur2' => 'kjur']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_formulir' => 'No Formulir',
            'nama_mhs' => 'Nama Mhs',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jk' => 'Jk',
            'idagama' => 'Idagama',
            'nama_ibu_kandung' => 'Nama Ibu Kandung',
            'idwarga' => 'Idwarga',
            'nik' => 'Nik',
            'idstatus' => 'Idstatus',
            'alamat_kantor' => 'Alamat Kantor',
            'alamat_rumah' => 'Alamat Rumah',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'telp_kantor' => 'Telp Kantor',
            'telp_rumah' => 'Telp Rumah',
            'telp_hp' => 'Telp Hp',
            'idjp' => 'Idjp',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'jurusan' => 'Jurusan',
            'kota' => 'Kota',
            'provinsi' => 'Provinsi',
            'tahun_pa' => 'Tahun Pa',
            'jenis_slta' => 'Jenis Slta',
            'asal_slta' => 'Asal Slta',
            'status_slta' => 'Status Slta',
            'nomor_ijazah' => 'Nomor Ijazah',
            'kjur1' => 'Kjur1',
            'kjur2' => 'Kjur2',
            'idkelas' => 'Idkelas',
            'daftar_via' => 'Daftar Via',
            'ta' => 'Ta',
            'idsmt' => 'Idsmt',
            'waktu_mendaftar' => 'Waktu Mendaftar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBipend()
    {
        return $this->hasOne(Bipend::className(), ['no_formulir' => 'no_formulir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKjur10()
    {
        return $this->hasOne(ProgramStudi::className(), ['kjur' => 'kjur1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKjur20()
    {
        return $this->hasOne(ProgramStudi::className(), ['kjur' => 'kjur2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartuUjian()
    {
        return $this->hasOne(KartuUjian::className(), ['no_formulir' => 'no_formulir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonfirmasiPembayarans()
    {
        return $this->hasMany(KonfirmasiPembayaran::className(), ['no_formulir' => 'no_formulir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiUjianMasuk()
    {
        return $this->hasOne(NilaiUjianMasuk::className(), ['no_formulir' => 'no_formulir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfilesMahasiswa()
    {
        return $this->hasOne(ProfilesMahasiswa::className(), ['no_formulir' => 'no_formulir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterMahasiswas()
    {
        return $this->hasMany(RegisterMahasiswa::className(), ['no_formulir' => 'no_formulir']);
    }
}
