<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "transaksi_sp".
 *
 * @property string $no_transaksi
 * @property string $no_faktur
 * @property int $kjur
 * @property string $tahun
 * @property int $idsmt
 * @property string $idkelas
 * @property string $nim
 * @property string $tanggal
 * @property int $sks
 * @property string $dibayarkan
 * @property int $commited
 * @property int $userid
 *
 * @property RegisterMahasiswa $nim0
 */
class TransaksiSp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_sp';
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
            [['no_faktur', 'kjur', 'tahun', 'idsmt', 'idkelas', 'nim', 'tanggal', 'sks', 'dibayarkan', 'userid'], 'required'],
            [['kjur', 'idsmt', 'sks', 'commited', 'userid'], 'integer'],
            [['tahun', 'tanggal'], 'safe'],
            [['dibayarkan'], 'number'],
            [['no_faktur'], 'string', 'max' => 15],
            [['idkelas'], 'string', 'max' => 1],
            [['nim'], 'string', 'max' => 20],
            [['no_faktur'], 'unique'],
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
            'kjur' => 'Kjur',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'idkelas' => 'Idkelas',
            'nim' => 'Nim',
            'tanggal' => 'Tanggal',
            'sks' => 'Sks',
            'dibayarkan' => 'Dibayarkan',
            'commited' => 'Commited',
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
