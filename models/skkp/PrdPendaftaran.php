<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_pendaftaran".
 *
 * @property int $idPendaftaran
 * @property string $Tanggal
 * @property int $NIM
 * @property int $IdSidang
 * @property string $KodePembimbing1
 * @property string $KodePembimbing2
 * @property string $Judul
 * @property string $keterangan
 * @property int $idPengajuan
 *
 * @property PrdNilaidetilskirpsi[] $prdNilaidetilskirpsis
 * @property PrdNilaikp[] $prdNilaikps
 * @property PrdNilaimasterskripsi[] $prdNilaimasterskripsis
 * @property PrdMahasiswa $nIM
 * @property PrdSidangmaster $sidang
 * @property PrdDosen $kodePembimbing1
 * @property PrdDosen $kodePembimbing2
 * @property PrdPengajuan $pengajuan
 * @property PrdPengujikp[] $prdPengujikps
 * @property PrdPengujiskripsi[] $prdPengujiskripsis
 * @property PrdSidangdetil[] $prdSidangdetils
 */
class PrdPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_pendaftaran';
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
            [['Tanggal'], 'safe'],
            [['NIM', 'IdSidang', 'idPengajuan'], 'integer'],
            [['Judul'], 'string'],
            [['keterangan'], 'required'],
            [['KodePembimbing1', 'KodePembimbing2'], 'string', 'max' => 3],
            [['keterangan'], 'string', 'max' => 200],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => PrdMahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['IdSidang'], 'exist', 'skipOnError' => true, 'targetClass' => PrdSidangmaster::className(), 'targetAttribute' => ['IdSidang' => 'IdSidang']],
            [['KodePembimbing1'], 'exist', 'skipOnError' => true, 'targetClass' => PrdDosen::className(), 'targetAttribute' => ['KodePembimbing1' => 'KodeDosen']],
            [['KodePembimbing2'], 'exist', 'skipOnError' => true, 'targetClass' => PrdDosen::className(), 'targetAttribute' => ['KodePembimbing2' => 'KodeDosen']],
            [['idPengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPengajuan::className(), 'targetAttribute' => ['idPengajuan' => 'IDPengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPendaftaran' => 'Id Pendaftaran',
            'Tanggal' => 'Tanggal',
            'NIM' => 'Nim',
            'IdSidang' => 'Id Sidang',
            'KodePembimbing1' => 'Kode Pembimbing1',
            'KodePembimbing2' => 'Kode Pembimbing2',
            'Judul' => 'Judul',
            'keterangan' => 'Keterangan',
            'idPengajuan' => 'Id Pengajuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdNilaidetilskirpsis()
    {
        return $this->hasMany(PrdNilaidetilskirpsi::className(), ['IdPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdNilaikps()
    {
        return $this->hasMany(PrdNilaikp::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdNilaimasterskripsis()
    {
        return $this->hasMany(PrdNilaimasterskripsi::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIM()
    {
        return $this->hasOne(PrdMahasiswa::className(), ['NIM' => 'NIM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSidang()
    {
        return $this->hasOne(PrdSidangmaster::className(), ['IdSidang' => 'IdSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePembimbing1()
    {
        return $this->hasOne(PrdDosen::className(), ['KodeDosen' => 'KodePembimbing1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePembimbing2()
    {
        return $this->hasOne(PrdDosen::className(), ['KodeDosen' => 'KodePembimbing2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(PrdPengajuan::className(), ['IDPengajuan' => 'idPengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPengujikps()
    {
        return $this->hasMany(PrdPengujikp::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPengujiskripsis()
    {
        return $this->hasMany(PrdPengujiskripsi::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdSidangdetils()
    {
        return $this->hasMany(PrdSidangdetil::className(), ['IdPendaftaran' => 'idPendaftaran']);
    }
}
