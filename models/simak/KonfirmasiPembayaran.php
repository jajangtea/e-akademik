<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "konfirmasi_pembayaran".
 *
 * @property int $idkonfirmasi
 * @property int $no_formulir
 * @property int $jumlah_bayar
 * @property string $tanggal_bayar
 * @property int $idrekening_institusi
 * @property int $idmetode_pembayaran
 * @property string $pembayaran_dari_bank
 * @property string $pemilik_rekening
 * @property string $idkelas
 * @property string $ta
 * @property int $idsmt
 * @property int $kjur
 * @property int $verified
 *
 * @property KombiKonfirmasiPembayaran[] $kombiKonfirmasiPembayarans
 * @property FormulirPendaftaran $noFormulir
 */
class KonfirmasiPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'konfirmasi_pembayaran';
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
            [['no_formulir', 'jumlah_bayar', 'tanggal_bayar', 'idrekening_institusi', 'idmetode_pembayaran', 'pembayaran_dari_bank', 'pemilik_rekening', 'idkelas', 'ta', 'idsmt', 'kjur', 'verified'], 'required'],
            [['no_formulir', 'jumlah_bayar', 'idrekening_institusi', 'idmetode_pembayaran', 'idsmt', 'kjur', 'verified'], 'integer'],
            [['tanggal_bayar', 'ta'], 'safe'],
            [['pembayaran_dari_bank'], 'string', 'max' => 20],
            [['pemilik_rekening'], 'string', 'max' => 60],
            [['idkelas'], 'string', 'max' => 1],
            [['no_formulir'], 'exist', 'skipOnError' => true, 'targetClass' => FormulirPendaftaran::className(), 'targetAttribute' => ['no_formulir' => 'no_formulir']],
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
            'tanggal_bayar' => 'Tanggal Bayar',
            'idrekening_institusi' => 'Idrekening Institusi',
            'idmetode_pembayaran' => 'Idmetode Pembayaran',
            'pembayaran_dari_bank' => 'Pembayaran Dari Bank',
            'pemilik_rekening' => 'Pemilik Rekening',
            'idkelas' => 'Idkelas',
            'ta' => 'Ta',
            'idsmt' => 'Idsmt',
            'kjur' => 'Kjur',
            'verified' => 'Verified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKombiKonfirmasiPembayarans()
    {
        return $this->hasMany(KombiKonfirmasiPembayaran::className(), ['idkonfirmasi' => 'idkonfirmasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoFormulir()
    {
        return $this->hasOne(FormulirPendaftaran::className(), ['no_formulir' => 'no_formulir']);
    }
}
