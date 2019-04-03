<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property int $iddosen
 * @property string $nidn
 * @property string $nipy
 * @property string $nama_dosen
 * @property string $gelar_depan
 * @property string $gelar_belakang
 * @property int $idjabatan
 * @property string $alamat_dosen
 * @property string $telp_hp
 * @property string $email
 * @property string $website
 * @property string $username
 * @property string $userpassword
 * @property string $theme
 * @property int $status
 *
 * @property DosenWali[] $dosenWalis
 * @property Penyelenggaraan[] $penyelenggaraans
 * @property TranskripAsli[] $transkripAslis
 * @property TranskripAsli[] $transkripAslis0
 * @property TranskripAsli[] $transkripAslis1
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen';
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
            [['nidn', 'nipy', 'nama_dosen', 'gelar_depan', 'gelar_belakang', 'idjabatan', 'alamat_dosen', 'telp_hp', 'email', 'website', 'username', 'userpassword'], 'required'],
            [['idjabatan', 'status'], 'integer'],
            [['nidn'], 'string', 'max' => 15],
            [['nipy', 'username'], 'string', 'max' => 30],
            [['nama_dosen', 'website'], 'string', 'max' => 70],
            [['gelar_depan', 'gelar_belakang'], 'string', 'max' => 20],
            [['alamat_dosen'], 'string', 'max' => 50],
            [['telp_hp', 'theme'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 60],
            [['userpassword'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddosen' => 'Iddosen',
            'nidn' => 'Nidn',
            'nipy' => 'Nipy',
            'nama_dosen' => 'Nama Dosen',
            'gelar_depan' => 'Gelar Depan',
            'gelar_belakang' => 'Gelar Belakang',
            'idjabatan' => 'Idjabatan',
            'alamat_dosen' => 'Alamat Dosen',
            'telp_hp' => 'Telp Hp',
            'email' => 'Email',
            'website' => 'Website',
            'username' => 'Username',
            'userpassword' => 'Userpassword',
            'theme' => 'Theme',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDosenWalis()
    {
        return $this->hasMany(DosenWali::className(), ['iddosen' => 'iddosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyelenggaraans()
    {
        return $this->hasMany(Penyelenggaraan::className(), ['iddosen' => 'iddosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranskripAslis()
    {
        return $this->hasMany(TranskripAsli::className(), ['iddosen_pembimbing' => 'iddosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranskripAslis0()
    {
        return $this->hasMany(TranskripAsli::className(), ['iddosen_ketua' => 'iddosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranskripAslis1()
    {
        return $this->hasMany(TranskripAsli::className(), ['iddosen_pemket' => 'iddosen']);
    }
}
