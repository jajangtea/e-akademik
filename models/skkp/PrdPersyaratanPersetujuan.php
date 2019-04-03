<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_persyaratan_persetujuan".
 *
 * @property int $idPersyaratanPersetujuan
 * @property int $idPersyaratan
 * @property int $idJenisSidang
 * @property int $idLevel
 */
class PrdPersyaratanPersetujuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_persyaratan_persetujuan';
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
            [['idPersyaratanPersetujuan'], 'required'],
            [['idPersyaratanPersetujuan', 'idPersyaratan', 'idJenisSidang', 'idLevel'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersyaratanPersetujuan' => 'Id Persyaratan Persetujuan',
            'idPersyaratan' => 'Id Persyaratan',
            'idJenisSidang' => 'Id Jenis Sidang',
            'idLevel' => 'Id Level',
        ];
    }
}
