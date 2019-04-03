<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_pengajuan1".
 *
 * @property int $IDPengajuan
 * @property int $IDJenisSidang
 * @property int $NIM
 * @property string $TanggalDaftar
 * @property string $Judul
 * @property string $keterangan
 * @property int $IDstatusProposal
 */
class PrdPengajuan1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_pengajuan1';
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
            [['IDJenisSidang', 'NIM', 'IDstatusProposal'], 'integer'],
            [['TanggalDaftar'], 'safe'],
            [['Judul', 'keterangan'], 'string'],
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
        ];
    }
}
