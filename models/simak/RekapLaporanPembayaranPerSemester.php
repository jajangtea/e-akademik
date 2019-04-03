<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "rekap_laporan_pembayaran_per_semester".
 *
 * @property string $idrekap
 * @property int $no_formulir
 * @property string $nim
 * @property string $nirm
 * @property string $nama_mhs
 * @property string $jk
 * @property string $tahun_masuk
 * @property int $semester_masuk
 * @property string $idkelas
 * @property string $n_kelas
 * @property string $dibayarkan
 * @property string $kewajiban
 * @property string $sisa
 * @property string $tahun
 * @property int $idsmt
 * @property int $kjur
 */
class RekapLaporanPembayaranPerSemester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rekap_laporan_pembayaran_per_semester';
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
            [['no_formulir', 'nim', 'nirm', 'nama_mhs', 'jk', 'tahun_masuk', 'semester_masuk', 'idkelas', 'n_kelas', 'dibayarkan', 'kewajiban', 'sisa', 'tahun', 'idsmt', 'kjur'], 'required'],
            [['no_formulir', 'semester_masuk', 'idsmt', 'kjur'], 'integer'],
            [['tahun_masuk', 'tahun'], 'safe'],
            [['dibayarkan', 'kewajiban', 'sisa'], 'number'],
            [['nim', 'nirm', 'nama_mhs'], 'string', 'max' => 20],
            [['jk', 'idkelas'], 'string', 'max' => 1],
            [['n_kelas'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrekap' => 'Idrekap',
            'no_formulir' => 'No Formulir',
            'nim' => 'Nim',
            'nirm' => 'Nirm',
            'nama_mhs' => 'Nama Mhs',
            'jk' => 'Jk',
            'tahun_masuk' => 'Tahun Masuk',
            'semester_masuk' => 'Semester Masuk',
            'idkelas' => 'Idkelas',
            'n_kelas' => 'N Kelas',
            'dibayarkan' => 'Dibayarkan',
            'kewajiban' => 'Kewajiban',
            'sisa' => 'Sisa',
            'tahun' => 'Tahun',
            'idsmt' => 'Idsmt',
            'kjur' => 'Kjur',
        ];
    }
}
