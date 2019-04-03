<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_persetujuan".
 *
 * @property int $idPersetujuan
 * @property int $idPersyaratanPersetujuan
 * @property string $kodeDosen
 */
class PrdPersetujuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_persetujuan';
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
            [['idPersetujuan'], 'required'],
            [['idPersetujuan', 'idPersyaratanPersetujuan'], 'integer'],
            [['kodeDosen'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersetujuan' => 'Id Persetujuan',
            'idPersyaratanPersetujuan' => 'Id Persyaratan Persetujuan',
            'kodeDosen' => 'Kode Dosen',
        ];
    }
}
