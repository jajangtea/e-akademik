<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kombi".
 *
 * @property int $idkombi
 * @property string $nama_kombi
 * @property string $periode_pembayaran
 *
 * @property KombiPerTa[] $kombiPerTas
 * @property TransaksiDetail[] $transaksiDetails
 */
class Kombi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kombi';
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
            [['idkombi', 'nama_kombi', 'periode_pembayaran'], 'required'],
            [['idkombi'], 'integer'],
            [['periode_pembayaran'], 'string'],
            [['nama_kombi'], 'string', 'max' => 50],
            [['nama_kombi'], 'unique'],
            [['idkombi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkombi' => 'Idkombi',
            'nama_kombi' => 'Nama Kombi',
            'periode_pembayaran' => 'Periode Pembayaran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKombiPerTas()
    {
        return $this->hasMany(KombiPerTa::className(), ['idkombi' => 'idkombi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::className(), ['idkombi' => 'idkombi']);
    }
}
