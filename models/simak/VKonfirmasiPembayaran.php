<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "v_konfirmasi_pembayaran".
 *
 * @property int $idkonfirmasi
 * @property int $no_formulir
 * @property int $jumlah_bayar
 * @property int $biaya
 * @property string $tanggal_bayar
 * @property string $pembayaran_dari_bank
 * @property string $pemilik_rekening
 * @property string $idkelas
 * @property string $ta
 * @property int $idsmt
 * @property int $kjur
 * @property int $verified
 * @property int $idkombi
 * @property int $idrekening_institusi
 * @property string $rekening_tujuan
 * @property string $metode_pembayaran
 */
class VKonfirmasiPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_konfirmasi_pembayaran';
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
            [['idkonfirmasi', 'no_formulir', 'jumlah_bayar', 'biaya', 'idsmt', 'kjur', 'verified', 'idkombi', 'idrekening_institusi'], 'integer'],
            [['no_formulir', 'jumlah_bayar', 'biaya', 'tanggal_bayar', 'pembayaran_dari_bank', 'pemilik_rekening', 'idkelas', 'ta', 'idsmt', 'kjur', 'verified', 'idkombi', 'idrekening_institusi', 'metode_pembayaran'], 'required'],
            [['tanggal_bayar', 'ta'], 'safe'],
            [['pembayaran_dari_bank'], 'string', 'max' => 20],
            [['pemilik_rekening'], 'string', 'max' => 60],
            [['idkelas'], 'string', 'max' => 1],
            [['rekening_tujuan'], 'string', 'max' => 78],
            [['metode_pembayaran'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkonfirmasi' => 'Idkonfirmasi',
            'no_formulir' => 'No Formulir',
            'jumlah_bayar' => 'Jumlah Bayar',
            'biaya' => 'Biaya',
            'tanggal_bayar' => 'Tanggal Bayar',
            'pembayaran_dari_bank' => 'Pembayaran Dari Bank',
            'pemilik_rekening' => 'Pemilik Rekening',
            'idkelas' => 'Idkelas',
            'ta' => 'Ta',
            'idsmt' => 'Idsmt',
            'kjur' => 'Kjur',
            'verified' => 'Verified',
            'idkombi' => 'Idkombi',
            'idrekening_institusi' => 'Idrekening Institusi',
            'rekening_tujuan' => 'Rekening Tujuan',
            'metode_pembayaran' => 'Metode Pembayaran',
        ];
    }
}
