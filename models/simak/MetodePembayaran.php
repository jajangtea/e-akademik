<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "metode_pembayaran".
 *
 * @property int $idmetode_pembayaran
 * @property string $nama_pembayaran
 */
class MetodePembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metode_pembayaran';
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
            [['nama_pembayaran'], 'required'],
            [['nama_pembayaran'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmetode_pembayaran' => 'Idmetode Pembayaran',
            'nama_pembayaran' => 'Nama Pembayaran',
        ];
    }
}
