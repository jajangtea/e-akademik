<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_nilaimasterskripsi".
 *
 * @property string $IdNMSkripsi
 * @property double $NKompre
 * @property double $NPraSidang
 * @property double $NSidangSkripsi
 * @property double $NPembimbing
 * @property double $NA
 * @property string $Index
 * @property int $NIM
 * @property int $idPendaftaran
 * @property string $status
 * @property int $idPengajuan
 *
 * @property PrdMahasiswa $nIM
 * @property PrdPendaftaran $pendaftaran
 * @property PrdPengajuan $pengajuan
 */
class PrdNilaimasterskripsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_nilaimasterskripsi';
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
            [['NKompre', 'NPraSidang', 'NSidangSkripsi', 'NPembimbing', 'NA'], 'number'],
            [['NIM', 'status', 'idPengajuan'], 'required'],
            [['NIM', 'idPendaftaran', 'idPengajuan'], 'integer'],
            [['Index'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 100],
            [['NIM'], 'unique'],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => PrdMahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['idPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPendaftaran::className(), 'targetAttribute' => ['idPendaftaran' => 'idPendaftaran']],
            [['idPengajuan'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPengajuan::className(), 'targetAttribute' => ['idPengajuan' => 'IDPengajuan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdNMSkripsi' => 'Id Nm Skripsi',
            'NKompre' => 'N Kompre',
            'NPraSidang' => 'N Pra Sidang',
            'NSidangSkripsi' => 'N Sidang Skripsi',
            'NPembimbing' => 'N Pembimbing',
            'NA' => 'Na',
            'Index' => 'Index',
            'NIM' => 'Nim',
            'idPendaftaran' => 'Id Pendaftaran',
            'status' => 'Status',
            'idPengajuan' => 'Id Pengajuan',
        ];
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
    public function getPendaftaran()
    {
        return $this->hasOne(PrdPendaftaran::className(), ['idPendaftaran' => 'idPendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuan()
    {
        return $this->hasOne(PrdPengajuan::className(), ['IDPengajuan' => 'idPengajuan']);
    }
}
