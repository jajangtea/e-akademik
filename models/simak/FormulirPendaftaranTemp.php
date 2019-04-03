<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "formulir_pendaftaran_temp".
 *
 * @property int $no_pendaftaran
 * @property int $no_formulir
 * @property string $nama_mhs
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jk
 * @property string $email
 * @property string $telp_hp
 * @property int $kjur1
 * @property int $kjur2
 * @property string $idkelas
 * @property string $ta
 * @property int $idsmt
 * @property string $salt
 * @property string $userpassword
 * @property string $waktu_mendaftar
 * @property string $file_bukti_bayar
 */
class FormulirPendaftaranTemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formulir_pendaftaran_temp';
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
            [['no_pendaftaran', 'no_formulir', 'nama_mhs', 'tempat_lahir', 'tanggal_lahir', 'email', 'telp_hp', 'idkelas', 'ta', 'idsmt', 'salt', 'userpassword', 'waktu_mendaftar', 'file_bukti_bayar'], 'required'],
            [['no_pendaftaran', 'no_formulir', 'kjur1', 'kjur2', 'idsmt'], 'integer'],
            [['tanggal_lahir', 'ta', 'waktu_mendaftar'], 'safe'],
            [['jk'], 'string'],
            [['nama_mhs', 'email'], 'string', 'max' => 200],
            [['tempat_lahir'], 'string', 'max' => 100],
            [['telp_hp'], 'string', 'max' => 50],
            [['idkelas'], 'string', 'max' => 1],
            [['salt'], 'string', 'max' => 7],
            [['userpassword', 'file_bukti_bayar'], 'string', 'max' => 150],
            [['no_pendaftaran'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_pendaftaran' => 'No Pendaftaran',
            'no_formulir' => 'No Formulir',
            'nama_mhs' => 'Nama Mhs',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jk' => 'Jk',
            'email' => 'Email',
            'telp_hp' => 'Telp Hp',
            'kjur1' => 'Kjur1',
            'kjur2' => 'Kjur2',
            'idkelas' => 'Idkelas',
            'ta' => 'Ta',
            'idsmt' => 'Idsmt',
            'salt' => 'Salt',
            'userpassword' => 'Userpassword',
            'waktu_mendaftar' => 'Waktu Mendaftar',
            'file_bukti_bayar' => 'File Bukti Bayar',
        ];
    }
}
