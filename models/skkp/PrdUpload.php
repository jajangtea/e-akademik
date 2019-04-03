<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_upload".
 *
 * @property int $idUpload
 * @property int $idPendaftaran
 * @property string $namaFile
 * @property string $ukuranFIle
 * @property int $idPersyaratan
 */
class PrdUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_upload';
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
            [['idPendaftaran', 'idPersyaratan'], 'integer'],
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
            'idPendaftaran' => 'Id Pendaftaran',
            'namaFile' => 'Nama File',
            'ukuranFIle' => 'Ukuran F Ile',
            'idPersyaratan' => 'Id Persyaratan',
        ];
    }
}
