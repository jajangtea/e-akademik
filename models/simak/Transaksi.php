<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property string $no_transaksi
 * @property string $no_faktur
 * @property int $kjur
 * @property string $tahun
 * @property int $idsmt
 * @property string $idkelas
 * @property int $no_formulir
 * @property string $nim
 * @property int $commited
 * @property string $tanggal
 * @property int $userid
 * @property int $jumlah_sks
 * @property string $date_added
 * @property string $date_modified
 *
 * @property TransaksiDetail[] $transaksiDetails
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
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
            [['no_faktur', 'kjur', 'tahun', 'idsmt', 'idkelas', 'no_formulir', 'nim', 'tanggal', 'userid', 'jumlah_sks', 'date_added', 'date_modified'], 'required'],
            [['kjur', 'idsmt', 'no_formulir', 'commited', 'userid', 'jumlah_sks'], 'integer'],
            [['tahun', 'tanggal', 'date_added', 'date_modified'], 'safe'],
            [['no_faktur'], 'string', 'max' => 15],
            [['idkelas'], 'string', 'max' => 1],
            [['nim'], 'string', 'max' => 20],
            [['no_faktur'], 'unique'],
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
            'no_formulir' => 'No Formulir',
            'nim' => 'Nim',
            'commited' => 'Commited',
            'tanggal' => 'Tanggal',
            'userid' => 'Userid',
            'jumlah_sks' => 'Jumlah Sks',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::className(), ['no_transaksi' => 'no_transaksi']);
    }
}
