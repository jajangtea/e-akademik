<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_persetujuan_pendaftaran".
 *
 * @property int $idPersetujuanPendaftaran
 * @property int $idPendaftaran
 * @property int $idPersetujuan
 * @property string $status
 */
class PrdPersetujuanPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_persetujuan_pendaftaran';
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
            [['idPersetujuanPendaftaran'], 'required'],
            [['idPersetujuanPendaftaran', 'idPendaftaran', 'idPersetujuan'], 'integer'],
            [['status'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersetujuanPendaftaran' => 'Id Persetujuan Pendaftaran',
            'idPendaftaran' => 'Id Pendaftaran',
            'idPersetujuan' => 'Id Persetujuan',
            'status' => 'Status',
        ];
    }
}
