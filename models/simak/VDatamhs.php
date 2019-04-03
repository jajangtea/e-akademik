<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_datamhs".
 *
 * @property string $nim
 * @property string $nirm
 * @property int $no_formulir
 * @property string $nama_mhs
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jk
 * @property string $alamat_kantor
 * @property string $alamat_rumah
 * @property string $telp_rumah
 * @property string $telp_hp
 * @property string $email
 * @property string $userpassword
 * @property string $tahun_masuk
 * @property int $semester_masuk
 * @property int $iddosen_wali
 * @property int $kjur
 * @property string $nama_ps
 * @property int $idkonsentrasi
 * @property string $k_status
 * @property int $perpanjang
 * @property string $idkelas
 * @property string $theme
 * @property string $photo_profile
 */
class VDatamhs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_datamhs';
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
            [['nim', 'nirm', 'no_formulir', 'nama_mhs', 'tempat_lahir', 'tanggal_lahir', 'alamat_kantor', 'alamat_rumah', 'telp_rumah', 'telp_hp', 'email', 'userpassword', 'tahun_masuk', 'semester_masuk', 'iddosen_wali', 'kjur', 'nama_ps', 'idkonsentrasi', 'k_status', 'idkelas', 'photo_profile'], 'required'],
            [['no_formulir', 'semester_masuk', 'iddosen_wali', 'kjur', 'idkonsentrasi', 'perpanjang'], 'integer'],
            [['tanggal_lahir', 'tahun_masuk'], 'safe'],
            [['jk'], 'string'],
            [['nim', 'nirm'], 'string', 'max' => 20],
            [['nama_mhs', 'alamat_kantor', 'alamat_rumah', 'email'], 'string', 'max' => 200],
            [['tempat_lahir'], 'string', 'max' => 100],
            [['telp_rumah', 'telp_hp'], 'string', 'max' => 50],
            [['userpassword'], 'string', 'max' => 60],
            [['nama_ps'], 'string', 'max' => 30],
            [['k_status', 'idkelas'], 'string', 'max' => 1],
            [['theme'], 'string', 'max' => 25],
            [['photo_profile'], 'string', 'max' => 150],
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
            'nama_mhs' => 'Nama Mhs',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jk' => 'Jk',
            'alamat_kantor' => 'Alamat Kantor',
            'alamat_rumah' => 'Alamat Rumah',
            'telp_rumah' => 'Telp Rumah',
            'telp_hp' => 'Telp Hp',
            'email' => 'Email',
            'userpassword' => 'Userpassword',
            'tahun_masuk' => 'Tahun Masuk',
            'semester_masuk' => 'Semester Masuk',
            'iddosen_wali' => 'Iddosen Wali',
            'kjur' => 'Kjur',
            'nama_ps' => 'Nama Ps',
            'idkonsentrasi' => 'Idkonsentrasi',
            'k_status' => 'K Status',
            'perpanjang' => 'Perpanjang',
            'idkelas' => 'Idkelas',
            'theme' => 'Theme',
            'photo_profile' => 'Photo Profile',
        ];
    }
}
