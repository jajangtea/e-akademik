<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_nilaikp".
 *
 * @property int $IdNilaiKp
 * @property int $NIM
 * @property double $NilaiPembimbing
 * @property double $NilaiPenguji
 * @property double $NilaiPerusahaan
 * @property double $NA
 * @property string $Index
 * @property int $idPendaftaran
 * @property int $idPengajuan
 *
 * @property PrdMahasiswa $nIM
 * @property PrdPendaftaran $pendaftaran
 */
class PrdNilaikp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_nilaikp';
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
            [['NIM', 'idPendaftaran', 'idPengajuan'], 'integer'],
            [['NilaiPembimbing', 'NilaiPenguji', 'NilaiPerusahaan', 'NA'], 'number'],
            [['idPendaftaran', 'idPengajuan'], 'required'],
            [['Index'], 'string', 'max' => 2],
            [['NIM'], 'exist', 'skipOnError' => true, 'targetClass' => PrdMahasiswa::className(), 'targetAttribute' => ['NIM' => 'NIM']],
            [['idPendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => PrdPendaftaran::className(), 'targetAttribute' => ['idPendaftaran' => 'idPendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdNilaiKp' => 'Id Nilai Kp',
            'NIM' => 'Nim',
            'NilaiPembimbing' => 'Nilai Pembimbing',
            'NilaiPenguji' => 'Nilai Penguji',
            'NilaiPerusahaan' => 'Nilai Perusahaan',
            'NA' => 'Na',
            'Index' => 'Index',
            'idPendaftaran' => 'Id Pendaftaran',
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
}
