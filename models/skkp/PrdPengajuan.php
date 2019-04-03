<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_pengajuan".
 *
 * @property int $IDPengajuan
 * @property int $IDJenisSidang
 * @property int $NIM
 * @property string $TanggalDaftar
 * @property string $Judul
 * @property string $keterangan
 * @property int $IDstatusProposal
 * @property int $idPeriode
 *
 * @property PrdNilaimasterskripsi[] $prdNilaimasterskripsis
 * @property PrdPembimbing[] $prdPembimbings
 * @property PrdPendaftaran[] $prdPendaftarans
 * @property PrdJenissidang $jenisSidang
 * @property PrdStatusproposal $statusProposal
 * @property PrdMahasiswa $nIM
 */
class PrdPengajuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_pengajuan';
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
            [['IDJenisSidang', 'NIM', 'IDstatusProposal', 'idPeriode'], 'integer'],
            [['TanggalDaftar'], 'safe'],
            [['Judul', 'keterangan'], 'string'],
            [['idPeriode'], 'required'],
            [['IDJenisSidang'], 'exist', 'skipOnError' => true, 'targetClass' => PrdJenissidang::className(), 'targetAttribute' => ['IDJenisSidang' => 'IDJenisSidang']],
            [['IDstatusProposal'], 'exist', 'skipOnError' => true, 'targetClass' => PrdStatusproposal::className(), 'targetAttribute' => ['IDstatusProposal' => 'idstatusProp']],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => PrdMahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPengajuan' => 'Id Pengajuan',
            'IDJenisSidang' => 'Id Jenis Sidang',
            'NIM' => 'Nim',
            'TanggalDaftar' => 'Tanggal Daftar',
            'Judul' => 'Judul',
            'keterangan' => 'Keterangan',
            'IDstatusProposal' => 'I Dstatus Proposal',
            'idPeriode' => 'Id Periode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdNilaimasterskripsis()
    {
        return $this->hasMany(PrdNilaimasterskripsi::className(), ['idPengajuan' => 'IDPengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPembimbings()
    {
        return $this->hasMany(PrdPembimbing::className(), ['idPengajuan' => 'IDPengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPendaftarans()
    {
        return $this->hasMany(PrdPendaftaran::className(), ['idPengajuan' => 'IDPengajuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSidang()
    {
        return $this->hasOne(PrdJenissidang::className(), ['IDJenisSidang' => 'IDJenisSidang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusProposal()
    {
        return $this->hasOne(PrdStatusproposal::className(), ['idstatusProp' => 'IDstatusProposal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIM()
    {
        return $this->hasOne(PrdMahasiswa::className(), ['NIM' => 'NIM']);
    }
}
