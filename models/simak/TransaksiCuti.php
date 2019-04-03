<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "transaksi_cuti".
 *
 * @property int $no_transaksi
 * @property string $no_faktur
 * @property string $tahun
 * @property int $idsmt
 * @property string $nim
 * @property int $idkombi
 * @property string $dibayarkan
 * @property string $tanggal
 * @property int $userid
 *
 * @property RegisterMahasiswa $nim0
 */
class TransaksiCuti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_cuti';
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
            [['no_transaksi', 'no_faktur', 'tahun', 'idsmt', 'nim', 'idkombi', 'dibayarkan', 'tanggal', 'userid'], 'required'],
            [['no_transaksi', 'idsmt', 'idkombi', 'userid'], 'integer'],
            [['tahun', 'tanggal'], 'safe'],
            [['dibayarkan'], 'number'],
            [['no_faktur'], 'string', 'max' => 15],
            [['nim'], 'string', 'max' => 20],
            [['no_transaksi'], 'unique'],
            [['nim'], 'exist', 'skipOnError' => true, 'targetClass' => RegisterMahasiswa::className(), 'targetAttribute' => ['nim' => 'nim']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_transaksi' => 'No Transaksi',
            'no_faktur' => 'No Faktur',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'nim' => 'Nim',
            'idkombi' => 'Idkombi',
            'dibayarkan' => 'Dibayarkan',
            'tanggal' => 'Tanggal',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNim0()
    {
        return $this->hasOne(RegisterMahasiswa::className(), ['nim' => 'nim']);
    }
}
