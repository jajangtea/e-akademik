<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "transaksi_detail".
 *
 * @property string $idtransaksi_detail
 * @property string $no_transaksi
 * @property int $idkombi
 * @property string $dibayarkan
 * @property int $jumlah_sks
 *
 * @property Kombi $kombi
 * @property Transaksi $noTransaksi
 */
class TransaksiDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_detail';
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
            [['no_transaksi', 'idkombi', 'dibayarkan', 'jumlah_sks'], 'required'],
            [['no_transaksi', 'idkombi', 'jumlah_sks'], 'integer'],
            [['dibayarkan'], 'number'],
            [['idkombi'], 'exist', 'skipOnError' => true, 'targetClass' => Kombi::className(), 'targetAttribute' => ['idkombi' => 'idkombi']],
            [['no_transaksi'], 'exist', 'skipOnError' => true, 'targetClass' => Transaksi::className(), 'targetAttribute' => ['no_transaksi' => 'no_transaksi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtransaksi_detail' => 'Idtransaksi Detail',
            'no_transaksi' => 'No Transaksi',
            'idkombi' => 'Idkombi',
            'dibayarkan' => 'Dibayarkan',
            'jumlah_sks' => 'Jumlah Sks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKombi()
    {
        return $this->hasOne(Kombi::className(), ['idkombi' => 'idkombi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoTransaksi()
    {
        return $this->hasOne(Transaksi::className(), ['no_transaksi' => 'no_transaksi']);
    }
}
