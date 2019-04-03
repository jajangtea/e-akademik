<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_mahasiswa".
 *
 * @property int $NIM
 * @property string $Nama
 * @property string $Tlp
 * @property string $KodeJurusan
 * @property int $IdUser
 *
 * @property PrdJurusan $kodeJurusan
 * @property PrdUser $user
 * @property PrdNilaikp[] $prdNilaikps
 * @property PrdNilaimasterskripsi $prdNilaimasterskripsi
 * @property PrdPendaftaran[] $prdPendaftarans
 * @property PrdPengajuan[] $prdPengajuans
 */
class PrdMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_mahasiswa';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_skkp');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NIM'], 'required'],
            [['NIM', 'IdUser'], 'integer'],
            [['Nama'], 'string', 'max' => 200],
            [['Tlp'], 'string', 'max' => 20],
            [['KodeJurusan'], 'string', 'max' => 50],
            [['NIM'], 'unique'],
            [['KodeJurusan'], 'exist', 'skipOnError' => true, 'targetClass' => PrdJurusan::className(), 'targetAttribute' => ['KodeJurusan' => 'KodeJurusan']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => PrdUser::className(), 'targetAttribute' => ['IdUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NIM' => 'Nim',
            'Nama' => 'Nama',
            'Tlp' => 'Tlp',
            'KodeJurusan' => 'Kode Jurusan',
            'IdUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJurusan()
    {
        return $this->hasOne(PrdJurusan::className(), ['KodeJurusan' => 'KodeJurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(PrdUser::className(), ['id' => 'IdUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdNilaikps()
    {
        return $this->hasMany(PrdNilaikp::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdNilaimasterskripsi()
    {
        return $this->hasOne(PrdNilaimasterskripsi::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPendaftarans()
    {
        return $this->hasMany(PrdPendaftaran::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPengajuans()
    {
        return $this->hasMany(PrdPengajuan::className(), ['NIM' => 'NIM']);
    }
}
