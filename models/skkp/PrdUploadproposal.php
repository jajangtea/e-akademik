<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_uploadproposal".
 *
 * @property int $idUpload
 * @property int $idPengajuan
 * @property string $namaFile
 * @property string $ukuranFIle
 * @property int $idPersyaratan
 */
class PrdUploadproposal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_uploadproposal';
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
            [['idPengajuan', 'idPersyaratan'], 'integer'],
            [['namaFile', 'ukuranFIle'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUpload' => 'Id Upload',
            'idPengajuan' => 'Id Pengajuan',
            'namaFile' => 'Nama File',
            'ukuranFIle' => 'Ukuran F Ile',
            'idPersyaratan' => 'Id Persyaratan',
        ];
    }
}
