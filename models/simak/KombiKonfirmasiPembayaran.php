<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kombi_konfirmasi_pembayaran".
 *
 * @property int $idkonfirmasi
 * @property int $idkombi
 * @property int $biaya
 *
 * @property KonfirmasiPembayaran $konfirmasi
 */
class KombiKonfirmasiPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kombi_konfirmasi_pembayaran';
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
            [['idkonfirmasi', 'idkombi', 'biaya'], 'required'],
            [['idkonfirmasi', 'idkombi', 'biaya'], 'integer'],
            [['idkonfirmasi'], 'exist', 'skipOnError' => true, 'targetClass' => KonfirmasiPembayaran::className(), 'targetAttribute' => ['idkonfirmasi' => 'idkonfirmasi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkonfirmasi' => 'Idkonfirmasi',
            'idkombi' => 'Idkombi',
            'biaya' => 'Biaya',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonfirmasi()
    {
        return $this->hasOne(KonfirmasiPembayaran::className(), ['idkonfirmasi' => 'idkonfirmasi']);
    }
}
