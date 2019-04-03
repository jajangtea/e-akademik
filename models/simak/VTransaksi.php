<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_transaksi".
 *
 * @property string $idtransaksi_detail
 * @property string $no_transaksi
 * @property int $idkombi
 * @property string $nama_kombi
 * @property string $dibayarkan
 * @property string $no_faktur
 * @property int $kjur
 * @property string $tahun
 * @property int $idsmt
 * @property string $tasmt
 * @property string $idkelas
 * @property string $nim
 * @property int $no_formulir
 * @property string $tanggal
 * @property int $commited
 */
class VTransaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_transaksi';
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
            [['idtransaksi_detail', 'no_transaksi', 'idkombi', 'kjur', 'idsmt', 'no_formulir', 'commited'], 'integer'],
            [['no_transaksi', 'idkombi', 'nama_kombi', 'dibayarkan', 'no_faktur', 'kjur', 'tahun', 'idsmt', 'idkelas', 'nim', 'no_formulir', 'tanggal'], 'required'],
            [['dibayarkan'], 'number'],
            [['tahun', 'tanggal'], 'safe'],
            [['nama_kombi'], 'string', 'max' => 50],
            [['no_faktur'], 'string', 'max' => 15],
            [['tasmt'], 'string', 'max' => 8],
            [['idkelas'], 'string', 'max' => 1],
            [['nim'], 'string', 'max' => 20],
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
            'nama_kombi' => 'Nama Kombi',
            'dibayarkan' => 'Dibayarkan',
            'no_faktur' => 'No Faktur',
            'kjur' => 'Kjur',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'tasmt' => 'Tasmt',
            'idkelas' => 'Idkelas',
            'nim' => 'Nim',
            'no_formulir' => 'No Formulir',
            'tanggal' => 'Tanggal',
            'commited' => 'Commited',
        ];
    }
}
