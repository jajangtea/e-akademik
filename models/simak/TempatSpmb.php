<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "tempat_spmb".
 *
 * @property int $idtempat_spmb
 * @property string $nama_tempat
 * @property string $alamat
 */
class TempatSpmb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tempat_spmb';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_simak');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_tempat', 'alamat'], 'required'],
            [['nama_tempat'], 'string', 'max' => 60],
            [['alamat'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtempat_spmb' => 'Idtempat Spmb',
            'nama_tempat' => 'Nama Tempat',
            'alamat' => 'Alamat',
        ];
    }
}
